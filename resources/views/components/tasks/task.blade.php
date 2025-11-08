<div>
    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-md bg-gray-50">
    <div>
        <p class="font-medium text-gray-800">{{ $task->name }}</p>
      <p class="text-gray-500 text-sm">Priority: {{ $task->priority }} | Created: {{ $task->created_at->diffForHumans() }}</p>
    </div>

    <div class="flex items-center gap-2">
      <!-- Update Button -->
      <button
        class="px-3 py-1 bg-yellow-400 text-white rounded-md hover:bg-yellow-500 transition-colors duration-200"
        onclick="updateTask(1)"
      >
       <a
                href="{{ route('tasks.edit', $task->id) }}"
            >
                Update
            </a>
      </button>

      <!-- Delete Button -->
      <form action="{{ route('tasks.delete', $task->id)}}" method="POST">
          @csrf
          @method("DELETE")
      <button
        class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors duration-200"
      >
        Delete
      </button>
      </form>
    </div>
  </div>
</div>
