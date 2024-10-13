@extends('admin.layout')

@section('admin_content')

<h1 class="h3 mb-4 text-gray-800">Tasks</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <h5 class="col-md-6 m-0 font-weight-bold text-primary">List Task</h5>

                <div style="text-align: right;" class="col-md-6">
                    <a class="btn btn-grape" href="{{ route('tasks.create') }}">Create Task</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <strong style="color: red; font-size: 14px;">
                    @php
                    use Illuminate\Support\Facades\Session;
                    $message = Session::get('message');
                    if ($message) {
                        echo $message;
                        Session::put('message', null);
                    }
                    @endphp
                </strong>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Dự án</th>
                            <th>Tiêu đề</th>
                            <th>Mô tả</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->project->name }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td class="text-center">{{ $task->completed ? 'Hoàn thành' : 'Chưa hoàn thành' }}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning" style="font-size: 28px;" class="text-warning mb-1 mr-1 fas fa-edit" href="{{ route('tasks.edit', $task) }}">Chỉnh sửa</a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="font-size: 28px;" class="text-danger mb-1 fas fa-trash-alt" onclick="return confirm('Bạn có chắc chắn muốn xóa công việc này?');">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
