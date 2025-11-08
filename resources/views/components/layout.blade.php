<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @if (session('success'))
        <div
            class="mt-4 p-3 bg-green-100 border border-green-400 text-green-800 rounded-md text-sm font-medium"
        >
            {{ session('success') }}
        </div>
    @endif
    <section class="min-h-screen grid grid-rows-[auto_1fr_auto]">
       <header class="flex items-center justify-between p-4 bg-white shadow-md rounded-b-md">
    <h1 class="text-2xl font-bold text-gray-800">
        <a href="{{ route('home')}}">Task Manager</a>
    </h1>

    <div class="flex items-center gap-4">
        <button
            id="new_project_btn"
            class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition-colors duration-200"
        >
            New Project
        </button>
        @if (Route::currentRouteName() === 'home')
            <button
            id="new_task_btn"
            class="bg-orange-600 text-white px-4 py-2 rounded-md hover:bg-orange-700 transition-colors duration-200"
        >
            New Task
        </button>
    @endif
    </div>
</header>

<!-- Create Project Form -->
<x-projects.create />

<section class="p-4">
    {{ $slot }}
</section>
        <footer class="text-center p-4">Copyright &copy; 2025.</footer>
    </section>
</body>
</html>
