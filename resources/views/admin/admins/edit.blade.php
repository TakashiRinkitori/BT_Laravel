@extends('admin.layout')

@section('admin_content')
<div class="container">
    <h1 class="mt-4">Chỉnh sửa Nhân viên</h1>

    <form action="{{ route('admin.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu (để trống nếu không đổi):</label>
            <input type="password" name="password" class="form-control">
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="role">Vai trò:</label>
            <select name="role" class="form-control" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <br>
        <a href="{{ route('admin.index') }}" class="btn btn-secondary mt-2">Quay lại danh sách nhân viên</a>
    </form>
</div>
@endsection
