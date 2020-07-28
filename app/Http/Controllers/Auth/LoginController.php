<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Userlog;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        $u = Auth::user()->roles->pluck('name');
        $log = new Userlog(['log_name' => 'Login',
        'description' => '',
        'subject_id' => Auth::id(),
        'subject_role' => $u[0]]);
        $log->save();
        return redirect()->route('home');
    }

    public function logout() {
        $u = Auth::user()->roles->pluck('name');
        $log = new Userlog(['log_name' => 'Logout',
        'description' => '',
        'subject_id' => Auth::id(),
        'subject_role' => $u[0]]);
        $log->save();
        Auth::logout();
        return redirect('/login');
      }
}
