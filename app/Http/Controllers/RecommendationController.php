<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

use Hashids\Hashids;

use App\Models\Recommendation;
use App\Models\ClientInformation;
use App\Models\LogManagement;

use Auth;

class RecommendationController extends Controller
{
    public function __construct(){
        $this->hash = new Hashids("module_name", 16);
    }

    public function index() {
        // Save Log
        $log_data   = \Location::get();
        $log_detail = [
            'url'       => url()->current(),
            'action'    => 'Open Recommendation Report Page'
        ];
        $log        = LogManagement::store($log_data, $log_detail);

        $user           = Auth::user();
        $profile        = ClientInformation::where('client_id', $user->id)->get();
        $recommendation = Recommendation::getAllData();

        $data = [
            'client_id' => $user->id,
            'firstname' => $profile[0]['firstname'],
            'photo'     => $user->profile_photo_path,
            'role'      => $user->role_id,
            'recommendation' => $recommendation,
            'hashids'   => $this->hash,
        ];

        return view('client.recommendation.index', $data);
    }

    public function download(Request $request) {
        return response()->download(storage_path('app/public/recommendations/'.$request->recommendation));
    }

    public function showFile($file) {
        $id = $this->hash->decode($file);

        // Save Log
        $log_data   = \Location::get();
        $log_detail = [
            'file_name' => $file,
            'file_path' => '/storage/recommendations/'.$file,
            'url'       => url()->current(),
            'action'    => 'View Recommendation Report'
        ];
        $log        = LogManagement::store($log_data, $log_detail);

        $get_file = Recommendation::getFile($id);

        if ($get_file->isEmpty()) {
            return back()->with('error', 'Data Not Found!');
        }

        // Get file content
        $file_content = file_get_contents('storage/recommendations/'.$get_file[0]['recommendation']);

        // Decrypt file content
        $decrypted = Crypt::decrypt($file_content);

        // Open file info and get the file type
        $f          = finfo_open();
        $mime_type  = finfo_buffer($f, $decrypted, FILEINFO_MIME_TYPE);

        return view('layouts.show_file', ['file' => $decrypted, 'type' => $mime_type]);
    }
}
