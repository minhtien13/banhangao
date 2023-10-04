<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UploadFileService;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
   protected $uploadFileService;

   public function __construct(UploadFileService $uploadFileService)
   {
        $this->uploadFileService = $uploadFileService;
   }
   
   public function upload(Request $request)
   {
        $url = $this->uploadFileService->uploadFile($request);

        if ($url !== false) {
            return response()->json(['error' => false, 'url' => $url]);
        }
        return response()->json(['error' => true, 'message' => 'upload file không thành']);
   }
}