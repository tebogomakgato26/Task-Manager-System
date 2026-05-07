<x-app-layout>
    <div class="grid grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg p-4 shadow-sm">
            <p class="text-gray-500 text-xs mb-1">Total Tasks</p>
            <h3 class="text-2xl font-medium" style="color:#059669;">{{ $totalTasks }}</h3>
            <p class="text-xs mt-1" style="color:#059669;">All tasks</p>
        </div>
        <div class="bg-white rounded-lg p-4 shadow-sm">
            <p class="text-gray-500 text-xs mb-1">Pending</p>
            <h3 class="text-2xl font-medium text-yellow-500">{{ $pendingTasks }}</h3>
            <p class="text-xs mt-1 text-yellow-500">Not started</p>
        </div>
        <div class="bg-white rounded-lg p-4 shadow-sm">
            <p class="text-gray-500 text-xs mb-1">In Progress</p>
            <h3 class="text-2xl font-medium text-blue-500">{{ $inProgressTasks }}</h3>
            <p class="text-xs mt-1 text-blue-500">Active</p>
        </div>
        <div class="bg-white rounded-lg p-4 shadow-sm">
            <p class="text-gray-500 text-xs mb-1">Completed</p>
            <h3 class="text-2xl font-medium text-green-500">{{ $completedTasks }}</h3>
            <p class="text-xs mt-1 text-green-500">Done</p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm">
        <div class="flex justify-between items-center px-5 py-3 border-b">
            <span class="text-sm font-medium">Recent Tasks</span>
            <a href="{{ route('tasks.create') }}" class="text-xs text-white px-3 py-2 rounded" style="background:#059669;">+ New Task</a>
        </div>
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="text-left px-5 py-3 text-xs text-gray-500 font-medium">Task</th>
                    <th class="text-left px-5 py-3 text-xs text-gray-500 font-medium">Assigned To</th>
                    <th class="text-left px-5 py-3 text-xs text-gray-500 font-medium">Priority</th>
                    <th class="text-left px-5 py-3 text-xs text-gray-500 font-medium">Status</th>
                    <th class="text-left px-5 py-3 text-xs text-gray-500 font-medium">Deadline</th>
                </tr>
            </thead>
            <tbody>
              <tbody>
    @forelse($recentTasks as $task)
    <tr class="border-t border-gray-100">
        <td class="px-5 py-3 text-gray-800">{{ $task->title }}</td>
        <td class="px-5 py-3 text-gray-500">{{ $task->assignee->name ?? 'Unassigned' }}</td>
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
    </tr>
    @empty
    <tr>
        <td colspan="5" class="text-center text-gray-400 py-8 text-sm">
            No tasks yet. Click "+ New Task" to get started!
        </td>
        </tr>
         @endforelse
       </tbody>
        </table>
    </div>
</x-app-layout>