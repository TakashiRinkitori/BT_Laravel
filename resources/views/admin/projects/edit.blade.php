@extends('admin.layout')

@section('admin_content')
<h1>Edit Project</h1>

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('projects.update', $project) }}" method="POST" class="form">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="id" class="form-label">Project ID: {{ $project->id }}</label>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Project Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $project->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Project Description</label>
                    <input type="text" name="description" id="description" class="form-control" value="{{ $project->description }}" placeholder="Project Description">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
