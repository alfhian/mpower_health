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

class Recommendation extends Model
{
    use HasFactory;
    
    protected $dates = ['deleted_at'];

    protected $casts = [
        'lab_result'        => 'encrypted',
        'file_path'         => 'encrypted',
        'recommendation'    => 'encrypted',
    ];

    public static function getAllData()
    {
        $data = Recommendation::select('recommendations.*', 'b.id as lab_result_id', 'b.lab_result_no', 'b.lab_result', DB::raw('DATE_FORMAT(recommendations.created_at, "%b %e, %Y") as upload_date'))
                ->leftJoin('lab_results as b', 'b.recommendation_id', 'recommendations.id')
                ->where('client_id', Auth::id())
                ->orderBy('recommendations.created_at', 'desc')
                ->orderBy('b.created_at', 'desc')
                ->get();

        return $data;
    }

    public static function getTopThree()
    {
        $data = Recommendation::select('recommendations.*', 'b.id as lab_result_id', 'b.lab_result_no', 'b.lab_result', DB::raw('DATE_FORMAT(recommendations.created_at, "%b %e, %Y") as upload_date'))
                ->leftJoin('lab_results as b', 'b.recommendation_id', 'recommendations.id')
                ->where('client_id', Auth::id())
                ->orderBy('recommendations.created_at', 'desc')
                ->orderBy('b.created_at', 'desc')
                ->take(3)
                ->get();

        return $data;
    }

    public static function getFile($id) {
        $data = Recommendation::select('recommendation')
                ->leftJoin('lab_results as b', 'b.recommendation_id', 'recommendations.id')
                ->where('b.user_input', Auth::id())
                ->where('recommendations.id', $id)
                ->get();

        return $data;
    }

    public static function convert($file)
    {
        // Decrypt file content
        $decrypted = Crypt::decrypt(Storage::get('public/recommendations/'.$file));

        return $decrypted;
    }
}
