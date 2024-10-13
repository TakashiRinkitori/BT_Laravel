@extends('admin.layout')

@section('admin_content')
    <h1>Chỉnh sửa công việc</h1>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('tasks.update', ['project' => $project->id, 'task' => $task->id]) }}" method="POST" class="form">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <h3 for="project_name">Dự án: {{ $task->project->name }}</h3>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề:</label>
                        <input type="text" name="title" value="{{ old('title', $task->title) }}" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả:</label>
                        <textarea name="description" class="form-control">{{ old('description', $task->description) }}</textarea>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="completed" value="1" id="completed" class="form-check-input" {{ $task->completed ? 'checked' : '' }}>
                        <label for="completed" class="form-check-label">Hoàn thành</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Cập nhật công việc</button>
                    <a href="{{ route('tasks.index', $project) }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
@endsection
