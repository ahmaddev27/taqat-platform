<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\Controller;
use App\Models\Taqat2\Offer;
use App\Models\Taqat2\WorkExperience;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectProposalController extends Controller
{


        public        function store(Request $request)
        {
            try {
                // Validate the request data
                $validated = $request->validate([
                    'duration' => 'required|numeric',
                    'cost' => 'required|numeric',
                    'description' => 'required|string',
                ]);

                // Create the offer in the database
                Offer::create([
                    'duration' => $request->duration,
                    'cost' => $request->cost,
                    'description' => $request->description,
                    'project_id' => $request->project_id,
                    'user_id' => auth('talent')->id(),
                ]);

                // Return a success response
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
