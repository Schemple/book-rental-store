<?php

namespace App\Helper;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImageHelper
{
    public static function UploadImage($file){
        $imageManager= new ImageManager(Driver::class);

        $destinationPath = public_path('public');

        $fileName=time() . '.' . $file->getClientOriginalExtension();

        $imageHandle=$imageManager->read($file);
        $imageHandle->resize(1920, 1920)->save($destinationPath.$fileName);
        return $fileName;
    }
    public static function GetImageUrl($fileName)
    {
        $imageUrl=asset("public".$fileName);
        return $imageUrl;
    }

}
