<?php

namespace App\Services\DataExtractionService\SubService;

use Illuminate\Http\UploadedFile;
use thiagoalessio\TesseractOCR\TesseractOCR;


class ImageExtractionService
{
    public function extract(UploadedFile $file):string
    {
        return (new TesseractOCR($file->getRealPath()))->lang($lang)->run();
    }
}