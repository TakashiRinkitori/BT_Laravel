<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:manage-user');
    // }
    public function AuthLogin() {

        $admin_id = Auth::id();
        if($admin_id) {
            return redirect('/admin');
        } else {
            return redirect()->name('admin.login')->send();
        }
    }
    public function dashboard(){
        $this->AuthLogin();
        $user = auth()->user();
        if (!$user) {
            return redirect('/')->with('error', 'Bạn cần đăng nhập để truy cập trang này.');
        }
        return view('admin.dashboard');
        // if ($user->hasRole('admin') || $user->hasRole('editor') || $user->hasRole('user')) {
        //     return view('admin.dashboard');
        // }
        // redirect('/')->with('error', 'Bạn không có quyền truy cập trang này.');
    }
    public function index() {
        $admins = AdminModel::all();
        return view('admin.admins.index', compact('admins'));
    }

    public function create(Request $request)
    {
        // dd(auth()->user()->can('create', AdminModel::class));
        // $this->authorize('viewAny', AdminModel::class);

        // $currentUser = auth()->user()->roles()->where('name','admin')->exists();
        // dd($currentUser);
        try {
        $this->authorize('create', AdminModel::class);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('admin.index')->with('error', 'Bạn không có quyền nhân viên.');
        }
        $roles = Role::all();

        return view('admin.admins.create', compact('roles'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id', // Đảm bảo vai trò tồn tại trong bảng roles
        ]);

        $admin = AdminModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $admin->roles()->attach($request->roles);

        return redirect()->route('admin.index')->with('success', 'Nhân viên đã được thêm thành công!');
    }

    public function edit($id)
    {
        $user = AdminModel::findOrFail($id);
        $roles = Role::all();
        try {
            $this->authorize('update', $user);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('admin.index')->with('error', 'Bạn không có quyền sửa thông tin nhân viên này.');
        }
        return view('admin.admins.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = AdminModel::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $user->id,
            'password' => 'nullable|min:6',
            'role' => 'required|exists:roles,id',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->roles()->sync([$request->role]);

        $user->save();

        return redirect()->route('admin.index')->with('success', 'Nhân viên đã được cập nhật thành công!');
    }


    public function destroy($id)
    {
        $user = AdminModel::findOrFail($id);
        try {
            $this->authorize('delete', $user);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('admin.index')->with('error', 'Bạn không có quyền xóa nhân viên này.');
        }
        $user->delete();

        return redirect()->route('admin.index')->with('success', 'Nhân viên đã được xóa thành công!');
    }
}
