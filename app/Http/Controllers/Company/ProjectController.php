<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Taqat2\AttachmentProjectCompany;
use App\Models\Taqat2\CompanyProject;

use App\Models\Taqat2\SpecializationCompanyProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    public function projects(Request $request)
    {
        $company = auth('company')->user();

        // Start the query from the relationship
        $query = $company->projects()
            ->withCount('offers')  // Adds 'offers_count' dynamically
            ->addSelect('slug', 'skills', 'title', 'budget', 'description', 'status', 'created_at', 'delivery_time')->with('company');


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
                'projectCounts' => $projectCounts,
            ]);
        }

        // Return the full view if not AJAX
        return view('front.pages.company-dashboard.project.my-projects', [
            'projects' => $projects,
            'projectCounts' => $projectCounts,
        ]);
    }


    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'received_required' => 'required|string',
            'skills' => 'required',
            'specializations' => 'required|array',
            'expected_budget' => 'nullable|numeric|min:0',
            'similar_example' => 'nullable|string',
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        try {
            DB::beginTransaction();

            // Create the project
            $project = CompanyProject::create([
                'title' => ['ar' => $request->title, 'en' => $request->title],
                'company_id' => auth('company')->id(),
                'description' => ['ar' => $request->description, 'en' => $request->description],
                'received_required' => ['ar' => $request->received_required, 'en' => $request->received_required],
                'skills' => $request->skills,
                'slug' => $this->generateArabicSlug($request->title),
                'expected_budget' => $request->budget,
                'budget' => $request->budget,
                'similar_example' => $request->similar_example,
                'status' => 1,
            ]);

            // Attach specializations
            // Insert specializations manually
            foreach ($request->specializations as $specializationId) {
                SpecializationCompanyProject::create([
                    'project_company_id' => $project->id,
                    'specialization_id' => $specializationId,
                ]);
            }


            // Handle file attachments
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $image) {
                    $imagePath = $this->uploadFile($image, 'Company/Projects');
                    AttachmentProjectCompany::create([
                        'project_company_id' => $project->id,
                        'attachment' => $imagePath,
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Project saved successfully!',
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
