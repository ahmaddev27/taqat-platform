<?php

namespace App\Http\Controllers;

use App\Models\Taqat2\CompanyProject;
use App\Models\Taqat2\JobApplies;
use App\Models\Taqat2\Offer;
use App\Models\Taqat2\Project;
use App\Models\Taqat2\Project_type;
use App\Models\Taqat2\Specialization;
use App\Models\Taqat2\Talent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class TalentController extends Controller
{
    protected $connection = 'second_db';


    public function all()
    {
        $specializations = Specialization::withCount('talents')->get();
        $query = Talent::Wherefullprofile()->with(['specialization', 'projects']);

        // Search filter
        if ($search = request()->search) {
            $query->WhenSearch($search);
        }

        // Specializations filter
        if (request()->specializations && is_array(request()->specializations)) {
            $options = request()->specializations;
            $query->whereIn('specialization_id', $options);
        }

        // Star rating filter
        if ($stars = request()->stars) {
            $query->whereIn('rate', $stars);
        }

        // Paginate and calculate total experience
        $talents = $query->paginate(33);
        $talents->each(function ($talent) {
            $totalExperienceMonths = $talent->work_experiences->reduce(function ($carry, $experience) {
                $startDate = new \DateTime($experience->start_date);
                $endDate = $experience->end_date ? new \DateTime($experience->end_date) : now();
                $interval = $startDate->diff($endDate);
                return $carry + ($interval->y * 12 + $interval->m);
            }, 0);
            $talent->total_experience_years = ceil($totalExperienceMonths / 12);
        });

        return view('front.pages.talents.talents', compact('talents', 'specializations'));
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

        return view('front.pages.talents.index', [
            'talent' => $talent,
            'projects' => $projects,
            'project_type' => $project_type
        ]);
    }



}
