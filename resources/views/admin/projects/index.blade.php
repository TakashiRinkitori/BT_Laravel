@extends('admin.layout')

@section('admin_content')
    <h1 class="h3 mb-4 text-gray-800">Project</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <h5 class="col-md-6 m-0 font-weight-bold text-primary">List Project</h5>
                <div style="text-align: right;" class="col-md-6">
                    <a class="btn btn-grape" href="{{ route('projects.create') }}">Create Project</a>
                </div>
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
                        <th>ID Project</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->description }}</td>
                            <td class="text-center">
                                <a class="btn btn-warning mb-1 me-1" href="{{ route('projects.edit', $project) }}">
                                    <i class="fas fa-edit"></i> Chỉnh sửa
                                </a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mb-1" onclick="return confirm('Bạn có chắc chắn muốn xóa dự án này?');">
                                        <i class="fas fa-trash-alt"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
