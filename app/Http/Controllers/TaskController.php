<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Mail\TaskAssignedMail;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index(Request $request)
{
   $userId = auth()->id();

$query = Task::with(['category', 'user'])
    ->where(function ($q) use ($userId) {
        $q->where('user_id', $userId)
          ->orWhere('assigned_to', $userId);
    });

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
    $categories = Category::all();

    return view('tasks.index', compact('tasks', 'categories'));
}

    public function create()
    {
        $users = User::all();
        $categories = Category::all();

        return view('tasks.create', compact('users', 'categories'));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $users = User::all();
        $categories = Category::all();

        return view('tasks.edit', compact('task', 'users', 'categories'));
    }

   public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'deadline' => 'required|date',
        'category_id' => 'required',
        'priority' => 'required',
        'status' => 'required',
        'assigned_to' => 'required',
    ]);

    $task = Task::create([
        'title' => $request->title,
        'description' => $request->description,
        'deadline' => $request->deadline,
        'status' => $request->status,
        'priority' => $request->priority,
        'user_id' => auth()->id(),   // creator = logged-in user
        'category_id' => $request->category_id,
        'assigned_to' => $request->assigned_to,
    ]);

    return redirect()->route('tasks.index')
        ->with('success', 'Task created successfully!');
}

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $task->update([
    'title' => $request->title,
    'description' => $request->description,
    'deadline' => $request->deadline,
    'status' => $request->status,
    'priority' => $request->priority,
    'category_id' => $request->category_id,
    'assigned_to' => $request->assigned_to,
]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}