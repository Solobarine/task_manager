<div id="create_project_form" class="absolute inset-0 bg-black/40 place-items-center
    {{ $errors->any() ? '' : 'hidden' }}">
<form action="{{ route('projects.store') }}" method="POST" class="bg-white max-w-2xl w-full mx-auto p-6 rounded-lg shadow-md">
    <button
      type="button"
      id="close_project_btn"
      class="text-gray-500 hover:text-red-800 text-2xl font-bold transition-colors duration-200 block ml-auto mb-4"
    >
      &times;
    </button>
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-medium mb-2">Project Name</label>
        <input
          type="text"
          name="name"
          id="name"
          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
          placeholder="Enter project name"
          value="{{ old('name') }}"
        />
        @error('name')
            <div class="mt-1 text-red-600 text-sm font-medium">{{ $message }}</div>
        @enderror
    </div>
    <button
      type="submit"
      class="bg-orange-600 text-white px-6 py-2 rounded-md hover:bg-orange-700 transition-colors duration-200"
    >
      Create Project
    </button>
</form>
</div>
