<x-app-layout>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-medium text-gray-800">All Tasks</h2>
        <a href="{{ route('tasks.create') }}" class="text-xs text-white px-4 py-2 rounded" style="background:#059669;">+ New Task</a>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-4 mb-4">
        <form method="GET" action="{{ route('tasks.index') }}">
            <div class="grid grid-cols-4 gap-3">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search tasks..."
                    class="border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-green-500">

                <select name="status" class="w-full border border-gray-300 rounded px-3 py-2 pr-8 text-sm focus:outline-none focus:border-green-500">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>

                <select name="priority" class="w-full border border-gray-300 rounded px-3 py-2 pr-8 text-sm focus:outline-none focus:border-green-500">
                    <option value="">All Priorities</option>
                    <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>
                </select>

                <select name="category_id" class="w-full border border-gray-300 rounded px-3 py-2 pr-8 text-sm focus:outline-none focus:border-green-500">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-2 mt-3">
                <button type="submit" class="text-white px-4 py-2 rounded text-sm" style="background:#059669;">Filter</button>
                <a href="{{ route('tasks.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded text-sm">Clear</a>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-lg shadow-sm">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="text-left px-5 py-3 text-xs text-gray-500 font-medium">Task</th>
                    <th class="text-left px-5 py-3 text-xs text-gray-500 font-medium">Assigned To</th>
                    <th class="text-left px-5 py-3 text-xs text-gray-500 font-medium">Category</th>
                    <th class="text-left px-5 py-3 text-xs text-gray-500 font-medium">Priority</th>
                    <th class="text-left px-5 py-3 text-xs text-gray-500 font-medium">Status</th>
                    <th class="text-left px-5 py-3 text-xs text-gray-500 font-medium">Deadline</th>
                    <th class="text-left px-5 py-3 text-xs text-gray-500 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tasks as $task)
                <tr class="border-t border-gray-100">
                    <td class="px-5 py-3 text-gray-800">{{ $task->title }}</td>
                    <td class="px-5 py-3 text-gray-500">{{ $task->assignee->name ?? 'Unassigned' }}</td>
                    <td class="px-5 py-3 text-gray-500">{{ $task->category->name ?? 'None' }}</td>
                    <td class="px-5 py-3">
                        @if($task->priority == 'high')
                            <span class="bg-red-100 text-red-700 text-xs px-2 py-1 rounded">High</span>
                        @elseif($task->priority == 'medium')
                            <span class="bg-yellow-100 text-yellow-700 text-xs px-2 py-1 rounded">Medium</span>
                        @else
                            <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">Low</span>
                        @endif
                    </td>
                    <td class="px-5 py-3">
                        @if($task->status == 'completed')
                            <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded">Completed</span>
                        @elseif($task->status == 'in_progress')
                            <span class="bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded">In Progress</span>
                        @else
                            <span class="bg-yellow-100 text-yellow-700 text-xs px-2 py-1 rounded">Pending</span>
                        @endif
                    </td>
                    <td class="px-5 py-3 text-gray-500">{{ $task->deadline ?? 'No deadline' }}</td>
                    <td class="px-5 py-3">
                        <a href="{{ route('tasks.edit', $task) }}" class="text-xs text-blue-600 mr-2">Edit</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-red-600" onclick="return confirm('Delete this task?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-gray-400 py-8">No tasks found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>