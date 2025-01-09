<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\Controller;
use App\Models\Taqat2\WorkExperience;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function store(Request $request)
    {

        try {
        $request->validate([
            'company_name' => 'required',
            'tasks' => 'required',
            'job' => 'required',
            'start_date' => 'required',
            'file' => 'mimes:jpeg,png,jpg,gif,pdf,doc,docx',
        ]);




            $title['ar'] = $request->company_name;
            $title['en'] = $request->company_name;

            $tasks['ar'] = $request->tasks;
            $tasks['en'] = $request->tasks;

            $job['ar'] = $request->job;
            $job['en'] = $request->job;

            $location['ar'] = $request->location;
            $location['en'] = $request->location;


            $work = WorkExperience::query()->create([
                'company_name' => $title,
                'user_id' => auth('talent')->id(),
                'location' => $location,
                'job' => $job,
                'start_date' => Carbon::parse($request->start_date)->format('Y-m-d'),
                'end_date' => $request->end_date ? Carbon::parse($request->end_date)->format('Y-m-d') : null,
                'tasks' => $tasks,
            ]);


            if ($request->hasFile('file')) {

                if (in_array($request->file->getClientOriginalExtension(), ['jpeg', 'png', 'jpg', 'gif'])) {
                    $photo = $this->uploadFileImage($request->file, 'Talent/Experiences');
                } else {
                    $photo = $this->uploadFile($request->file, 'Talent/Experiences');
                }
                $work->update([
                    'photo' => $photo,
                ]);
            }


            return response()->json([
                'success' => true,
                'message' => 'Work Experience Added successfully.',
            ]);


        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred.',
                'error' => $exception->getMessage(),
            ], 500);
        }
    }

    public function edit($id)
    {
        $education = WorkExperience::where('user_id', auth('talent')->id())->find($id);

        if (!$education) {
            return response()->json(['error' => 'Experience not found'], 404);
        }

        return response()->json(array_merge($education->toArray(), [
            'photo_url' => $education->getPhoto(),
            'start_date' => Carbon::parse($education->start_date)->format('Y-m-d'),
            'end_date' => $education->end_date ? Carbon::parse($education->end_date)->format('Y-m-d') : null,
        ]));
    }


    public function update(Request $request)
    {
        try {

            $request->validate([
                'company_name' => 'required',
                'tasks' => 'required',
                'job' => 'required',
                'start_date' => 'required',
                'file' => 'mimes:jpeg,png,jpg,gif,pdf,doc,docx',
            ]);



            $title['ar'] = $request->company_name;
            $title['en'] = $request->company_name;

            $tasks['ar'] = $request->tasks;
            $tasks['en'] = $request->tasks;

            $job['ar'] = $request->job;
            $job['en'] = $request->job;

            $location['ar'] = $request->location;
            $location['en'] = $request->location;




            $work = WorkExperience::query()->where('user_id', auth('talent')->id())->findorfail($request->id);

            $work->update([
                'company_name' => $title,
                'user_id' => auth('talent')->id(),
                'location' => $location,
                'job' => $job,
                'start_date' => Carbon::parse($request->start_date)->format('Y-m-d'),
                'end_date' => $request->end_date ? Carbon::parse($request->end_date)->format('Y-m-d') : null,
                'tasks' => $tasks,
            ]);



            if ($request->hasFile('file')) {

                if ($work->photo) {
                    $this->deleteFile($work->photo);
                }
                if (in_array($request->file->getClientOriginalExtension(), ['jpeg', 'png', 'jpg', 'gif'])) {
                    $photo = $this->uploadFileImage($request->file, 'Talent/Experiences');
                } else {
                    $photo = $this->uploadFile($request->file, 'Talent/Experiences');
                }
                $work->update([
                    'photo' => $photo,
                ]);
            }


            return response()->json([
                'success' => true,
                'message' => 'Experiences updated successfully.',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred.',
                'error' => $exception->getMessage(),
            ], 500);
        }
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        try {
            // Replace with your model and deletion logic
            $work = WorkExperience::where('user_id', auth('talent')->id())->find($id);

            if ($work->photo) {
                $this->deleteFile($work->photo);
            }

            $work->delete();

            return response()->json(['message' => 'Deleted successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Deletion failed!'], 500);
        }
    }


}
