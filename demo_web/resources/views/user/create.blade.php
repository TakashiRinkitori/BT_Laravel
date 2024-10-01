@extends('user.layout')

@section('content')
    <h1>Thêm người dùng mới</h1>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label for="name">Tên:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name')<p style="color:red">{{ $message }}</p>@enderror
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email')<p style="color:red">{{ $message }}</p>@enderror
        <br>
        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" required>
        @error('password')<p style="color:red">{{ $message }}</p>@enderror
        <br>
        <button type="submit">Thêm</button>
    </form>
@endsection
