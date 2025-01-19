<?php

namespace App\Http\Controllers;

use App\Models\Taqat2\CompanyProject;
use App\Models\Taqat2\Offer;
use App\Models\Taqat2\Specialization;

class JobController extends Controller
{
    public function all()
    {
        // Get inputs
        $specializationIds = request()->input('specializations', []);
        $search = request()->input('search');
        $minBudget = request()->input('expected_budget.min', null);
        $maxBudget = request()->input('expected_budget.max', null);
        $deliveryTimes = request()->input('delivery_time', []);

        // Get specializations with project counts
        $specializations = Specialization::withCount(['company_projects'])->get();

        // Build the query for company projects
        $query = CompanyProject::with(['offers', 'company', 'specializations']);

        // Apply search filter
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // Apply budget filter
        if ($minBudget !== null && $maxBudget !== null) {
            $query->whereBetween('budget', [$minBudget, $maxBudget]);
        }

        // Filter by specializations
        if (!empty($specializationIds)) {
            $query->whereHas('specializations', function ($query) use ($specializationIds) {
                $query->whereIn('specialization_id', $specializationIds);
            });
        }

        // Filter by delivery time
        if (!empty($deliveryTimes)) {
            $query->whereIn('delivery_time', $deliveryTimes);
        }

        // Paginate results
        $projects = $query->orderBy('created_at', 'desc')->paginate(6);

        // Handle AJAX request
        if (request()->ajax()) {
            return view('front.pages.site.projects.partials.project_list', compact('projects'))->render();
        }

        return view('front.pages.site.projects.all', [
            'projects' => $projects,
            'specializations' => $specializations,
        ]);
    }


    public function index($slug)
    {
        $project = CompanyProject::with(['offers', 'company', 'specializations.specialization', 'attachments'])->where('slug', 'LIKE', "%{$slug}%")->firstOrFail();


        $user = auth('talent')->id() ?? null;

        $myOffer = Offer::where('project_id', $project->id)->where('user_id', $user)->get();
        $offers = $project->offers;

        $company = $project->company;

        // Ensure company is loaded and has the projects relationship
        $totalProjects = $company->projects->count();

        // Use `whereIn` to filter projects by status
        $filteredCount = $company->projects->whereIn('status', [2, 3])->count();
        $employmentRate = ($totalProjects > 0) ? ($filteredCount / $totalProjects) * 100 : 0;
        $roundedEmploymentRate = round($employmentRate, -2);
        $formattedEmploymentRate = number_format($roundedEmploymentRate, 1);


        return view('front.pages.site.projects.index', [
            'project' => $project,
            'myOffer' => $myOffer,
            'offers' => $offers,

            'employmentRate' => $formattedEmploymentRate
        ]);
    }


}
