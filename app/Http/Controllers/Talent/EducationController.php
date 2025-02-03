<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\Controller;
use App\Models\Taqat2\ScientificCertificate;
use Illuminate\Http\Request;

class EducationController extends Controller
{

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'specialization' => 'required',
                'country' => 'required',
                'university' => 'required',
                'college' => 'required',
                'graduation_year' => 'required',
                'file' => 'file|mimes:jpeg,png,jpg,gif,pdf,doc,docx|max:2048' // 2048 KB = 2 MB
            ],
                ['file.mimes' => 'The file must be one of the following types: jpeg, png, jpg, gif, pdf, doc, docx.',
                    'file.max' => 'The file size must not exceed 2 MB.',
                ]);


            $title = [
                'ar' => $request->title,
                'en' => $request->title
            ];
            $specialization = [
                'ar' => $request->specialization,
                'en' => $request->specialization
            ];
            $country = [
                'ar' => $request->country,
                'en' => $request->country
            ];
            $university = [
                'ar' => $request->university,
                'en' => $request->university
            ];
            $college = [
                'ar' => $request->college,
                'en' => $request->college
            ];


            $edu = ScientificCertificate::create([
                'title' => $title,
                'user_id' => auth('talent')->id(),
                'country' => $country,
                'specialization' => $specialization,
                'university' => $university,
                'college' => $college,
                'graduation_year' => $request->graduation_year,

            ]);


            if ($request->hasFile('file')) {

                if (in_array($request->file->getClientOriginalExtension(), ['jpeg', 'png', 'jpg', 'gif'])) {
                    $photo = $this->uploadFileImage($request->file, 'Talent/Educations');
                } else {
                    $photo = $this->uploadFile($request->file, 'Talent/Educations');
                }
                $edu->update([
                    'photo' => $photo,
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Education Added successfully.',
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
        $education = ScientificCertificate::where('user_id', auth('talent')->id())->find($id);

        if (!$education) {
            return response()->json(['error' => 'Education not found'], 404);
        }

        return response()->json(array_merge($education->toArray(), ['photo_url' => $education->getPhoto()]));
    }


    public function update(Request $request)
    {

        try {
            $request->validate([
                'title' => 'required',
                'specialization' => 'required',
                'country' => 'required',
                'university' => 'required',
                'college' => 'required',
                'graduation_year' => 'required',
                'file' => 'file|mimes:jpeg,png,jpg,gif,pdf,doc,docx|max:2048' // 2048 KB = 2 MB
            ],
                ['file.mimes' => 'The file must be one of the following types: jpeg, png, jpg, gif, pdf, doc, docx.',
                    'file.max' => 'The file size must not exceed 2 MB.',
                ]);
            $edu = ScientificCertificate::query()->where('user_id', auth('talent')->id())->findorfail($request->id);


            $title = [
                'ar' => $request->title,
                'en' => $request->title
            ];
            $specialization = [
                'ar' => $request->specialization,
                'en' => $request->specialization
            ];
            $country = [
                'ar' => $request->country,
                'en' => $request->country
            ];
            $university = [
                'ar' => $request->university,
                'en' => $request->university
            ];
            $college = [
                'ar' => $request->college,
                'en' => $request->college
            ];


            $edu->update([
                'title' => $title,
                'country' => $country,
                'specialization' => $specialization,
                'university' => $university,
                'college' => $college,
                'graduation_year' => $request->graduation_year,

            ]);


            if ($request->hasFile('file')) {

                if ($edu->photo) {
                    $this->deleteFile($edu->photo);
                }
                if (in_array($request->file->getClientOriginalExtension(), ['jpeg', 'png', 'jpg', 'gif'])) {
                    $photo = $this->uploadFileImage($request->file, 'Talent/Educations');
                } else {
                    $photo = $this->uploadFile($request->file, 'Talent/Educations');
                }
                $edu->update([
                    'photo' => $photo,
                ]);
            }


            return response()->json([
                'success' => true,
                'message' => 'Education Added successfully.',
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
            $edu = ScientificCertificate::where('user_id', auth('talent')->id())->find($id);

            if ($edu->photo) {
                $this->deleteFile($edu->photo);
            }

            $edu->delete();

            return response()->json(['message' => 'Deleted successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Deletion failed!'], 500);
        }
    }

}
