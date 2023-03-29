<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

use App\Models\User;
use App\Models\LogManagement;

class HomeController extends Controller
{
    public function index(Request $request) {
        // Save Log
        $log_data   = \Location::get();
        $log_detail = [
            'url'       => url()->current(),
            'action'    => 'Open Home / Landing page'
        ];
        $log        = LogManagement::store($log_data, $log_detail);

        $data = [
            'js' => 'home'
        ];

        return view('home.index', $data);
    }

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

    public function logout(Request $request)
    {
        // Save Log
        $log_data   = \Location::get();
        $log_detail = [
            'url'       => url()->current(),
            'action'    => 'Log Out'
        ];
        $log        = LogManagement::store($log_data, $log_detail);

        $this->guard->logout();

        $route = $request->route;

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($route != '' || $route != NULL) {
            return redirect($route);
        }
        
        return redirect()->route('login');
    }

    public function forgot_password_attempt($email) {
        // Check the forgot password attempt from the user
        $get_attempt = User::checkLimit($email);
        
        // If the user EXIST and forgot password limit is MORE THAN 0
        // Then return TRUE, else return FALSE (for validation purpose)
        if (!$get_attempt->isEmpty()) {
            $attempt = $get_attempt[0]['reset_password_limit'];
            if ($attempt > 0) {
                return true;
            }
            return false;
        }

        return true;
    }
}
