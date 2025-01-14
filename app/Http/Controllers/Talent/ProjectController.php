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
                'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
                'images' => 'nullable|array|max:10', // Limit to 10 additional images
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ],
                [
                    'photo.mimes' => 'The file must be of type: jpeg, png, jpg.',
                    'photo.max' => 'The file size must not exceed 2 MB.',
                    'images.mimes' => 'The file must be of type: jpeg, png, jpg.',
                    'images.max' => 'The file size must not exceed 2 MB.',

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
                    $imagePath = $this->uploadFileImage($image, 'Talent/Projects');
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
        // Retrieve the project by user_id and project_id
        $project = Project::where('user_id', auth('talent')->id())->find($request->project_id);

        if ($project) {
            // Find the image record to delete
            $image = $request->file_key;
            $imageFile = ProjectImage::find($image);

            // Check if the image exists
            if ($imageFile) {
                // Delete the physical file
                $this->deleteFile($imageFile->photo);

                // Delete the image record from the database
                $imageFile->delete();

                // Return the remaining images as a response
                return response()->json([
                    'success' => true,
                    'images' => $project->images->map(function ($image) {
                        return [
                            'id' => $image->id,  // Add the image ID
                            'url' => $image->getPhoto()  // Add the image URL
                        ];
                    })
                ]);
            }

            // If the image wasn't found, return an error
            return response()->json(['success' => false, 'message' => 'Image not found'], 404);
        }

        // If the project isn't found, return an error
        return response()->json(['success' => false, 'message' => 'Project not found'], 404);
    }


    public function update(Request $request)
    {
        try {
            // Validate input
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'url' => 'nullable|url',
                'project_type' => 'required|exists:App\Models\Taqat2\Project_type,id',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'images' => 'nullable|array|max:10', // Limit to 10 additional images
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ],
                [
                    'photo.mimes' => 'The file must be of type: jpeg, png, jpg.',
                    'photo.max' => 'The file size must not exceed 2 MB.',
                    'images.mimes' => 'The file must be of type: jpeg, png, jpg.',
                    'images.max' => 'The file size must not exceed 2 MB.',

                ]);

            // Localize title and description
            $title = ['ar' => $request->title, 'en' => $request->title];
            $description = ['ar' => $request->description, 'en' => $request->description];

            $project = Project::query()->where('user_id', auth('talent')->id())->findorfail($request->id);


            if ($request->hasFile('photo')) {
                if ($project->photo) {
                    $this->deleteFile($project->photo);
                }

                $photo = $this->uploadFileImage($request->photo, 'Talent/Projects');
                $project->update([
                    'photo' => $photo,
                ]);
            }
            // Create the project

            $project->update([
                'title' => $title,
                'user_id' => auth('talent')->id(),
                'url' => $request->url,
                'description' => $description,
                'project_type' => $request->project_type,
            ]);

            // Handle additional images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imagePath = $this->uploadFileImage($image, 'Talent/Projects');
                    ProjectImage::create([
                        'project_id' => $project->id,
                        'photo' => $imagePath,
                    ]);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Project Updated  successfully.',
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

