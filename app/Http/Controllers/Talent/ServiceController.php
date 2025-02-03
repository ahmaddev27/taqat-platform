<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\Controller;
use App\Models\Taqat2\Khadmat;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'category' => 'required',
                'price' => 'required|numeric|min:5',
                'image' => 'required|mimes:jpeg,png,jpg|max:2048',// Optional max file size (in bytes)
            ],
                [
                'title.required' => 'Please enter the title.',
                'category.required' => 'Please select a category.',
                'description.required' => 'Please provide a description.',
                'price.required' => 'Please enter a price.',
                'price.numeric' => 'Price must be a number.',
                'price.min' => 'Price cannot be under 5.',
                'image.required' => 'Please upload an image.',
                'image.mimes' => 'The image must be a jpeg, png, or jpg file.',
                'image.max' => 'The image size cannot exceed 2MB.',
            ]);

            $title = [
                'ar' => $request->title,
                'en' => $request->title,
            ];

            $slug = [
                'ar' => $this->generateArabicSlug($title['en']),
                'en' => $this->generateArabicSlug($title['en']),
            ];

            $description = [
                'ar' => $request->description,
                'en' => $request->description,
            ];

            $service = Khadmat::create([
                'title' => $title,
                'slug' => $slug,
                'description' => $description,
                'category_id' => $request->category,
                'user_id' => auth('talent')->id(),
                'price' => $request->price,
            ]);

            if ($request->hasFile('image')) {
                $photo = $this->uploadFileImage($request->image, 'Talent/Service');
                $service->update([
                    'image' => $photo,
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Service added successfully.',
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
            $ser = Khadmat::where('user_id', auth('talent')->id())->find($id);

            if ($ser->photo) {
                $this->deleteFile($ser->photo);
            }

            $ser->delete();

            return response()->json(['message' => 'Deleted successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Deletion failed!'], 500);
        }
    }


    public function edit($id)
    {
        $service = Khadmat::where('user_id', auth('talent')->id())->find($id);

        if (!$service) {
            return response()->json(['error' => 'Service not found'], 404);
        }

        return response()->json(array_merge($service->toArray(), ['photo_url' => $service->getPhoto()]));
    }


    public function update(Request $request)
    {

        $service = Khadmat::where('user_id', auth('talent')->id())->find($request->id);

        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'category' => 'required',
                'price' => 'required',
                'image' => 'mimes:jpeg,png,jpg',
            ]);


            $title['ar'] = $request->title;
            $title['en'] = $request->title;


            $slug['ar'] = $this->generateArabicSlug($title['en']);
            $slug['en'] = $this->generateArabicSlug($title['en']);

            $description['ar'] = $request->description;
            $description['en'] = $request->description;

            $service->update([
                'title' => $title,
                'slug' => $slug,
                'description' => $description,
                'category_id' => $request->category,
                'price' => $request->price,

            ]);


            if ($request->hasFile('image')) {

                if ($service->photo) {
                    $this->deleteFile($service->photo);
                }
                $photo = $this->uploadFileImage($request->image, 'Talent/Service');

                $service->update([
                    'image' => $photo,
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Service Updated successfully.',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred.',
                'error' => $exception->getMessage(),
            ], 500);
        }
    }


}
