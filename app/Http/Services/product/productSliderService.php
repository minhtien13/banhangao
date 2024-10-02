<?php

namespace App\Http\Services\product;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class productSliderService
{
    public function insert($request, $id)
    {
        $slider = [
            'is_sort_by' => $request->input('is_sort_by', 1),
            'thumb' => $request->input('thumb'),
            'product_id' => (int)$id
        ];

        $result = DB::table('product_sliders')->insert($slider);
        return $result ? $result : false;
    }

    public function getSlider($productID)
    {
        return DB::table('product_sliders')
                ->where('product_id', $productID)
                ->get();
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $slider = DB::table('product_sliders')->where('id', $id)->first();

        if ($slider) {
            $img = trim($slider->thumb, '/');
            if (File::exists($img)) {
                File::delete($img);
            }

            DB::table('product_sliders')->where('id', $id)->delete();
            return true;
        }

        return false;
    }

    public function removeSliderToProduct($request)
    {
        $productID = (int)$request->input('id');
        $sliders = DB::table('product_sliders')->where('product_id', $productID)->get();

        if ($sliders) {

            #Delete file #Xóa file
            foreach ($sliders as $slider) {
                $img = trim($slider->thumb, '/');
                if (File::exists($img)) {
                    File::delete($img);
                }
            }

            #Delete Data
            DB::table('product_sliders')->where('product_id', $productID)->delete();
            return true;
        }

        return false;
    }
}