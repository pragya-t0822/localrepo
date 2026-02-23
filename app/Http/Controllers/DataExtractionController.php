<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DataExtractionService\DataExtractionService;

class DataExtractionController extends Controller
{
    protected DataExtractionService $service;
    public function __construct(DataExtractionService $service){
        $this->service = $service;
    }
    public function extract(Request $request){
        $request->validate([
            'file'=>'required|file'
        ]);
    $result=$this->service->extract($request->file('file'));
        return response()->json([
            'success'=>true,
            'data'=>$result
        ]);
    }
}
