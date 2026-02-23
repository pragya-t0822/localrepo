<?php

namespace App\Services\DataExtractionService\SubService;

use Illuminate\Http\UploadedFile;
use Smalot\PdfParser\Parser;

class PdfExtractionService
{
    public function extract(UploadedFile $file): string
    {
         $parser = new Parser();
        $pdf = $parser->parseFile($file->getRealPath());
        return $pdf->getText();
    }
}