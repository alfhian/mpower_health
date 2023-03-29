<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hashids\Hashids;

use App\Models\ClientInformation;
use App\Models\InitialHealthProfile;
use App\Models\LabResult;
use App\Models\Recommendation;
use App\Models\LogManagement;

use Auth;
use Session;
use Redirect;

class DashboardController extends Controller
{
    public function __construct(){
        $this->hash = new Hashids("module_name", 16);
    }

    public function index() {
        $user = Auth::user();

        // Check user role
        // If the role of the user is not client role, then force log out and redirect to login page
        if ($user->role_id != 1) {
            Session::flush();
            Auth::guard('web')->logout();

            return redirect()->route('login')->with('error', 'Login details are not valid');
        }

        // Check the user status
        // If the user status is inactive, then force log out and redirect to login page
        if($user->status == 'N') {
            Session::flush();
            Auth::guard('web')->logout();
            
            return redirect()->route('login')->with('error', 'Your account has been deactivated. Please contact the administrator for further details');
        }

        $profile = ClientInformation::where('client_id', $user->id)->get();

        // Check the verified status of user
        // If the user has NOT been in a verification success notification page, then redirect to that page and then automaticaly redirect to login page
        if ($profile[0]['verified_status'] == 'N') {
            ClientInformation::where('client_id', $user->id)
            ->update(['verified_status' => 'Y']);
            return Redirect::route('verification_success', $user->id);
        }

        // Save Log
        $log_data   = \Location::get();
        $log_detail = [
            'url'       => url()->current(),
            'action'    => 'Open Client Dashboard page'
        ];
        $log        = LogManagement::store($log_data, $log_detail);

        $lab_result     = LabResult::getLabResultRecommendation();
        $recommendation = Recommendation::getTopThree();

        $data = [
            'client_id' => $user->id,
            'firstname' => $profile[0]['firstname'],
            'lastname'  => $profile[0]['lastname'],
            'email'     => $user->email,
            'personal_information' => $profile[0]['personal_information'],
            'photo'     => $user->profile_photo_path,
            'role'      => $user->role_id,
            'recommendation' => $recommendation,
            'lab_result'=> $lab_result,
            'hashids'   => $this->hash,
        ];

        return view('client.dashboard.index', $data);
    }
}
