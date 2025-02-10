<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Taqat2\Company;
use App\Models\Taqat2\Talent;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:second_db.' . ($data['register_type'] === 'company' ? 'companies' : 'users') . ',email'
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return $data['register_type'] === 'company'
            ? Company::create([
                'name' => $data['name'],
                'user_name' => $data['name'], // Consider removing if unnecessary
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ])
            : Talent::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
    }


    /**
     * Override default registration logic to handle AJAX requests.
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        // Create the user based on register type
        $user = $this->create($request->all());

        // Log out any existing user to prevent session conflicts
        Auth::logout();

        // Determine where to redirect after registration
        if ($request->register_type === 'company') {
            Auth::guard('company')->login($user); // Ensure 'company' guard is used
            return response()->json([
                'message' => 'Registration successful!',
                'redirect' => route('company.profile.index'),
            ]);
        }

        Auth::guard('talent')->login($user); // Ensure 'talent' guard is used
        return response()->json([
            'message' => 'Registration successful!',
            'redirect' => route('profile.index'),
        ]);
    }

}
