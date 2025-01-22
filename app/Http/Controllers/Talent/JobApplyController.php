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

    public function index()
    {
        $talent = auth('talent')->user();

        // Base query with eager loading
        $offers = JobApplies::where('user_id', $talent->id)
            ->with(['job', 'user', 'job.company', 'job.specialization']);

        // Filter by status if provided
        if (request()->has('status') && is_array(request()->status)) {
            $options = request()->status;
            $offers->whereHas('job', function ($query) use ($options) {
                $query->whereIn('status', $options);
            });
        }

        // Fetch offers and order them by creation date
        $offers = $offers->orderBy('created_at', 'desc')->get();

        if (request()->ajax()) {
            // Render the partial view for AJAX requests
            $html = view('front.pages.talent-dashboard.offers.jobs.partials.offers-list', [
                'offers' => $offers,
                'talent' => $talent,
            ])->render();

            return response()->json([
                'html' => $html,
            ]);
        }

        // Render the main view for non-AJAX requests
        return view('front.pages.talent-dashboard.offers.jobs.my-offers', [
            'offers' => $offers,
            'talent' => $talent,
        ]);
    }


}
