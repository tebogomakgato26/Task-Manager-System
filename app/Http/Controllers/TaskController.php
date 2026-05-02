<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    public function index()
{
    $tasks = Task::where('user_id', auth()->id())
                ->with(['category'])
                ->get();

    return response()->json($tasks);
}

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'deadline' => 'required|date'
        ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'status' => 'pending',
            'user_id' => auth()->id(),
            'category_id' => $request->category_id
        ]);

        return response()->json($task);
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

        return response()->json($task);
    }

    
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Task deleted']);
    }
}
