<?php

namespace App\Http\Controllers;

use App\Models\TaskModel;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        //$tasks = TaskModel::all();
        $search = $request->input('search');
        $completed = $request->input('completed');

        $query = TaskModel::query();

        if ($search) {
            $query->where('id', $search)
                  ->orWhere('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        }

        if ($completed !== null) {
            $query->where('completed', $completed);
        }

        $tasks = $query->paginate(10);

        return view('admin.tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('admin.tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'completed' => 'nullable|boolean',
        ]);

        TaskModel::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Công việc đã được thêm');
    }

    public function edit($id)
    {
        $task = TaskModel::findOrFail($id);

        return view('admin.tasks.edit', compact('task'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'completed' => 'nullable|boolean',
        ]);

        $task = TaskModel::findOrFail($id);
        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Công việc đã được cập nhật');
    }

    public function destroy(TaskModel $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Công việc đã được xóa');
    }

}
