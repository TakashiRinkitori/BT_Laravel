@extends('admin.layout')

@section('content')
    <h1>Danh sách công việc</h1>

    @if (session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('tasks.create') }}">Thêm công việc mới</a>
    <form action="{{ route('tasks.index') }}" method="GET">
        <div>
            <label for="title">Tìm kiếm:</label>
            <input type="text" name="search" value="{{ request('search') }}">
        </div>

        <div>
            <label for="completed">Trạng thái hoàn thành:</label>
            <select name="completed">
                <option value="">Tất cả</option>
                <option value="1" {{ request('completed') == '1' ? 'selected' : '' }}>Hoàn thành</option>
                <option value="0" {{ request('completed') == '0' ? 'selected' : '' }}>Chưa hoàn thành</option>
            </select>
        </div>

        <button type="submit">Tìm kiếm</button>
    </form>
    @if ($tasks->isEmpty())
        <p>Không tìm thấy nhiệm vụ nào.</p>
    @else
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->completed ? 'Hoàn thành' : 'Chưa hoàn thành' }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}">Chỉnh sửa</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa công việc này?');">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
@endsection
