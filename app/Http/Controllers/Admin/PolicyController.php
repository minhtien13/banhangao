<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\policy\createRequestPlicy;
use App\Http\Services\policy\policyService;
use App\Models\c;
use App\Models\policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{

    protected $policyService;

    public function __construct(policyService $policyService)
    {
        $this->policyService = $policyService;     
    }
    
    public function index()
    {
        return view('admin.policys.list', [
            'title' => 'Các chính sách của website',
            'data' => $this->policyService->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.policys.add', [
            'title' => 'Tạo chính sách cho website'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createRequestPlicy $request)
    {
        $resuit = $this->policyService->insert($request);
        if ($resuit) {
            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(policy $id)
    {
        return view('admin.policys.edit', [
            'title' => 'Cập nhật chính sách của website: ' . $id->title,
            'data' => $id
        ]);
    }
    
    public function update(Request $request, policy $id)
    {
        $resuit = $this->policyService->update($request, $id);
        if ($resuit) {
            return redirect('/admin/policy/list');
        }
        return redirect('/admin/policy/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $resuit = $this->policyService->remove($request);
        if ($resuit) {
            return response()->json(['error' => false, 'message' => 'Bạn đã xóa 1 chính sách thành công']);
        }

        return response()->json(['error' => false, 'message' => 'xóa chính sách không thành công']);
    }
}