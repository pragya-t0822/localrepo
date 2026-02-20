<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use thiagoalessio\TesseractOCR\TesseractOCR;

class ImageService
{
    public function extractText(string $imagePath, string $lang = 'eng')
    {
        return (new TesseractOCR($imagePath))->lang($lang)->run();
    }
}