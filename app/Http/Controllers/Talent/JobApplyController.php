<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\Controller;
use App\Models\Taqat2\JobApplies;
use Illuminate\Http\Request;

class JobApplyController extends Controller
{

    public function apply(Request $request){

        try {
            // Validate the request data
            $validated = $request->validate([
                'description' => 'required|string',
            ]);


        JobApplies::create([
            'description'=>$request->description,
            'job_id'=>$request->job_id,
            'user_id'=>auth('talent')->id(),
        ]);


        return response()->json(['message' => trans('main.success_message')], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation exceptions
            return response()->json([
                'message' => 'Validation error.',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            // Handle general exceptions
            return response()->json([
                'message' => 'An error occurred while submitting the proposal.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}
