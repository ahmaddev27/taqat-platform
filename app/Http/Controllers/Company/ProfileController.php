<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Taqat2\CompanyProject;
use App\Models\Taqat2\JobApplies;
use App\Models\Taqat2\Offer;
use App\Models\Taqat2\Project;
use App\Models\Taqat2\Project_type;
use App\Models\Taqat2\Specialization;
use App\Models\Taqat2\Talent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class ProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     */


    public function profile()
    {

        if (!auth('company')->check()) {
           abort(401);
        }

        $company = auth('company')->user()->load([
            'projects',
            'jobs'
        ])->loadCount([
            'projects',
            'jobs',
            'Openjobs',
            'Openprojects',
            'Impprojects',
            'completeProjects',
            'Impjobs',
            'completejobs'
        ]);


        return view('front.pages.company-dashboard.profile'
            , ['company' => $company]);
    }


    public function update(Request $request)
    {
        $user = auth('company')->user();

        try {
            $request->validate([
                'email' => 'required|email|unique:second_db.companies,email,' . $user->id,

                'name' => 'required',
                'bio' => 'required',
                'mobile' => 'required',
                'location' => 'required',
            ]);


            if ($request->hasFile('photo')) {
                if ($user->photo) {
                    $this->deleteFile($user->photo);
                }
                $photo = $this->uploadFileImage($request->photo, 'Companies/Avatars', 300, 300);
                $user->update(['photo' => $photo]);
            }

            $user->update([
                'description' => $request->bio,
                'email' => $request->email,
                'name' => $request->name,
                'mobile' => $request->mobile,
                'location' => $request->location,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Profile updated successfully.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error.',
                'errors' => $exception->errors(), // Returns detailed validation errors
            ], 422);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred.',
                'error' => $exception->getMessage(),
            ], 500);
        }
    }







}
