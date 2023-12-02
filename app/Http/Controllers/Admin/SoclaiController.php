<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\soclai\createRequestSoclai;
use App\Http\Services\soclai\soclaiService;
use App\Models\c;
use App\Models\soclai;
use Illuminate\Http\Request;

class SoclaiController extends Controller
{
  
    protected $soclaiService;

    public function __construct(soclaiService $soclaiService)
    {
        $this->soclaiService = $soclaiService;
    }
    
    public function index()
    {
        return view('admin.soclais.list', [
            'title' => 'Tạo liên kết',
            'data' => $this->soclaiService->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.soclais.add', [
            'title' => 'Tạo liên kết'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createRequestSoclai $request)
    {
        $resuit = $this->soclaiService->insert($request);

        if ($resuit) {
            return redirect()->back();
        }
        return redirect()->back();
    }


    public function edit(soclai $id)
    {
        return view('admin.soclais.edit', [
            'title' => 'Cập nhật liên kết ' . $id->name,
            'data' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, soclai $id)
    {
        $resuit = $this->soclaiService->update($request, $id);

        if ($resuit) {
            return redirect('/admin/soclai/list');
        }
        return redirect('/admin/soclai/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $resuit = $this->soclaiService->remove($request);
        if ($resuit) {
            return response()->json(['error' => false, 'message' => 'Bạn đã xóa liên kết thành công']);
        }
        
        return response()->json(['error' => true, 'message' => 'xóa liên kết không thành công']);
    }
}