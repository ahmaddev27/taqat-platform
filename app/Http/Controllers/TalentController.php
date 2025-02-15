<?php

namespace App\Http\Controllers;
use App\Models\Taqat2\Project;
use App\Models\Taqat2\Project_type;
use App\Models\Taqat2\Specialization;
use App\Models\Taqat2\Talent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class TalentController extends Controller
{


    public function all()
    {
        // Get specializations with count (used for filtering)
        $specializations = Specialization::withCount('talents')->get();

        // Start the query for talents
        $query = Talent::whereFullProfile()->with(['specialization', 'projects']);

        // Apply search filter if the search term exists
        if ($search = request()->search) {
            $query->whenSearch($search);
        }

        // Apply specializations filter if selected
        if ($specializationsFilter = request()->get('specializations', [])) {
            $query->whereIn('specialization_id', $specializationsFilter);  // Filtering based on selected specializations
        }

        // Apply stars filter if selected
        if ($stars = request()->get('stars', [])) {
            $query->whereIn('rate', $stars);  // Filtering based on selected star ratings
        }

        // Paginate the results based on the page
        $page = request()->get('page', 1);
        $talents = $query->paginate(33, ['*'], 'page', $page);

        // Calculate total experience for each talent
        $talents->each(function ($talent) {
            $totalExperienceMonths = $talent->work_experiences->reduce(function ($carry, $experience) {
                $startDate = new \DateTime($experience->start_date);
                $endDate = $experience->end_date ? new \DateTime($experience->end_date) : now();
                $interval = $startDate->diff($endDate);
                return $carry + ($interval->y * 12 + $interval->m);
            }, 0);
            $talent->total_experience_years = ceil($totalExperienceMonths / 12);
        });

        // If the request is AJAX, return just the updated HTML for the talent list and pagination
        if (request()->ajax()) {
            return response()->json([
                'html' => view('front.pages.site.talents.partials.talents-list', compact('talents'))->render(),
            ]);
        }


        // If it's a normal request (non-AJAX), return the full view
        return view('front.pages.site.talents.talents', compact('talents', 'specializations'));
    }





    public function index(Request $request, $slug)
    {
        // Find the Talent by slug
        $talent = Talent::with(['khadmats','scientificCertificate','training_courses','projects','work_experiences'])->where('slug', $slug)->firstOrFail();


        // Handle the project filtering
        if ($request->has('project_type') && is_array($request->project_type)) {
            $options = $request->project_type;
            $projects = Project::where('user_id', $talent->id)
                ->with('project_type_relation')
                ->whereIn('project_type', $options)
                ->get();
        } else {
            $projects = Project::where('user_id', $talent->id)
                ->with('project_type_relation')
                ->get();
        }

        // Handle the view count logic
        if (!Cookie::get('profile_view_' . $talent->id)) {
            Cookie::queue('profile_view_' . $talent->id, 30);
            $talent->increment('views', 1);
            $talent->save();
        }


        // Get all project types
        $project_type = Project_type::all();

        return view('front.pages.site.talents.index', [
            'talent' => $talent,
            'projects' => $projects,
            'project_type' => $project_type
        ]);
    }



}
