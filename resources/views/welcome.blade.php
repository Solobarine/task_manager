<x-layout>
    <div class="mb-6">
    <div>
        <label for="project_id" class="block text-gray-700 font-medium mb-2">Select Project</label>
        <select
            id="project_id"
            name="project_id"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
            onchange="updateTasks(this.value)"
        >
            <option value="">-- Choose a Project --</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
    </div>
    <div id="tasks_list" class="space-y-2">
        <!-- Tasks will be dynamically rendered here -->
        <p class="text-gray-500 text-sm">Select a project to see its tasks.</p>
    </div>
</div>
</div>
</x-layout>
