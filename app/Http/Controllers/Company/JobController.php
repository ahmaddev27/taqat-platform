<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Taqat2\AttachmentProjectCompany;
use App\Models\Taqat2\CompanyProject;

use App\Models\Taqat2\Job;
use App\Models\Taqat2\SpecializationCompanyProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class JobController extends Controller
{
    public function jobs(Request $request)
    {
        $company = auth('company')->user();

        // Start the query from the relationship
        $query = $company->jobs()
            ->withCount('applies')  // Adds 'offers_count' dynamically
            ->addSelect('slug', 'job_requirements', 'title', 'sallary', 'description', 'status', 'created_at')->with(['company','specialization']);


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

//        $company->loadCount([
//            'jobs as open_jobs_count' => function ($query) {
//                $query->where('status', 1);
//            },
//            'jobs as pending_jobs_count' => function ($query) {
//                $query->where('status', 2);
//            },
//            'jobs as hired_jobs_count' => function ($query) {
//                $query->where('status', 3);
//            },
//            'jobs as close_jobs_count' => function ($query) {
//                $query->where('status', 4);
//            },
//        ]);




        // Paginate the results
        $jobs = $query->paginate(5);

        $jobsCounts = $company->jobs()
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status') // Returns an array like [1 => 10, 2 => 5, 3 => 8, 4 => 2]
            ->toArray();

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            return response()->json([
                'html' => view('front.pages.company-dashboard.jobs.partials.jobs-list', compact('jobs'))->render(),
                'jobsCounts' => $jobsCounts,
            ]);
        }

        // Return the full view if not AJAX
        return view('front.pages.company-dashboard.jobs.my-jobs', [
            'jobs' => $jobs,
            'jobsCounts' => $jobsCounts,
        ]);
    }


    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'job_requirements' => 'required|string',
            'skills' => 'required',
            'specialization_id' => 'required',
            'sallary' => 'required|numeric|min:0',
            'duration' => 'required|numeric|min:0',
            'permanent_type' => 'required',
        ]);

        try {
            DB::beginTransaction();

            // Create the project
            $job = Job::create([
                'title' => ['ar' => $request->title, 'en' => $request->title],
                'company_id' => auth('company')->id(),
                'description' => ['ar' => $request->description, 'en' => $request->description],
                'job_requirements' => ['ar' => $request->job_requirements, 'en' => $request->job_requirements],
                'skills' => $request->skills,
                'slug' => $this->generateArabicSlug($request->title),
                'sallary' => $request->sallary,
                'duration' => $request->duration,
                'permanent_type' => $request->permanent_type,
                'status' => 1,
                'specialization_id' =>  $request->specialization_id,
            ]);


            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Job saved successfully!',
            ], 201);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred.',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }


}
