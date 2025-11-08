<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Fetch Projects
        $projects = Project::all();

        // Fetch a single project
        $project_query = $request->query('project');
        $project = null;

        if ($project_query) {
            $project = Project::where('name', $project_query)->first();
        }

        // Fetch tasks
        $tasks = [];
        if ($project) {
            $tasks = $project->tasks()->orderBy('priority')->get();
        }

        return view('welcome', ['projects' => $projects, 'project' => $project, 'tasks' => $tasks]);
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
        $request->validate(
            [
                'name' => 'required|unique:projects|max:255',
            ], [], [], 'createProject'
        );

        Project::create($request->all());

        return redirect()->route('home')->with('success', 'Project Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
