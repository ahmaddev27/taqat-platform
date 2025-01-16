<?php

namespace App\Http\Controllers;

use App\Models\Taqat2\CompanyProject;
use App\Models\Taqat2\Specialization;

class ProjectController extends Controller
{
    public function all()
    {
        // Get inputs
        $specializationIds = request()->input('specializations', []);
        $search = request()->input('search'); // Correctly handle input
//        $expectedBudget = request()->input('expected_budget', []);
//        $minBudget = $expectedBudget['min'] ?? null;
//        $maxBudget = $expectedBudget['max'] ?? null;
//        $deliveryTimes = request()->input('delivery_time', []);

        // Get specializations with project counts
        $specializations = Specialization::withCount(['company_projects'])->get();

        // Build the query for company projects
        $query = CompanyProject::query();

//         Apply search filter
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // Apply budget filter
//        if ($minBudget !== null && $maxBudget !== null) {
//            $query->whereBetween('expected_budget', [$minBudget, $maxBudget]);
//        }

            // Filter by specializations
            if (!empty($specializationIds)) {
                $query->whereHas('specializations', function ($query) use ($specializationIds) {
                    $query->whereIn('specialization_id', $specializationIds);
                });
            }
        // Filter by delivery time
//        if (!empty($deliveryTimes)) {
//            $query->whereIn('delivery_time', $deliveryTimes);
//        }

        // Paginate results
        $projects = $query->orderBy('created_at', 'desc')->paginate(6);
        // Handle AJAX request
        if (request()->ajax()) {
            return view('front.pages.site.projects.partials.project_list', compact('projects'))->render();
        }

        return view('front.pages.site.projects.index', [
            'projects' => $projects,
            'specializations' => $specializations,
        ]);
    }

}

