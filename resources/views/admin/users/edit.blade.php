@extends('admin.layout')

@section('admin_content')
    <div class="container">
        <h1 class="mt-4">Chỉnh sửa Người dùng</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
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

                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <br>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-2">Quay lại danh sách người dùng</a>
                </form>
            </div>
        </div>
    </div>
@endsection
