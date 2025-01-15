<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\Controller;
use App\Models\Taqat2\Talent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TalentLoginController extends Controller
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


    public function showLoginForm()
    {
        if (Auth::guard('talent')->check()) {
            return redirect()->back();
        } else {
            return view('front.pages.talent-profile.login');


        }

    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->except(['_token', 'redirect']);
        $user = Talent::where('email', $request->email)->first();

        if ($user) {
            if (auth('talent')->attempt($credentials)) {
                // Generate an API token for auto-login
                $apiToken = Str::random(60);
                $user->api_token = $apiToken;
                $user->save();

                return redirect()->route('profile.index')
                    ->with(['message' => 'Login successful!', 'alert-type' => 'success']);
            } else {
                return redirect()->back()
                    ->with(['message' => 'Invalid credentials, please try again.', 'alert-type' => 'error']);
            }
        } else {
            return redirect()->back()
                ->with(['message' => 'User not found. Please check your email.', 'alert-type' => 'error']);
        }
    }



    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'whatsapp' => 'required|max:20',
            'email' => [
                'required',
                'email',
                'max:255',
                function ($attribute, $value, $fail) {
                    // Check the uniqueness of the email in the second database
                    $exists = DB::connection('second_db')->table('users')->where('email', $value)->exists();

                    if ($exists) {
                        $fail('The email has already been taken in the second database.');
                    }
                },
            ],
            'specialization' => 'required|string|max:255',
            'gender' => 'required|in:1,0', // 1 for male, 0 for female
            'displacement_place' => 'required|string|max:255',
            'original_place' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'photo' => 'required|image|max:2048', // Ensure photo is an image and max size is 2MB
        ]);


            $user = Talent::query()->create([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'whatsapp' => $request->whatsapp,
                'email' => $request->email,
                'job' => $request->job,
                'gender' => $request->gender,
                'displacement_place' => $request->displacement_place,
                'original_place' => $request->original_place,
                'password' => Hash::make($request->password),
                'status' => 3,
                'specialization_id'=>$request->specialization,
                'slug' => $this->generateArabicSlug($request->name),
            ]);

            if ($request->hasFile('photo')) {
                $image = $this->uploadFileImage($request->photo, 'users');
                $user->update(['photo' => url('/') . '/public/' . $image]);
            }

            Auth::guard('talent')->login($user);

            // Generate an API token for auto-login
            $apiToken = Str::random(60);
            $user->api_token = $apiToken;
            $user->save();

            // Determine the redirect URL
            $redirectUrl = $request->redirect ?: url('/profile');

            // Generate the URL for auto-login
            $teamUrl = "http://team.taqat-gaza.com/autologin?id={$user->id}&api_token={$apiToken}&redirect_url={$redirectUrl}";

            // Return JSON response with the redirect URL
            return response()->json(['redirect' => $teamUrl]);


    }



    public function logout()
    {
        Auth::guard('talent')->logout();
        return redirect()->route('home')->with(['message' => trans('main.logout_success'), 'alert-type' => 'success']);


    }

}
