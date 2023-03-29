<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

use Hashids\Hashids;

use App\Models\LabResult;
use App\Models\ClientInformation;
use App\Models\LogManagement;

use Auth;

class LabResultController extends Controller
{
    public function __construct(){
        $this->hash = new Hashids("module_name", 16);
    }

    public function index() {
        // Save Log
        $log_data   = \Location::get();
        $log_detail = [
            'url'       => url()->current(),
            'action'    => 'Open Lab Result page'
        ];
        $log        = LogManagement::store($log_data, $log_detail);

        $user       = Auth::user();
        $profile    = ClientInformation::where('client_id', $user->id)->get();
        $lab_result = LabResult::getLabResultRecommendation();

        $data = [
            'client_id' => $user->id,
            'firstname' => $profile[0]['firstname'],
            'photo'     => $user->profile_photo_path,
            'role'      => $user->role_id,
            'lab_result'=> $lab_result,
            'hashids'   => $this->hash,
        ];

        return view('client.lab_result.index', $data);
    }

    public function upload(Request $request) {
        // Save Log
        $log_data   = \Location::get();
        $log_detail = [
            'url'       => url()->current(),
            'action'    => 'Upload Lab Result'
        ];
        $log        = LogManagement::store($log_data, $log_detail);

        Validator::make($request->all(), [
            'lab_result' => ['required', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
        ], [
            'lab_result.max' => 'The lab report must not be greater than 2 Mb'
        ])->validate();

        // Store the data and file
        $store = LabResult::store($request);

        return redirect()->route('lab_result')->with('success', "Lab result has been uploaded. Your recommendation report will be ready within 24 Hours");
    }

    public function showFile($file) {
        $id = $this->hash->decode($file);

        // Save Log
        $log_data   = \Location::get();
        $log_detail = [
            'file_name' => $file,
            'file_path' => '/storage/lab_results/'.$file,
            'url'       => url()->current(),
            'action'    => 'View Lab Result'
        ];
        $log        = LogManagement::store($log_data, $log_detail);

        $get_file = LabResult::getFile($id);

        if ($get_file->isEmpty()) {
            return back()->with('error', 'Data Not Found!');
        }

        // Get file content
        $file_content = file_get_contents('storage/lab_results/'.$get_file[0]['lab_result']);

        // Decrypt file content
        $decrypted = Crypt::decrypt($file_content);

        // Open file info and get the file type
        $f          = finfo_open();
        $mime_type  = finfo_buffer($f, $decrypted, FILEINFO_MIME_TYPE);

        return view('layouts.show_file', ['file' => $decrypted, 'type' => $mime_type]);
    }
}
