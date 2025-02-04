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


class ProjectController extends Controller
{
    public function projects(Request $request)
    {
        $company = auth('company')->user();

        // Start the query from the relationship
        $query = $company->projects()
            ->withCount('offers')
            ->select('slug', 'skills','title', 'budget', 'description', 'status', 'created_at', 'delivery_time'); // select only the columns you need

        // Apply status filtering if provided in the request
        if ($request->has('status') && is_array($request->status)) {
            $query->whereIn('status', $request->status);
        }

        // Apply search filtering if search term is provided
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->whenSearch($searchTerm); // Assuming custom scope "whenSearch"
        }

        // Apply sorting by time if specified in the request
        if ($request->has('sort_time')) {
            $sortOrder = $request->sort_time === 'asc' ? 'asc' : 'desc'; // Default to descending
            $query->orderBy('created_at', $sortOrder); // Sort by created_at
        }

        $company->loadCount([
            'projects as open_projects_count' => function ($query) {
                $query->where('status', 1);
            },
            'projects as imp_projects_count' => function ($query) {
                $query->where('status', 2);
            },
            'projects as complete_projects_count' => function ($query) {
                $query->where('status', 3);
            },
        ]);

        // Paginate the results
        $projects = $query->paginate(5);

        $projectCounts = $company->projects()
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status') // Returns an array like [1 => 10, 2 => 5, 3 => 8, 4 => 2]
            ->toArray();

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            return response()->json([
                'html' => view('front.pages.company-dashboard.project.partials.projects-list', compact('projects'))->render(),
                'open_projects_count' => $company->open_projects_count,
                'imp_projects_count' => $company->imp_projects_count,
                'complete_projects_count' => $company->complete_projects_count,
                'projectCounts' => $projectCounts,
            ]);
        }

        // Return the full view if not AJAX
        return view('front.pages.company-dashboard.project.my-projects', [
            'projects' => $projects,
            'open_projects_count' => $company->open_projects_count,
            'imp_projects_count' => $company->imp_projects_count,
            'complete_projects_count' => $company->complete_projects_count,
            'projectCounts' => $projectCounts,
        ]);
    }







}
