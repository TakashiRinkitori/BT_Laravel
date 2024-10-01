@extends('user.layout')

@section('content')
    <h1>Danh sách người dùng</h1>
    <a href="{{route ('user.create') }}">Thêm người dùng mới</a>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <table border="1">
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Hành động</th>
        </tr>

        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('user.edit', $user->id) }}">Sửa</a>
                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
