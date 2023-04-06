<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

use App\Models\LogManagement;

use DB;
use Auth;

class LabResult extends Model
{
    use HasFactory, softDeletes;
    
    protected $dates = ['deleted_at'];
    
    protected $casts = [
        'institution'               => 'encrypted',
        'lab_result'                => 'encrypted',
        'file_path'                 => 'encrypted',
        'recommendation'            => 'encrypted',
        'recommendation_file_path'  => 'encrypted',
    ];

    public static function getLabResultRecommendation()
    {
        $data = labResult::select('lab_results.*', 'b.file_path as recommendation_file_path', 'b.recommendation', DB::raw('DATE_FORMAT(lab_results.created_at, "%b %e, %Y") as upload_date'))
                ->leftJoin('recommendations as b', 'b.id', 'lab_results.recommendation_id')
                ->where('client_id', Auth::id())
                ->orderBy('created_at', 'desc')
                ->orderBy('id', 'desc')
                ->get();

        return $data;
    }

    public static function store($request) {
        $lab_result     = LabResult::latest()->first();
        $ticket_number  = '';
        $institution    = str_replace(' ', '', $request->institution);

        if ($lab_result == NULL) {
            $labr_code  = $institution.date('Ymd').'00001';
            $ticket_number  = 'A00001';
        } else {
            $labr_code = $institution.date('Ymd').str_pad(strval(intval(substr($lab_result->lab_result_no, -5))+1), 5, '0', STR_PAD_LEFT);
            $ticket_number = 'A'.str_pad(strval(intval(substr($lab_result->ticket_number, 1))+1), 5, '0', STR_PAD_LEFT);
        }

        $labResult = new LabResult;

        $file       = $request->lab_result;
        $file_name  = time().'_'.$file->getClientOriginalName();

        Storage::put('public/lab_results/'.$file_name, Crypt::encrypt($file->getContent()));

        /*$file_path = $file->storeAs('lab_results', $file_name, 'public');*/

        $file_path = Storage::url('public/lab_results/'.$file_name);

        $labResult->client_id       = Auth::id();
        $labResult->institution     = $request->institution;
        $labResult->lab_result_no   = $labr_code;
        $labResult->lab_result      = $file_name;
        $labResult->file_path       = $file_path;
        $labResult->ticket_number   = $ticket_number;
        $labResult->user_input      = Auth::id();
        $labResult->save();

        return $labResult;
    }

    public static function getFile($id) {
        $data = LabResult::select('lab_result')
                ->where('user_input', Auth::id())
                ->where('id', $id)
                ->get();

        return $data;
    }
}
