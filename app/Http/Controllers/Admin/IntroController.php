<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createIntroRequest;
use App\Http\Services\intro\introService;
use App\Models\c;
use App\Models\intro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IntroController extends Controller
{
    protected $introService;

    public function __construct(introService $introService)
    {
        $this->introService = $introService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->level != 1) return redirect()->route('admin');
        
        return view('admin.intros.list', [
            'title' => 'Danh sách giới thiệu',
            'data' => $this->introService->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->level != 1) return redirect()->route('admin');
        
        return view('admin.intros.add', [
            'title' => 'tạo trang giới thiệu'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createIntroRequest $request)
    {
        if (Auth::user()->level != 1) return redirect()->route('admin');
        
        $row = $this->introService->countRow();
        if (count($row) != 0) {
            Session::flash('error', 'Trang giới đã tồn tại bạn không thể tạo thêm nữa');
            return redirect('/admin/intro/list');
        }

        $resuit = $this->introService->insert($request);
        if ($resuit) {
            return redirect('/admin/intro/list');  
        }

        return redirect('/admin/intro/list');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(c $c)
    {
        if (Auth::user()->level != 1) return redirect()->route('admin');
        
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(intro $id)
    {
        if (Auth::user()->level != 1) return redirect()->route('admin');
        
        return view('admin.intros.edit', [
            'title' => 'tạo trang giới thiệu',
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
    public function update(createIntroRequest $request, intro $id)
    {
        if (Auth::user()->level != 1) return redirect()->route('admin');
        
        $resuit = $this->introService->update($id, $request);
        if ($resuit) {
            return redirect('/admin/intro/list');  
        }

        return redirect('/admin/intro/list');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Auth::user()->level != 1) return redirect()->route('admin');
        
        $resuit = $this->introService->destroy($request);
        if ($resuit) {
            return response()->json(['error' => false, 'message' => 'Đã xóa giới thiệu thành công']);
        }
        return response()->json(['error' => true, 'message' => 'Xóa giới thiệu không thành công']);
    }
}