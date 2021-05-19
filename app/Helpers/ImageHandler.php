<?php

namespace App\Helpers;

class ImageHandler{
    public static function store($file, $path) {
        return $file->store($path, ['disk' => 'public']);
    }
}
