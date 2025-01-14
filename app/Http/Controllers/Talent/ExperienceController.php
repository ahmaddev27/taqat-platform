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
                'start_date' => 'required|date',
                'end_date' => 'nullable|date|after_or_equal:start_date',
                'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx|max:2048',
            ], [
                'file.mimes' => 'The file must be one of the following types: jpeg, png, jpg, gif, pdf, doc, docx.',
                'file.max' => 'The file size must not exceed 2 MB.',
                'end_date.after_or_equal' => 'The end date must be after or equal to the start date.',

            ]);

            $title = [
                'ar' => $request->company_name,
                'en' => $request->company_name,
            ];

            $tasks = [
                'ar' => $request->tasks,
                'en' => $request->tasks,
            ];

            $job = [
                'ar' => $request->job,
                'en' => $request->job,
            ];

            $location = [
                'ar' => $request->location,
                'en' => $request->location,
            ];

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
                $extension = $request->file->getClientOriginalExtension();

                $photo = in_array($extension, ['jpeg', 'png', 'jpg', 'gif'])
                    ? $this->uploadFileImage($request->file, 'Talent/Experiences')
                    : $this->uploadFile($request->file, 'Talent/Experiences');

                $work->update([
                    'photo' => $photo,
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Work Experience Added successfully.',
            ]);
        } catch (\Exception $exception) {
            // Log the error and send a response with the error message
            \Log::error("Error storing experience: " . $exception->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving work experience.',
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
            // Validate request input
            $request->validate([
                'company_name' => 'required|string|max:255',
                'tasks' => 'required|string',
                'job' => 'required|string|max:255',
                'start_date' => 'required|date',
                'end_date' => 'nullable|date|after_or_equal:start_date',
                'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx|max:2048',
            ], [
                'file.mimes' => 'The file must be of type: jpeg, png, jpg, gif, pdf, doc, or docx.',
                'file.max' => 'The file size must not exceed 2 MB.',
                'end_date.after_or_equal' => 'The end date must be after or equal to the start date.',
            ]);

            // Localized data arrays
            $localizedFields = ['ar' => $request->company_name, 'en' => $request->company_name];
            $localizedTasks = ['ar' => $request->tasks, 'en' => $request->tasks];
            $localizedJob = ['ar' => $request->job, 'en' => $request->job];
            $localizedLocation = ['ar' => $request->location, 'en' => $request->location];

            // Fetch the experience record
            $work = WorkExperience::where('user_id', auth('talent')->id())
                ->findOrFail($request->id);

            // Update fields
            $work->update([
                'company_name' => $localizedFields,
                'user_id' => auth('talent')->id(),
                'location' => $localizedLocation,
                'job' => $localizedJob,
                'start_date' => Carbon::parse($request->start_date)->format('Y-m-d'),
                'end_date' => $request->end_date ? Carbon::parse($request->end_date)->format('Y-m-d') : null,
                'tasks' => $localizedTasks,
            ]);

            // Handle file upload
            if ($request->hasFile('file')) {
                // Delete existing file if exists
                if ($work->photo) {
                    $this->deleteFile($work->photo);
                }

                // Upload new file
                $fileExtension = $request->file->getClientOriginalExtension();
                $photo = in_array($fileExtension, ['jpeg', 'png', 'jpg', 'gif'])
                    ? $this->uploadFileImage($request->file, 'Talent/Experiences')
                    : $this->uploadFile($request->file, 'Talent/Experiences');

                // Update photo path
                $work->update(['photo' => $photo]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Experience updated successfully.',
            ]);

        } catch (\Exception $exception) {
            // Return detailed error response
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the experience.',
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
