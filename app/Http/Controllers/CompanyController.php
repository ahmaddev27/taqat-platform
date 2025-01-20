<?php

namespace App\Http\Controllers;


use App\Models\Taqat2\Company;

class CompanyController extends Controller
{
    protected $connection = 'second_db';


    public function all()
    {
        // Start the query with relationships (projects and jobs)
        $query = Company::with(['projects', 'jobs']);

        // If there's a search term, apply the filtering logic
        if ($search = request()->search) {
            $query->WhenSearch($search); // Apply the search scope
        }

        // Retrieve companies with the counts of projects and jobs, ordered by these counts
        $companies = $query->withCount(['projects', 'jobs'])
            ->orderBy('projects_count', 'desc')
            ->orderBy('jobs_count', 'desc')
            ->paginate(6);

        // Check if it's an AJAX request
        if (request()->ajax()) {
            // Return only the HTML part (companies list)
            return response()->json([
                'html' => view('front.pages.site.companies.partials.companies-list', compact('companies'))->render(),
            ]);
        }

        // Return the full page for non-AJAX requests
        return view('front.pages.site.companies.companies', compact('companies'));
    }



//    public function index(Request $request, $slug)
//    {
//        // Find the Talent by slug
//        $talent = Talent::with(['khadmats','scientificCertificate','training_courses','projects','work_experiences'])->where('slug', $slug)->firstOrFail();
//
//
//        // Handle the project filtering
//        if ($request->has('project_type') && is_array($request->project_type)) {
//            $options = $request->project_type;
//            $projects = Project::where('user_id', $talent->id)
//                ->with('project_type_relation')
//                ->whereIn('project_type', $options)
//                ->get();
//        } else {
//            $projects = Project::where('user_id', $talent->id)
//                ->with('project_type_relation')
//                ->get();
//        }
//
//        // Handle the view count logic
//        if (!Cookie::get('profile_view_' . $talent->id)) {
//            Cookie::queue('profile_view_' . $talent->id, 30);
//            $talent->increment('views', 1);
//            $talent->save();
//        }
//
//
//        // Get all project types
//        $project_type = Project_type::all();
//
//        return view('front.pages.talents.index', [
//            'talent' => $talent,
//            'projects' => $projects,
//            'project_type' => $project_type
//        ]);
//    }


}
