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
        $skills = request()->input('skills', []);
        $search = request()->search;
        $expectedBudget = request()->input('expected_budget');

        // Get specializations with the project count
        $specializations = Specialization::withCount(['company_projects'])->get();

        // Start building the query for company projects
        $query = CompanyProject::query();

        // Apply search filter if provided
        if ($search) {
            $query->when($search, function ($query, $search) {
                $query->WhenSearch($search);
            });
        }

        // Apply budget filter if provided
        if ($expectedBudget) {
            $query->where('expected_budget', 'like', '%' . $expectedBudget . '%');
        }

        // Filter by specializations if provided
        if (!empty($specializationIds)) {
            $query->whereHas('specializations', function ($query) use ($specializationIds) {
                $query->whereIn('specialization_id', $specializationIds);
            });
        }

        // Filter by skills if provided
        if (!empty($skills)) {
            $query->where(function ($query) use ($skills) {
                foreach ($skills as $skill) {
                    $query->orWhereJsonContains('skills', ['value' => $skill]);
                }
            });
        }

        // Order and paginate the results
        $projects = $query->orderBy('created_at', 'desc')->paginate(6); // Adjust pagination as needed

        // Return the view with data
        return view('front.pages.site.projects.index', [
            'projects' => $projects,
            'specializations' => $specializations
        ]);
    }

}
