<?php

namespace App\Http\Controllers;


use App\Models\Taqat2\Company;
use Illuminate\Support\Facades\Cookie;

class CompanyController extends Controller
{


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
            ->paginate(12);

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


    public function index($id)
    {
        // Find the Talent by slug
        $company = Company::with(['jobs','projects'])->findOrFail($id);


        // Ensure company is loaded and has the projects relationship
        $totalProjects = $company->projects->count();
        $filteredProjects = $company->projects->filter(function ($project) {
            return in_array($project->status, [2, 3]);
        });
        // Use `whereIn` to filter projects by status

        $filteredCount_projects = $filteredProjects->count();
        $employmentRate_projects = ($totalProjects > 0) ? ($filteredCount_projects / $totalProjects) * 100 : 0;
        $roundedEmploymentRate_projects = round($employmentRate_projects, -2);
        $formattedEmploymentRate_projects = number_format($roundedEmploymentRate_projects, 1);
        // Handle the project filtering

        // Ensure company is loaded and has the jobs relationship
        $totalJobs = $company->jobs->count();

        $filteredJobs = $company->jobs->filter(function ($job) {
            return in_array($job->status, [2, 3]);
        });
// Use `whereIn` to filter jobs by status

        $filteredCount_jobs = $filteredJobs->count();
        $employmentRate_jobs = ($totalJobs > 0) ? ($filteredCount_jobs / $totalJobs) * 100 : 0;
        $roundedEmploymentRate_jobs = round($employmentRate_jobs, -2);
        $formattedEmploymentRate_jobs = number_format($roundedEmploymentRate_jobs, 1);

//
//        // Handle the view count logic
//        if (!Cookie::get('profile_view_' . $talent->id)) {
//            Cookie::queue('profile_view_' . $talent->id, 30);
//            $talent->increment('views', 1);
//            $talent->save();
//        }


        // Get all project types
        return view('front.pages.site.companies.index', [
            'company' => $company,
            'projects' => $company->projects,
            'jobs' => $company->jobs,
            'totalProjects' => $totalProjects,
            'employmentRate_projects' => $formattedEmploymentRate_projects,
            'employmentRate_jobs' => $formattedEmploymentRate_jobs,

        ]);
    }


}
