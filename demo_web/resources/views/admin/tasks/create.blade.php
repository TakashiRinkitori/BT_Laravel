@extends('admin.layout')

@section('content')
    <h1>Thêm công việc mới</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="title">Tiêu đề:</label>
        <input type="text" name="title" required>
        <br>

        <label for="description">Mô tả:</label>
        <textarea name="description"></textarea>
        <br>

        <label for="completed">Hoàn thành:</label>
        <input type="checkbox" name="completed" value="1">
        <br>

        <button type="submit">Thêm công việc</button>
    </form>

    <a href="{{ route('tasks.index') }}">Quay lại danh sách công việc</a>
@endsection
