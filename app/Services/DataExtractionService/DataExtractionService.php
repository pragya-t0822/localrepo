<?php

namespace App\Services\DataExtractionService;

use Illuminate\Http\UploadedFile;
use App\Services\DataExtractionService\SubService\PdfExtractionService;
use App\Services\DataExtractionService\SubService\ImageExtractionService;
use Smalot\PdfParser\Parser;
use PhpOffice\PhpWord\IOFactory;
use thiagoalessio\TesseractOCR\TesseractOCR;


class DataExtractionService
{
    public function __construct(
        protected PdfExtractionService $pdfService,
        protected ImageExtractionService $imageService,
    ){
    }
    public function extract(UploadedFile $file): string
    {
        $extension=strtolower($file->getClientOriginalExtension());
       switch ($extension) {
        case 'pdf':
            return $this->extractFromPdf($file);
        case 'jpg':
        case 'jpeg':
        case 'png':
            return $this->extractFromImage($file);
    }
    }
    public function extractFromPdf($file){
        $parser=new Parser();
        $pdf=$parser->parseFile($file);
        return $pdf->getText();
    }
    private function extractFromImage($file)
    {
        return (new TesseractOCR($file))->run();
    }
}
