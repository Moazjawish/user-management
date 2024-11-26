<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTask;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function create(Project $project)
    {
        $tasks = Task::groupBy('status')->get();
        $users = User::all();
        return view('tasks.create', ['tasks' => $tasks, 'users' => $users , 'project' => $project]);
    }
    public function index()
    {
            $tasks = Task::with('projects')->cursorPaginate(3);
            return view('tasks.index', ['tasks' => $tasks]);
    }

    public function store(CreateTask $request , Project $project)
    {
        Task::create([
            'title' => $request->validated('title'),
            'description' => $request->validated('description'),
            'status' => $request->validated('status'),
            'user_id' => $request->validated('user_id'),
            'project_id' => $project->id,
        ]);
        return redirect('/projects/' . $project->id);
    }

    public function edit(Project $project, Task $task)
    {
        $tasks = Task::groupBy('status')->get();
        $users = User::all();
        return view('tasks.edit', ['project' => $project, 'task' => $task, 'tasks' => $tasks, 'users' => $users ]);
    }

    public function update(CreateTask $request , Project $project, Task $task)
    {
        $task->update([
            'title' => $request->validated('title'),
            'description' => $request->validated('description'),
            'status' => $request->validated('status'),
            'user_id' => $request->validated('user_id'),
            'project_id' => $project->id,
        ]);
        return redirect('/projects/' . $project->id);
    }
    public function delete( Project $project,Task $task)
    {
        $task->delete();
        return redirect('/projects/'.$project->id);
    }
}
