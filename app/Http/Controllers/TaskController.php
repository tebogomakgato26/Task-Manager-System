<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
   public function index(Request $request)
{
    $query = Task::with(['category']);

    if ($request->search) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    if ($request->status) {
        $query->where('status', $request->status);
    }

    if ($request->priority) {
        $query->where('priority', $request->priority);
    }

    if ($request->category_id) {
        $query->where('category_id', $request->category_id);
    }

    $tasks = $query->get();
    $categories = \App\Models\Category::all();

    return view('tasks.index', compact('tasks', 'categories'));
}
    public function create()
{
    $users = \App\Models\User::all();
    $categories = \App\Models\Category::all();
    return view('tasks.create', compact('users', 'categories'));
}

public function edit($id)
{
    $task = Task::findOrFail($id);
    $users = \App\Models\User::all();
    $categories = \App\Models\Category::all();
    return view('tasks.edit', compact('task', 'users', 'categories'));
}

    
    public function store(Request $request)
    {
        $request->validate([
    'title' => 'required',
    'deadline' => 'required|date',
    'category_id' => 'nullable',
]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'status' => 'pending',
            'user_id' => auth()->id(),
            'category_id' => $request->category_id ?? null,
        ]);

       return redirect()->route('tasks.index');
    }

    
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'status' => $request->status,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('tasks.index');
    }

    
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Task deleted']);
    }
}
