<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tasks|max:255',
            'project_id' => 'required|exists:projects,id',
        ], [], [], 'createTask');

        $priority = Task::where('project_id', $request->project_id)->count();

        Task::create([
            'name' => $request->name,
            'project_id' => $request->project_id,
            'priority' => $priority + 1,
        ]);

        return redirect()->route('home')->with('message', 'Task created successfully');
    }

    public function sort(Request $request)
    {
        foreach ($request->order as $task) {
            Task::where('id', $task['id'])
                ->update(['priority' => $task['priority']]);
        }

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $projects = Project::all();

        return view('tasks.edit', ['task' => $task, 'projects' => $projects]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'project_id' => 'required|exists:projects,id',
        ]);

        $projectChanged = $task->project_id != $validated['project_id'];

        if ($projectChanged) {
            $validated['priority'] = Task::where('project_id', $validated['project_id'])->count() + 1;
        }

        $task->update($validated);

        return redirect()
            ->route('home', ['project' => $task->project->name])
            ->with('success', 'Task Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

         Task::where('project_id', $task->project_id)
        ->orderBy('priority')
        ->get()
        ->each(function ($t, $index) {
            $t->update(['priority' => $index + 1]);
        });

        return redirect()->route('home', ['project' => $task->project->name])->with('success', 'Task Removed Successfully');
    }
}
