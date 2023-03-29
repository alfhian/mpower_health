<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ClientInformation;
use App\Models\InitialHealthProfile;

use Auth;

class LogManagementController extends Controller
{
    public function index($id) {
        // Save Log
        $log_data   = \Location::get();
        $log_detail = [
            'url'       => url()->current(),
            'action'    => 'Client Email Verification'
        ];
        $log        = LogManagement::store($log_data, $log_detail);

        return view('verification_success', ['id' => $id]);
    }

    public function store($log_detail) {
        // Save Log
        $log_data   = \Location::get();
        $log        = LogManagement::store($log_data, $log_detail);

        return true;
    }
}
