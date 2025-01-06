<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\Controller;
use App\Models\taqat2\ScientificCertificate;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class EducationController extends Controller
{
    protected $connection = 'second_db';



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
                'file' => 'mimes:jpeg,png,jpg,gif,pdf,doc,docx',
            ]);



            $titleLanguage = $this->detectLanguage($request->title);
            $specializationLanguage = $this->detectLanguage($request->specialization);
            $countryLanguage = $this->detectLanguage($request->country);

            $universityLanguage = $this->detectLanguage($request->university);
            $collegeLanguage = $this->detectLanguage($request->collge);


            $title = ['ar' => '', 'en' => ''];
            $specialization = ['ar' => '', 'en' => ''];
            $country = ['ar' => '', 'en' => ''];
            $university = ['ar' => '', 'en' => ''];
            $college = ['ar' => '', 'en' => ''];


            if ($titleLanguage === 'ar') {
                $title['ar'] = $request->title;
                $title['en'] = GoogleTranslate::trans($request->title, 'en', 'ar');; // Optionally set a default or empty value for English
            } else {
                $title['ar'] = GoogleTranslate::trans($request->title, 'ar', 'en'); // Optionally set a default or empty value for English
                $title['en'] = $request->title;
            }

            if ($specializationLanguage === 'ar') {
                $specialization['ar'] = $request->specialization;
                $specialization['en'] = GoogleTranslate::trans($request->specialization, 'en', 'ar'); // Optionally set a default or empty value for English
            } else {
                $specialization['ar'] = GoogleTranslate::trans($request->specialization, 'ar', 'en'); // Optionally set a default or empty value for English
                $specialization['en'] = $request->specialization;
            }

            if ($countryLanguage === 'ar') {
                $country['ar'] = $request->country;
                $country['en'] = GoogleTranslate::trans($request->country, 'en', 'ar');; // Optionally set a default or empty value for English
            } else {
                $country['ar'] = GoogleTranslate::trans($request->country, 'ar', 'en'); // Optionally set a default or empty value for English
                $country['en'] = $request->country;
            }

            if ($universityLanguage === 'ar') {
                $university['ar'] = $request->university;
                $university['en'] = GoogleTranslate::trans($request->university, 'en', 'ar');; // Optionally set a default or empty value for English
            } else {
                $university['ar'] = GoogleTranslate::trans($request->university, 'ar', 'en'); // Optionally set a default or empty value for English
                $university['en'] = $request->university;
            }


            if ($collegeLanguage === 'ar') {
                $college['ar'] = $request->college;
                $college['en'] = GoogleTranslate::trans($request->college, 'en', 'ar');; // Optionally set a default or empty value for English
            } else {
                $college['ar'] = GoogleTranslate::trans($request->college, 'ar', 'en'); // Optionally set a default or empty value for English
                $college['en'] = $request->college;
            }

          $edu= ScientificCertificate::create([
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
                        'photo' =>$photo,
                    ]);
                }

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


    public function edit($id)
    {

        $data['scientific_certificate'] = ScientificCertificate::query()->where('id', $id)->where('user_id', auth()->id())->first() ?? abort(404);
        return view('front.scientificCertificates.edit', $data);
    }

    public function update(Request $request)
    {
        try {
            $scientific_certificate = ScientificCertificate::query()->findorfail($request->scientific_certificate_id);
            $photo = "";
            if ($request->hasFile('photo')) {
                $photo = upload($request->photo);

                $scientific_certificate->update([
                    'photo' => $photo,
                ]);
            }

            $titleLanguage = detectLanguage($request->title);
            $specializationLanguage = detectLanguage($request->specialization);
            $countryLanguage = detectLanguage($request->country);

            $universityLanguage = detectLanguage($request->university);
            $collegeLanguage = detectLanguage($request->collge);


            $title = ['ar' => '', 'en' => ''];
            $specialization = ['ar' => '', 'en' => ''];
            $country = ['ar' => '', 'en' => ''];
            $university = ['ar' => '', 'en' => ''];
            $college = ['ar' => '', 'en' => ''];


            if ($titleLanguage === 'ar') {
                $title['ar'] = $request->title;
                $title['en'] = GoogleTranslate::trans($request->title, 'en', 'ar');; // Optionally set a default or empty value for English
            } else {
                $title['ar'] = GoogleTranslate::trans($request->title, 'ar', 'en'); // Optionally set a default or empty value for English
                $title['en'] = $request->title;
            }

            if ($specializationLanguage === 'ar') {
                $specialization['ar'] = $request->specialization;
                $specialization['en'] = GoogleTranslate::trans($request->specialization, 'en', 'ar'); // Optionally set a default or empty value for English
            } else {
                $specialization['ar'] = GoogleTranslate::trans($request->specialization, 'ar', 'en'); // Optionally set a default or empty value for English
                $specialization['en'] = $request->specialization;
            }

            if ($countryLanguage === 'ar') {
                $country['ar'] = $request->country;
                $country['en'] = GoogleTranslate::trans($request->country, 'en', 'ar');; // Optionally set a default or empty value for English
            } else {
                $country['ar'] = GoogleTranslate::trans($request->country, 'ar', 'en'); // Optionally set a default or empty value for English
                $country['en'] = $request->country;
            }

            if ($universityLanguage === 'ar') {
                $university['ar'] = $request->university;
                $university['en'] = GoogleTranslate::trans($request->university, 'en', 'ar');; // Optionally set a default or empty value for English
            } else {
                $university['ar'] = GoogleTranslate::trans($request->university, 'ar', 'en'); // Optionally set a default or empty value for English
                $university['en'] = $request->university;
            }


            if ($collegeLanguage === 'ar') {
                $college['ar'] = $request->college;
                $college['en'] = GoogleTranslate::trans($request->college, 'en', 'ar');; // Optionally set a default or empty value for English
            } else {
                $college['ar'] = GoogleTranslate::trans($request->college, 'ar', 'en'); // Optionally set a default or empty value for English
                $college['en'] = $request->college;
            }


            $scientific_certificate->update([
                'title' => $title,
                'country' => $country,
                'specialization' => $specialization,
                'university' => $university,
                'college' => $college,
                'graduation_year' => $request->graduation_year,

            ]);
            return response_web(true, 'تم تنفيد العملية بنجاح', [], 201);
        } catch (\Exception $ex) {
            return response_web(false, 'هناك خطا ما يرجى محاولة لاحقا', [], 500);
        }
    }

    public function delete(Request $request)
    {
        ScientificCertificate::query()->where('id', $request->id)->delete();

        return response_web(true, 'تم تنفيد العملية بنجاح', [], 201);
    }
}
