<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function uploadFileImage($file, $path = '',$w='',$h='')
    {
        $ImageName = str_random(16) . '.' . $file->getClientOriginalExtension();
        $ImagePath = public_path() . '/uploads/images/' . $path  . '/';
        // check if directory for ProfileImage  exists, if not then create one
        if (!File::exists($ImagePath)) {
            File::makeDirectory($ImagePath, 0777, true);
        }
        // save the ProfileImage as it is
        Image::make($file->getRealPath())->resize($w,$h)->interlace(true)->save($ImagePath . $ImageName);
        return url('').'/uploads/images/'. $path  . '/' . $ImageName;

    }




    protected function deleteImage($image)
    {
        $imagePath = str_replace(url('/'), '', $image);
        if (!is_null($imagePath) && file_exists(public_path() . $imagePath)) {
            unlink(public_path() . $imagePath);
            return true;
        }
        return false;
    }


    function generateArabicSlug($text) {
        // Convert to lowercase
        $text = mb_strtolower($text, 'UTF-8');

        // Replace spaces and other non-alphanumeric characters with dashes
        $text = preg_replace('/[\s-]+/', '-', $text);

        // Replace non-alphanumeric characters except dashes
        $text = preg_replace('/[^\p{L}\p{N}-]+/u', '-', $text);

        // Remove multiple dashes
        $text = preg_replace('/-+/', '-', $text);

        // Trim dashes from the beginning and end
        $text = trim($text, '-');

        return $text;
    }

}
