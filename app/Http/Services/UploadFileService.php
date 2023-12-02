<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;

class UploadFileService
{
    public function uploadFile($request)
    {
        if ($request->hasFile('file')) {
            try {
                $name = $request->file('file')->getClientOriginalName();
                $pathFull = 'upload/' . date("Y/m/d");
                $request->file('file')->storeAs($pathFull,  $name, 'public_uploads');
    
                return '/uploads/' . $pathFull . '/' . $name;
            } catch (\Exception $err) {
                return false;
            }
        }
    }
}