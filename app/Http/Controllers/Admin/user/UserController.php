<?php

namespace App\Http\Controllers\Admin\user;

use App\Http\Controllers\Controller;
use App\Http\Services\account\accountService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $accountService;

    public function __construct(accountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function index()
    {
        if (Auth::user()->level != 1) return redirect()->route('admin');

        return view('admin.accounts.list', [
            'title' => 'danh sách tài khoản admin',
            'data' => $this->accountService->get()
        ]); 
    }

    public function create()
    {
        if (Auth::user()->level != 1) return redirect()->route('admin');

        return view('admin.accounts.add', [
            'title' => 'tạo tài khoản mới'
        ]);    
    }

    public function store(Request $request)
    {
        if (Auth::user()->level != 1) return redirect()->route('admin');
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'level' => 'required',
        ], [
            'name.required' => 'Đặt tên tài khoản của bạn',
            'email.required' => 'Nhập Dịa chỉ của bạn',
            'email.required' => 'Chọn vai trò',
            'email.email' => 'Nhập Dịa chỉ sài định dạng',
            'email.unique' => 'Dịa chỉ của bạn đã tồn tại không thể đăng ký',
            'password.required' => 'Đặt Mật khẩu cho tài khoản',
            'password.min' => 'Đặt Mật khẩu cho tài khoản từ 6 ký tự trở lên',
        ]);
        
        $account = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'level' => $request->input('level'),
            'password' => Hash::make($request->input('password')),
            'staturs' => $request->input('is_active'),
        ];

        User::create($account);
        Session::flash('success', 'Tạo tài khoản mới thành công');
        return redirect()->back();
    }

    public function contomer()
    {
        if (Auth::user()->level != 1) return redirect()->route('admin');

        return view('admin.accounts.contomer', [
            'title' => 'danh sách tài khoản khách hàng',
            'data' => $this->accountService->get()
        ]); 
    }

    public function edit()
    {
        if (Auth::user()->level != 1) return redirect()->route('admin');

    }

    public function update()
    {
        if (Auth::user()->level != 1) return redirect()->route('admin');

    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        if ($id == 0) return response()->json(['error' => false, 'messages' => 'Tài khoản không tồn tại']);

        
    }
}