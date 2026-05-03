<x-app-layout>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-medium text-gray-800">Categories</h2>
    </div>

    <div class="grid grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h3 class="text-sm font-medium text-gray-700 mb-4">Add New Category</h3>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                    <input type="text" name="name"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-green-500"
                        placeholder="Enter category name">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="text-white px-4 py-2 rounded text-sm" style="background:#059669;">Add Category</button>
            </form>
        </div>

        <div class="bg-white rounded-lg shadow-sm">
            <div class="px-5 py-3 border-b">
                <span class="text-sm font-medium">All Categories</span>
            </div>
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left px-5 py-3 text-xs text-gray-500 font-medium">Name</th>
                        <th class="text-left px-5 py-3 text-xs text-gray-500 font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr class="border-t border-gray-100">
                        <td class="px-5 py-3 text-gray-800">{{ $category->name }}</td>
                        <td class="px-5 py-3">
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs text-red-600" onclick="return confirm('Delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="text-center text-gray-400 py-8">No categories yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>