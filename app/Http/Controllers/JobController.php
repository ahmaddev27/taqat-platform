<?php

namespace App\Http\Controllers;

use App\Models\Taqat2\CompanyProject;
use App\Models\Taqat2\Job;
use App\Models\Taqat2\JobApplies;
use App\Models\Taqat2\Offer;
use App\Models\Taqat2\Specialization;

class JobController extends Controller
{


    public function all()
    {
        $specializations = Specialization::withCount('jobs')->get();
        $minBudget = request()->input('expected_budget.min', null);
        $maxBudget = request()->input('expected_budget.max', null);
        $query = Job::with(['applies', 'company', 'specialization']);


        if ($search = request()->search) {
            $query->WhenSearch($search);
        }



        if ($minBudget !== null && $maxBudget !== null) {
            $query->whereBetween('sallary', [$minBudget, $maxBudget]);
        }



        if (request()->specializations && is_array(request()->specializations)) {
            $options = request()->specializations;
            $query->whereIn('specialization_id', $options);
        }


        $jobs = $query->orderBy('created_at', 'desc')->paginate(6); // Adjust pagination size if needed

        if (request()->ajax()) {
            return view('front.pages.site.jobs.partials.jobs_list', compact('jobs'))->render();
        }

        return view('front.pages.site.jobs.all', [
            'jobs' => $jobs,
            'specializations' => $specializations,
        ]);
    }


    public function index($slug)
    {

        $job = Job::where('slug', 'LIKE', "%{$slug}%")->with(['applies', 'company', 'specialization'])->firstOrFail();

        $user = auth('talent')->id() ?? null;

        $MyApply = JobApplies::where('job_id', $job->id)->where('user_id', $user)->get();
        $applies = $job->applies;

        $company = $job->company;

        // Ensure company is loaded and has the projects relationship
        $totalProjects = $company->projects->count();

        $filteredProjects = $company->jobs->filter(function ($project) {
            return in_array($project->status, [2, 3]);
        });
        // Use `whereIn` to filter projects by status
        $filteredCount = $filteredProjects->count();
        $employmentRate = ($totalProjects > 0) ? ($filteredCount / $totalProjects) * 100 : 0;
        $roundedEmploymentRate = round($employmentRate, -2);
        $formattedEmploymentRate = number_format($roundedEmploymentRate, 1);

        return view('front.pages.site.jobs.index', [
            'applies' => $applies,
            'MyApply' => $MyApply,
            'job' => $job,
            'employmentRate' => $formattedEmploymentRate
        ]);
    }


}
