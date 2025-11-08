<x-layout>
    @php
        $selectedProject = request()->query('project');
    @endphp

    <div class="mb-6">
    <div>
        <label for="project_id" class="block text-gray-700 font-medium mb-2">Select Project</label>
        <select
            id="project_list"
            name="project_list"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
        >
            <option value="">-- Choose a Project --</option>
           @foreach($projects as $project)
        <option value="{{ $project->name }}"
            {{ $project->name === $selectedProject ? 'selected' : '' }}>
            {{ $project->name }}
        </option>
    @endforeach
        </select>
    </div>
    <div id="sortable-task-list" class="space-y-2" data-sort-url="{{ route('tasks.sort') }}">
        @foreach($tasks as $task)
            <div class="task-item" data-id="{{ $task->id }}">
                <x-tasks.task :task="$task" />
            </div>
        @endforeach
    </div>

    <p class="text-gray-500 text-sm">Select a project to see its tasks.</p>

    <!-- Create New Task -->
    <x-tasks.create :projects="$projects" />
</div>
</div>
</x-layout>
