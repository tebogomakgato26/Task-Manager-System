<x-app-layout>
    <div class="mb-6">
        <h2 class="text-lg font-medium text-gray-800">
            Create New Task
        </h2>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6">

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <!-- TITLE -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Title
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-green-500"
                    placeholder="Enter task title"
                >

                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- DESCRIPTION -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="3"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-green-500"
                    placeholder="Enter task description"
                >{{ old('description') }}</textarea>
            </div>

            <!-- ASSIGN USER + CATEGORY -->
            <div class="grid grid-cols-2 gap-4 mb-4">

                <!-- ASSIGN TO (FIXED) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Assign To
                    </label>

                    <select
                        name="assigned_to"
                        required
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-green-500"
                    >
                        <option value="">Select user</option>

                        @foreach($users as $user)
                            <option
                                value="{{ $user->id }}"
                                {{ old('assigned_to') == $user->id ? 'selected' : '' }}
                            >
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('assigned_to')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CATEGORY -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Category
                    </label>

                    <select
                        name="category_id"
                        required
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-green-500"
                    >
                        <option value="">Select category</option>

                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- PRIORITY + STATUS -->
            <div class="grid grid-cols-2 gap-4 mb-4">

                <!-- PRIORITY -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Priority
                    </label>

                    <select
                        name="priority"
                        required
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-green-500"
                    >
                        <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                    </select>
                </div>

                <!-- STATUS -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Status
                    </label>

                    <select
                        name="status"
                        required
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-green-500"
                    >
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

            </div>

            <!-- DEADLINE -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Deadline
                </label>

                <input
                    type="date"
                    name="deadline"
                    value="{{ old('deadline') }}"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-green-500"
                >

                @error('deadline')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- BUTTONS -->
            <div class="flex gap-3">

                <button
                    type="submit"
                    class="text-white px-6 py-2 rounded text-sm"
                    style="background:#059669;"
                >
                    Create Task
                </button>

                <a
                    href="{{ route('tasks.index') }}"
                    class="bg-gray-100 text-gray-700 px-6 py-2 rounded text-sm"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>
</x-app-layout>