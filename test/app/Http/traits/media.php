<?php

namespace App\Http\traits;

trait media
{
    public function uploadPhoto($image, $folder)
    {
        $photo_name = uniqid() . '.' . $image->extension();
        $image->move(public_path("dist/img/{$folder}"), $photo_name);
        return $photo_name;
    }

    public function deletePhoto($path)
    {
        return file_exists($path) ? unlink($path) : false;
    }
}
