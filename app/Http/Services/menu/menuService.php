<?php

namespace App\Http\Services\menu;

use App\Http\Requests\menu\createRequestMenu;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;

class menuService
{
    public function insert($request)
    {
        try{
            Menu::create($request->all());
            Session::flash('success', 'Đã thêm menu mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm menu lõi');
            return false;
        }
    }

    public function get()
    {
       return Menu::orderByDesc('id')->get();
    }

    public function destroy($request) 
    {
        $id = (int)$request->input('id');

        $menuId = Menu::where('id', $id)->first();

        if ($menuId) {
            return Menu::where('id', $id)->orwhere('parent_id', $id)->delete();
        }

        return false;
    }

    public function update($request, $id)
    {
       $id->fill($request->input());
       $id->save();

       Session::flash('success', 'Đã cập nhật thêm menu thành công');
       return true;
    }

    public function menuId($id)
    {
      return Menu::where('id', $id)->select('name', 'id')->first();   
    }

    public function getHome($parentId = 0)
    {
        return Menu::where('parent_id', $parentId)->where('is_active', 1)->get();
    }

    public function GetMenuFirstHome($id, $parentId = 0)
    {
        $data = Menu::where('parent_id', $parentId)->select('id', 'name')->get();
        $first = Menu::where('id', $parentId)->select('id', 'name')->first();

        $data[] = [
            'name' => $first->name,
            'id' => $first->id,
        ];
        
        return $data;
    }
}