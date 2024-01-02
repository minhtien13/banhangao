<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\contact\contactService;
use App\Models\c;
use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactControlle extends Controller
{
    protected $contactService;

    public function __construct(contactService $contactService)
    {
        $this->contactService = $contactService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->level != 1) return redirect()->route('admin');
        
        return view('admin.contacts.list', [
            'title' => 'danh sách liên hệ',
            'data' => $this->contactService->get()
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

        return view('admin.contacts.add', [
            'title' => 'tạo liên hệ'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->level != 1) return redirect()->route('admin');

        $resuit = $this->contactService->insert($request);
       
        if ($resuit) {
            return redirect('/admin/contact/list');
        }
        return redirect('/admin/contact/list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(contact $id)
    {
        if (Auth::user()->level != 1) return redirect()->route('admin');

        return view('admin.contacts.edit', [
            'title' => 'cập nhật liên hệ',
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
    public function update(Request $request, contact $id)
    {
        if (Auth::user()->level != 1) return redirect()->route('admin');

        $resuit = $this->contactService->update($id, $request);
        if ($resuit) {
            return redirect('/admin/contact/list');
        }
        return redirect('/admin/contact/list');
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
        
        $resuit = $this->contactService->destroy($request);
        if ($resuit) {
            return response()->json(['error' => false, 'message' => 'Bạn đã xóa liên hệ thành công']);
        }
        return response()->json(['error' => true, 'message' => 'Xóa liên hệ không thành công']);
    }
}