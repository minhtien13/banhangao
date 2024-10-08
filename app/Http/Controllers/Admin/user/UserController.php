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
        return view('admin.accounts.list', [
            'title' => 'danh sách tài khoản admin',
            'data' => $this->accountService->get()
        ]);
    }

    public function create()
    {
        return view('admin.accounts.add', [
            'title' => 'tạo tài khoản mới'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'level' => 'required',
        ], [
            'name.required' => 'Đặt tên tài khoản của bạn',
            'email.required' => 'Nhập Dịa chỉ của bạn',
            'email.email' => 'Nhập Dịa chỉ sài định dạng',
            'email.unique' => 'Dịa chỉ của bạn đã tồn tại không thể đăng ký',
            'level.required' => 'Chọn vai trò',
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
        return view('admin.accounts.contomer', [
            'title' => 'danh sách tài khoản khách hàng',
            'data' => $this->accountService->get()
        ]);
    }

    public function edit(User $id)
    {
        return view('admin.accounts.edit', [
            'title' => 'chỉnh sửa tài khoản',
            'data' => $id
        ]);

    }

    public function update(Request $request, User $id)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Đặt tên tài khoản của bạn',
        ]);

        $resuit = $this->accountService->update($request, $id);

        if ($resuit) {
            return $id->level == 3 ? redirect('/admin/account/contomer') : redirect('/admin/account/list');
        }
        return redirect('/admin/account/list');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');

        if ($id == 0) return response()->json(['error' => true, 'messages' => 'Tài khoản không tồn tại']);

        $resuit = $this->accountService->destroy($id);

        if ($resuit) {
            return response()->json(['error' => false, 'messages' => 'Đã xóa tài khoản thành công']);
        }

        return response()->json(['error' => true, 'messages' => 'Xóa tài khoản không thành công']);
    }

    public function chang(User $user)
    {
        if (Auth::user()->id != $user->id) return redirect()->back();

        return view('admin.accounts.chang', [
            'title' => 'Chỉnh sửa thông tin tài khoản',
            'data' => $user
        ]);
    }

    public function changStore(Request $request, User $user)
    {
        if (Auth::user()->id != $user->id) return redirect()->back();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email, ' . $user->id,
        ], [
            'name.required' => 'Đặt tên tài khoản của bạn',
            'email.required' => 'Nhập Dịa chỉ của bạn',
            'email.email' => 'Nhập Dịa chỉ sài định dạng',
            'email.unique' => 'Dịa chỉ của bạn đã tồn tại không thể đăng ký'
        ]);

        $resuit = $this->accountService->chang($request, $user);

        if ($resuit) {
            return redirect()->back();
        }

        return redirect('/admin/account/list');
    }

    public function password(User $user)
    {
        if (Auth::user()->id != $user->id) return redirect()->back();

        return view('admin.accounts.password', [
            'title' => 'đổi mật khẩu'
        ]);
    }

    public function passwordStore(Request $request, User $user)
    {
        if (Auth::user()->id != $user->id) return redirect('/account/password/' . $user->id);

        $request->validate([
            'password' => 'required|min:6',
        ], [
            'password.required' => 'Đặt Mật khẩu mới cho tài khoản của bạn',
            'password.min' => 'Đặt Mật khẩu cho tài khoản từ 6 ký tự trở lên',
        ]);

        $resuit = $this->accountService->changPassword($request, $user);

        if ($resuit) {
            return redirect()->back();
        }

        return redirect('/admin/account/list');
    }
}