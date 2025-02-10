<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Taqat2\Talent;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = Talent::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = Talent::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'photo' => $googleUser->getAvatar(),
                   'password' => \Illuminate\Support\Facades\Hash::make(str()->random(16)), // Dummy password
                ]);
            }


            Auth::guard('talent')->login($user);
            return redirect()->route('profile.index')->with([
                'message' => 'Logged in successfully',
                'alert-type' => 'success'
            ]);; // Change to your desired route

        } catch (\Exception $e) {
            return redirect('/login')->with([
                'message' => trans('something went wrong'),
                'alert-type' => 'error'
            ]);
        }
    }
}

