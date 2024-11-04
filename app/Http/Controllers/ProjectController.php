<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProject;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('tasks')->cursorPaginate(4);
        return view('projects.index' , ['projects' => $projects]);
    }

    public function  show(Project $project)
    {
        return view('projects.show' ,['project' => $project]);
    }

    public function  create()
    {
        return view('projects.create');
    }

    public function  store(CreateProject $request)
    {
        Project::create([
            'title' => $request->validated('title'),
            'description' => $request->validated('description')
        ]);
        return redirect('/projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]);
    }
    public function update(CreateProject $request, Project $project)
    {
    $project->update([
            'title' => $request->validated('title'),
            'description' => $request->validated('description')
    ]);
        return redirect('/projects/'.$project->id);
    }
    public function delete( Project $project)
    {
        $project->delete();
        return redirect("/projects/");
    }
}
