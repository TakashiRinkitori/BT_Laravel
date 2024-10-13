<?php

namespace App\Http\Controllers;

use App\Models\ProjectModel;
use App\Models\TaskModel;
use Illuminate\Http\Request;
use App\Events\TaskCreated;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = TaskModel::all();
        return view('admin.tasks.index', compact('tasks'));
    }

    public function create(ProjectModel $project)
    {
        // $this->authorize('create', TaskModel::class);
        try {
            $this->authorize('create', TaskModel::class);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('tasks.index')->with('error', 'Bạn không có quyền thêm công việc.');
        }
        $projects = ProjectModel::all();
        return view('admin.tasks.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title' => 'required',
            'description' => 'required',
            'completed' => 'nullable|boolean',
        ]);

        $task = new TaskModel();
        $task->project_id = $request->project_id;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->completed = $request->has('completed') ? 1 : 0;
        $task->save();

        return redirect()->route('tasks.index', $request->project_id)->with('success', 'Công việc đã được thêm');
    }

    public function edit(ProjectModel $project, TaskModel $task)
    {
        try {
            $this->authorize('update', $task);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('tasks.index')->with('error', 'Bạn không có quyền sửa thông tin này.');
        }
        if (!$project) {
            return redirect()->route('tasks.index')->with('error', 'Dự án không tồn tại.');
        }

        return view('admin.tasks.edit', compact('project', 'task'));
    }

    public function update(Request $request, ProjectModel $project, TaskModel $task)
    {
        $this->authorize('update', $task);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'completed' => 'nullable|boolean',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed') ? 1 : 0,
        ]);

        return redirect()->route('tasks.index', $project)->with('success', 'Công việc đã được cập nhật.');
    }

    public function destroy(ProjectModel $project, TaskModel $task)
    {
        try {
            $this->authorize('delete', $task);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('tasks.index')->with('error', 'Bạn không có quyền xóa này.');
        }
        $task->delete();
        return redirect()->route('tasks.index', $project)->with('success', 'Công việc đã được xóa');
    }

    public function search(Request $request, ProjectModel $project)
    {
        $search = $request->input('search');
        $completed = $request->input('completed');

        $query = $project->tasks();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if ($completed !== null) {
            $query->where('completed', $completed);
        }

        $tasks = $query->get();

        return view('admin.tasks.index', compact('tasks'));
    }
}
