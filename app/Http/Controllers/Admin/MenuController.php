<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\menu\createRequestMenu;
use App\Http\Services\menu\MenuService;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
  protected $menuService;

  public function __construct(MenuService $menuService)
  {
      $this->menuService = $menuService;  
  }
   public function create()
   {
        return view('admin.menus.add', [
            'title' => 'Thêm menu mới',
            'data' => $this->menuService->get()
        ]);
   }

   public function store(createRequestMenu $request) 
   {
     $this->menuService->insert($request);
     return redirect()->back();
   }

   public function index()
   {
        $data =  $this->menuService->get();

        return view('admin.menus.list', [
            'title' => 'Danh sách',
            'data' => $data
        ]);
   }

   public function destroy(Request $request)
   {
      $resuit = $this->menuService->destroy($request);

      if ($resuit) {
        return response()->json(['error' => false, 'message' => 'Đã xóa menu thành công']);
      }
      return response()->json(['error' => true, 'message' => 'xóa không menu thành công']);
    }
   
   public function show(Menu $id)
   {
      return view('admin.menus.edit', [
        'title' => 'cập nhật',
        'data' => $id,
        'dataMenu' => $this->menuService->get()
      ]);
   }

   public function update(Menu $id, createRequestMenu $request)
   {
      $this->menuService->update($request, $id);
      return redirect('/admin/menu/list');
   }

}