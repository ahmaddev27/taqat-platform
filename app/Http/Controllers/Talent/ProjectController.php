<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\Controller;
use App\Models\Taqat2\Project;
use App\Models\Taqat2\ProjectImage;
use App\Models\Taqat2\ScientificCertificate;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $connection = 'second_db';


    public function store(Request $request)
    {
        try {
            // Validate input
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'url' => 'nullable|url',
                'project_type' => 'required|exists:App\Models\Taqat2\Project_type,id',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'images' => 'nullable|array|max:10', // Limit to 10 additional images
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            // Localize title and description
            $title = ['ar' => $request->title, 'en' => $request->title];
            $description = ['ar' => $request->description, 'en' => $request->description];

            // Handle the main image
            $photo = $request->hasFile('photo') ? $this->uploadFileImage($request->file('photo'), 'Talent/Projects') : null;

            // Create the project
            $project = Project::create([
                'title' => $title,
                'user_id' => auth('talent')->id(),
                'url' => $request->url,
                'description' => $description,
                'photo' => $photo,
                'project_type' => $request->project_type,
            ]);

            // Handle additional images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imagePath =$this->uploadFileImage($image, 'Talent/Projects');
                    ProjectImage::create([
                        'project_id' => $project->id,
                        'photo' => $imagePath,
                    ]);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Project added successfully.',
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
        $project = Project::with('images')->where('user_id', auth('talent')->id())->find($id);

        if (!$project) {
            return response()->json(['error' => 'Project not found'], 404);
        }

        return response()->json(array_merge($project->toArray(), [
            'photo_url' => $project->getPhoto(),
            'description' => strip_tags($project->description),
            'images' => $project->images->map(function ($image) {
                return [
                    'id' => $image->id,  // Add the image ID
                    'url' => $image->getPhoto()  // Add the image URL
                ];
            })
        ]));

    }

    public function delete(Request $request)
    {
        $id = $request->id;
        try {
            // Fetch the project by user_id and project id
            $project = Project::where('user_id', auth('talent')->id())->find($id);

            if ($project) {
                // If the project has a photo, delete it
                if ($project->photo) {
                    $this->deleteFile($project->photo);
                }

                // If the project has associated images, delete them
                if ($project->images) {
                    foreach ($project->images as $image) {
                        $this->deleteFile($image->photo); // Deleting each image's file
                        // Optionally delete the image record if necessary
                        $image->delete();
                    }
                }

                // Delete the project
                $project->delete();

                return response()->json(['message' => 'Deleted successfully!'], 200);
            } else {
                return response()->json(['message' => 'Project not found!'], 404);
            }
        } catch (\Exception $e) {
            // Handle errors
            return response()->json(['message' => 'Deletion failed!', 'error' => $e->getMessage()], 500);
        }
    }



    public function deleteImage(Request $request)
    {
return        $project = Project::find($request->id);

//        if ($project) {
//            // Assuming images are stored in a JSON field or an array in the DB
//            $images = json_decode($project->images, true);
//
//            // Find the image and remove it from the array
//            if (($key = array_search($request->image_key, $images)) !== false) {
//                unset($images[$key]);
//                $project->images = json_encode(array_values($images));  // Reindex the array
//                $project->save();
//
//                // Delete the image file from storage
//                $imagePath = storage_path('app/public/' . $request->image_key); // Adjust path as necessary
//                if (file_exists($imagePath)) {
//                    unlink($imagePath); // Delete the image from storage
//                }
//
//                return response()->json(['success' => true]);
//            }
//        }
//
//        return response()->json(['success' => false], 400);
//    }



}
}
