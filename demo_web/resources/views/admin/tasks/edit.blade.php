@extends('admin.layout')

@section('content')
    <h1>Chỉnh sửa công việc</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Tiêu đề:</label>
        <input type="text" name="title" value="{{ old('title', $task->title) }}" required>
        <br>

        <label for="description">Mô tả:</label>
        <textarea name="description">{{ old('description', $task->description) }}</textarea>
        <br>

        <label for="completed">Hoàn thành:</label>
        <input type="checkbox" name="completed" value="1" {{ $task->completed ? 'checked' : '' }}>
        <br>

        <button type="submit">Cập nhật công việc</button>
    </form>

    <a href="{{ route('tasks.index') }}">Quay lại danh sách công việc</a>
@endsection
