<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Stichoza\GoogleTranslate\GoogleTranslate;

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
        return url('/uploads/images/'. $path  . '/' . $ImageName);

    }


    protected function uploadFile($file, $path = '')
    {
        $FileName = str_random(16) . '.' . $file->getClientOriginalExtension();
        $FilePath = public_path() . '/uploads/files/' . $path  . '/';
        // check if directory for ProfileImage  exists, if not then create one
        if (!File::exists($FilePath)) {
            File::makeDirectory($FilePath, 0777, true);
        }
        // save the ProfileImage as it is
        $file->move($FilePath , $FileName);
        return url('/uploads/files/'. $path  . '/' . $FileName);
    }




    protected function deleteFile($image)
    {
        // Replace the base URL with an empty string to get the relative path
        $imagePath = str_replace(url('/'), '', $image);

        // Construct the full path to the image
        $fullPath = public_path($imagePath);

        // Check if the file exists and delete it
        if (!is_null($imagePath) && file_exists($fullPath)) {
            unlink($fullPath);
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

    function detectLanguage($text) {
        if (preg_match('/[\x{0600}-\x{06FF}]/u', $text)) {
            return 'ar';  // Arabic
        }
        return 'en';  // Default to English
    }

}
