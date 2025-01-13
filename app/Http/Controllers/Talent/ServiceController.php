<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\Controller;
use App\Models\Taqat2\Khadmat;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $connection = 'second_db';

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'category' => 'required',
                'price' => 'required',
                'image' => 'required|mimes:jpeg,png,jpg',
            ]);


            $title['ar'] = $request->title;
            $title['en'] = $request->title;


            $slug['ar'] =$this->generateArabicSlug( $title['en']);
            $slug['en'] = $this->generateArabicSlug( $title['en']);

            $description['ar'] = $request->description;
            $description['en'] = $request->description;

            $service = Khadmat::create([
                'title' => $title,
                'slug'=>$slug,
                'description' => $description,
                'category_id'=>$request->category,
                'user_id' => auth('talent')->id(),
                'price' => $request->price,

            ]);


            if ($request->hasFile('image')) {

                if (in_array($request->image->getClientOriginalExtension(), ['jpeg', 'png', 'jpg', 'gif'])) {
                    $photo = $this->uploadFileImage($request->image, 'Talent/Service');
                } else {
                    $photo = $this->uploadFile($request->image, 'Talent/Service');
                }
                $service->update([
                    'image' => $photo,
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Service Added successfully.',
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

}
