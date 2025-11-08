<div id="update_task_form" class="grid place-items-center">
    <form action="{{ route('tasks.update', $task) }}" method="POST" class="bg-white max-w-2xl w-full mx-auto p-6 rounded-lg shadow-md relative">
        @csrf
        @method("PATCH")
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Update Task</h2>
        <!-- Task Name -->
        <div class="mb-4">
            <label for="task_name" class="block text-gray-700 font-medium mb-2">Task Name</label>
            <input
                type="text"
                name="name"
                id="task_name"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                placeholder="Enter task name"
                value="{{ $task->name }}"
            />
            @error('name')
                <div class="mt-1 text-red-600 text-sm font-medium">{{ $message }}</div>
            @enderror
        </div>

        <!-- Project Selection -->
        <div class="mb-4">
            <label for="project_id" class="block text-gray-700 font-medium mb-2">Select Project</label>
            <select
                name="project_id"
                id="project_id"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                value="{{ $task->project_id }}"
            >
                <option value="">-- Choose a Project --</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
            @error('project_id')
                <div class="mt-1 text-red-600 text-sm font-medium">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button
            type="submit"
            class="bg-orange-600 text-white px-6 py-2 rounded-md hover:bg-orange-700 transition-colors duration-200"
        >
            Update Task
        </button>
    </form>
</div>

