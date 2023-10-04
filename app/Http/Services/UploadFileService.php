<?php

namespace App\Http\Services;

class UploadFileService
{
    public function uploadFile($request)
    {
        if ($request->hasFile('file')) {
            try {
                $name = $request->file('file')->getClientOriginalName();
                $pathFull = 'upload/' . date("Y/m/d");
                $request->file('file')->storeAs('public/' . $pathFull,  $name);
    
                return '/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $err) {
                return false;
            }
        }
    }
}