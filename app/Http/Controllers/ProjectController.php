<?php
namespace App\Http\Controllers;

use App\Models\ProjectModel;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = ProjectModel::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        ProjectModel::create($request->all());
        return redirect()->route('projects.index');
    }

    public function edit(ProjectModel $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, ProjectModel $project)
    {
        $request->validate(['name' => 'required']);
        $project->update($request->all());
        return redirect()->route('projects.index');
    }

    public function destroy(ProjectModel $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}
?>
