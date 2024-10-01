@extends('user.layout')

@section('content')
    <h1>Chỉnh sửa người dùng</h1>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Tên:</label>
        <input type="text" name="name" value="{{ $user->name }}" required>
        <br>
        @error('name')<p style="color:red">{{ $message }}</p>@enderror

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required>
        <br>
        @error('email')<p style="color:red">{{ $message }}</p>@enderror

        <label for="password">Mật khẩu (để trống nếu không đổi):</label>
        <input type="password" name="password">
        <br>
        @error('password')<p style="color:red">{{ $message }}</p>@enderror

        <button type="submit">Cập nhật</button>
        <br>
        <a href="{{ route('user.index') }}">Quay lại danh sách user</a>
    </form>
@endsection

