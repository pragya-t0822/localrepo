<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
     protected $imageService;
   public function __construct(ImageService $imageService){
    $this->imageService=$imageService;
   }
   public function extract(Request $request){
    $request->validate([
         'image' => 'required|image'
         ]);
    $path = $request->file('image')->store('image');
    $fullPath = storage::path($path);

    $text=$this->imageService->extractText($fullPath);
        return response()->json([
            'status'=>'success',
            'extracted_text'=>$text
        ]);
   }
}
