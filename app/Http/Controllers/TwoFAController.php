<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\StatefulGuard;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserCode;
use App\Models\LogManagement;

use App;
use Auth;
use Session;

class TwoFAController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        // Check if user already tried to log in
        // If not, then redirect to home page
        if(Session::get('2fa_code') == null) {
            return redirect()->route('home');
        }

        // Check if user already logged in
        // If yes, then redirect to dashboard page
        if(Auth::check()) {
            return redirect()->route('dashboard');
        }

        
        // Save Log
        $log_data   = \Location::get();
        $log_detail = [
            'url'       => url()->current(),
            'action'    => 'Open Multi-factor Authentication Page'
        ];
        $log        = LogManagement::store($log_data, $log_detail);

        return view('auth.2fa');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'=>'required',
        ]);

        $user = User::where('email', Session::get('email'))->get();
  
        $find = UserCode::where('user_id', $user[0]['id'])
                        ->where('code', $request->code)
                        ->where('updated_at', '>=', now()->subMinutes(2))
                        ->first();
  
        if (!is_null($find)) {
            Session::put('user_2fa', $user[0]['id']);
            
            $req = [
                'email' => Session::get('email'),
                'password' => Session::get('password')
            ];

            return App::make(AuthenticatedSessionController::store_2fa($req))->needs(StatefulGuard::class);
        }
  
        return back()->with('error', 'You entered wrong code.');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function resend()
    {
        // Save Log
        $log_data   = \Location::get();
        $log_detail = [
            'url'       => url()->current(),
            'action'    => 'Resend Authentication Code'
        ];
        $log        = LogManagement::store($log_data, $log_detail);

        // Generate Authentication Code and Send via Email
        User::generateCode();
  
        return back()->with('success', 'We sent you code on your email.');
    }
}
