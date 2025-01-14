<?php

namespace App\Http\Controllers\Talent;

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


class ProfileController extends Controller
{
    protected $connection = 'second_db';

    /**
     * Display a listing of the resource.
     */


    public function profile()
    {

        $talent = auth('talent')->user();

        $specialization_id = $talent->specialization_id;
        $offers = $talent->offers()->with('project.specializations.specialization')->get()->take(3);

        $relatedProjects = CompanyProject::where('status',1)->whereHas('specializations', function ($query) use ($specialization_id) {
            $query->where('specialization_id', $specialization_id);
        })->get()->take(3);

//        $relatedProjects = CompanyProject::all()->take(3);

        $jobsApplies=JobApplies::with('job')->where('user_id',$talent->id)->get()->take(3);

        $servics=$talent->khadmats()->get();

        $totalExperienceMonths = $talent->work_experiences->reduce(function ($carry, $experience) {
            $startDate = new \DateTime($experience->start_date);
            $endDate = $experience->end_date ? new \DateTime($experience->end_date) : now();
            $interval = $startDate->diff($endDate);
            return $carry + ($interval->y * 12 + $interval->m);
        }, 0);


        $talent->total_experience_years = ceil($totalExperienceMonths / 12);
        return view('front.pages.talent-profile.profile'
            , ['talent' => $talent, 'relatedProjects' => $relatedProjects,'offers'=>$offers,'jobsApplies'=>$jobsApplies,'services'=>$servics]);
    }


    public function update(Request $request)
    {
        $user = auth('talent')->user();

        try {
            $request->validate([
                'name' => 'required',
                'bio' => 'required',
                'whatsapp' => 'required',
                'sallary' => 'required',
                'skills' => 'required',
                'specialization_id' => 'required',
            ]);


            if ($request->hasFile('photo')) {
                if ($user->photo) {
                    $this->deleteFile($user->photo);
                }
                $photo = $this->uploadFileImage($request->photo, 'Talent/Avatars', 300, 300);
                $user->update(['photo' => $photo]);
            }

            $user->update([
                'bio' => $request->bio,
                'name' => $request->name,
                'whatsapp' => $request->whatsapp,
                'sallary' => $request->sallary,
                'skills' => $request->skills,
                'specialization_id' => $request->specialization_id,
                'slug' => $this->generateArabicSlug($request->name),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Profile updated successfully.',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred.',
                'error' => $exception->getMessage(),
            ], 500);
        }
    }



    public function all_offers() {
        $talent = auth('talent')->user();

        $offers = Offer::where('user_id', $talent->id)->with('project.specializations.specialization');

        if (request()->status && is_array(request()->status)) {
            $options = request()->status;
            $offers->whereIn('status', $options);
        }

        $offers = $offers->orderBy('created_at', 'desc')->paginate(5); // Using pagination

        if (request()->ajax()) {
            $data = view('front.themes.' . \setting('them') . '.pages.talent.all_offers_list', compact('offers', 'talent'))->render();
            return response()->json([
                'html' => $data,
                'page' => $offers->currentPage(),
                'lastPage' => $offers->lastPage(),
            ]);
        }

        return view('front.themes.' . \setting('them') . '.pages.talent.all_offers', ['offers' => $offers, 'talent' => $talent]);
    }


    public function all_jobs() {
        $talent = auth('talent')->user();
        $applies = JobApplies::where('user_id', $talent->id)->with('job');

        if (request()->status && is_array(request()->status)) {
            $options = request()->status;
            $applies = JobApplies::whereHas('job', function($query) use ($options) {
                $query->whereIn('status', $options);
            });
        }

        $applies = $applies->orderBy('created_at', 'desc')->paginate(5); // Using pagination

        if (request()->ajax()) {
            $data = view('front.themes.' . \setting('them') . '.pages.talent.all_applies_list', compact('applies', 'talent'))->render();
            return response()->json([
                'html' => $data,
                'page' => $applies->currentPage(),
                'lastPage' => $applies->lastPage(),
            ]);
        }

        return view('front.themes.' . \setting('them') . '.pages.talent.all_applies', ['applies' => $applies, 'talent' => $talent]);
    }




}
