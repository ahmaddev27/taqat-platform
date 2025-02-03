<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }



    public function showLoginForm()
    {
        if (Auth::guard('talent')->check() || Auth::guard('company')->check()) {
            return redirect()->back() ->with(['message' => 'Logging successfully', 'alert-type' => 'success']);
        } else {
            return view('auth.login');
        }

    }

    public function logoutClient()
    {
        Auth::guard('talent')->logout();
        Auth::guard('company')->logout();
        return redirect()->route('home')->with(['message' => trans('main.logout_success'), 'alert-type' => 'success']);

    }

}
