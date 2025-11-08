<?php

use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $projects = Project::all();

    return view('welcome', ["projects" => $projects]);
})->name("home");

// Projects
Route::post("/projects", [ProjectController::class, "store"])->name("projects.store");
