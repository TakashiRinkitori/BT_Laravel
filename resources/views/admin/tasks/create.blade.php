@extends('admin.layout')

@section('admin_content')
<h1>Thêm Task</h1>

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="project_id" class="form-label">Chọn Dự Án</label>
                        <select name="project_id" id="project_id" class="form-select" required>
                            <option value="">-- Chọn Dự Án --</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Nhập tiêu đề công việc..." required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea name="description" id="description" class="form-control" placeholder=""></textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="completed" value="1" id="completed" class="form-check-input">
                        <label for="completed" class="form-check-label">Hoàn thành</label>
                    </div>
                    <button type="submit" name="add_task" class="btn btn-primary">Thêm công việc</button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
@endsection
