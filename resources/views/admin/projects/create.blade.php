@extends('admin.layout')

@section('admin_content')
<h1>Create Project</h1>

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('projects.store') }}" method="POST" class="form">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Project Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Project</button>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>

@endsection
