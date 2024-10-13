@extends('admin.layout')

@section('admin_content')
<div class="container">
    <h1 class="mt-4">Quản lý Nhân viên</h1>
    {{-- @if (auth()->user()->roles()->where('name', 'admin')->exists()) --}}
        <a class="btn btn-primary" href="{{ route('admin.create') }}">Thêm Nhân Viên</a>
    {{-- @endif --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        @if($admin->roles->isEmpty())
                            Chưa có vai trò
                        @else
                            @foreach($admin->roles as $role)
                                <span class="badge badge-info">{{ $role->name }}</span>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
