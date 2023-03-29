<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InitialHealthProfile;
use App\Models\ClientInformation;
use App\Models\ProfilingQuestion;
use Auth;
use DB;

class ProfilingController extends Controller
{
    public function index() {
        $user       = Auth::user();
        $profiling_check = InitialHealthProfile::where('client_id', $user->id)->get();

        if ($profiling_check->isNotEmpty()) {
            return redirect('dashboard');
        }
        $profile    = ClientInformation::where('client_id', $user->id)->get();
        $step       = ProfilingQuestion::select('step','next_step','prev_step')->where('position', 1)->groupBy('step','next_step','prev_step')->get();
        $male       = ProfilingQuestion::where('gender', 1)->get();
        $female     = ProfilingQuestion::where('gender', 2)->get();

        $data = [
            'js' => 'profiling',
            'firstname' => $profile[0]['firstname'],
            'step' => $step,
            'male' => $male,
            'female' => $female,
            'position' => 1,
        ];

        return view('profiling', $data);
    }

    public function submit(Request $request) {
        
        $result = InitialHealthProfile::store($request);

        return redirect('/dashboard')->with('message', $result);
        
    }
}
