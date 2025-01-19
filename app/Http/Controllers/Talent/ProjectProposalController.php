<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\Controller;
use App\Models\Taqat2\Offer;
use App\Models\Taqat2\WorkExperience;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectProposalController extends Controller
{


    public function store(Request $request)
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

    public function index()
    {
        $talent = auth('talent')->user();

        $offers = Offer::where('user_id', $talent->id)
            ->with(['project', 'project.specializations.specialization']);

        if (request()->status && is_array(request()->status)) {
            $options = request()->status;
            $offers->whereIn('status', $options);
        }

        // Fetch all offers without pagination
        $offers = $offers->orderBy('created_at', 'desc')->get();

        if (request()->ajax()) {
            // Return the HTML content in the AJAX response
            $html = view('front.pages.talent-profile.offers.project.partials.offers-list', [
                'offers' => $offers,
                'talent' => $talent
            ])->render();

            return response()->json([
                'html' => $html
            ]);
        }

        return view('front.pages.talent-profile.offers.project.my-offers', ['offers' => $offers, 'talent' => $talent]);
    }


}

