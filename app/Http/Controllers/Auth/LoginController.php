<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


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
        $this->middleware('guest')->except(['logout', 'updatePassword']);

        $this->middleware(function ($request, $next) {
            foreach (['company', 'talent', 'web'] as $guard) {
                if (Auth::guard($guard)->check()) {
                    return $next($request);
                }
            }

            // Abort with unauthorized response instead of redirecting
            return abort(403, 'Unauthorized');
        })->only(['logout', 'updatePassword']);
    }


    public function showLoginForm()
    {
        if (Auth::guard('talent')->check() || Auth::guard('company')->check()) {
            return redirect()->back() ->with(['message' => 'Logging successfully', 'alert-type' => 'success']);
        } else {
            return view('auth.login');
        }

    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $guards = ['company', 'talent', 'web'];
        $user = null;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();
                break;
            }
        }

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['errors' => ['old_password' => ['The old password is incorrect.']]], 422);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Password updated successfully!'], 200);
    }



    public function logout()
    {
        $guards = ['company', 'talent', 'web'];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
                break; // Stop after logging out the first authenticated guard
            }
        }

        return redirect()->route('home')->with([
            'message' => trans('main.logout_success'),
            'alert-type' => 'success'
        ]);
    }




}
