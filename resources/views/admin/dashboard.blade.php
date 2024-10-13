@extends('admin.layout')
@section('admin_content')
    <h1 class="mt-3" style="text-align: center" >Welcome to Dashboard</h1>
    @if (auth()->check())
        <p>Vai trò của bạn:
            @foreach (auth()->user()->roles as $role)
                {{ $role->name }} @if (!$loop->last), @endif
            @endforeach
        </p>
    @else
        <p>Vui lòng đăng nhập để xem thông tin.</p>
    @endif
@endsection
