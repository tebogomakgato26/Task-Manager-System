<x-app-layout>
    <div class="grid grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg p-4 shadow-sm">
            <p class="text-gray-500 text-xs mb-1">Total Tasks</p>
            <h3 class="text-2xl font-medium" style="color:#059669;">0</h3>
            <p class="text-xs mt-1" style="color:#059669;">All tasks</p>
        </div>
        <div class="bg-white rounded-lg p-4 shadow-sm">
            <p class="text-gray-500 text-xs mb-1">Pending</p>
            <h3 class="text-2xl font-medium text-yellow-500">0</h3>
            <p class="text-xs mt-1 text-yellow-500">Not started</p>
        </div>
        <div class="bg-white rounded-lg p-4 shadow-sm">
            <p class="text-gray-500 text-xs mb-1">In Progress</p>
            <h3 class="text-2xl font-medium text-blue-500">0</h3>
            <p class="text-xs mt-1 text-blue-500">Active</p>
        </div>
        <div class="bg-white rounded-lg p-4 shadow-sm">
            <p class="text-gray-500 text-xs mb-1">Completed</p>
            <h3 class="text-2xl font-medium text-green-500">0</h3>
            <p class="text-xs mt-1 text-green-500">Done</p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm">
        <div class="flex justify-between items-center px-5 py-3 border-b">
            <span class="text-sm font-medium">Recent Tasks</span>
            <a href="#" class="text-xs text-white px-3 py-2 rounded" style="background:#059669;">+ New Task</a>
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
                <tr>
                    <td colspan="5" class="text-center text-gray-400 py-8 text-sm">
                        No tasks yet. Click "+ New Task" to get started!
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>