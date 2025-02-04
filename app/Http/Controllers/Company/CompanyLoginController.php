<?php

namespace App\Http\Controllers\Company;
use App\Http\Controllers\Controller;
use App\Models\Taqat2\Company;
use App\Models\Taqat2\Talent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompanyLoginController extends Controller
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


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }




    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only(['email', 'password']);
        $user = Company::where('email', $request->email)->first();
        $guard = 'company';

        if ($user) {
            if (auth($guard)->attempt($credentials)) {
               if ($user->status!=1){
                   return response()->json(['success' => false, 'message' => 'your Account is inactive'], 401);
               }

                if ($request->ajax()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Login successful!',
                        'redirect' => route('company.profile.index') // Adjust based on user type if needed
                    ]);
                }
                return redirect()->route('profile.index')
                    ->with(['message' => 'Login successfully!', 'alert-type' => 'success']);
            } else {
                $errorMsg = 'Invalid credentials, please try again.';
            }
        } else {
            $errorMsg = 'Invalid credentials, please try again';
        }

        if ($request->ajax()) {
            return response()->json(['success' => false, 'message' => $errorMsg], 401);
        }

        return redirect()->back()
            ->with(['message' => $errorMsg, 'alert-type' => 'error']);
    }





}
