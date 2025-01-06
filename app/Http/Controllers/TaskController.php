<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $task = Task::query();
    
        if ($request->has('filter')) {
            if ($request->filter == 'completed') {
                $task->where('is_completed', true);
            } elseif ($request->filter == 'pending') {
                $task->where('is_completed', false);
            }
        }
    
        if ($request->has('search')) {
            $task->where('title', 'like', '%' . $request->search . '%');
        }
    
        $tasks = $task->get();
    
        return view('tasks.index')->with('tasks', $tasks);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'is_completed' => 'required|boolean',
    ]);

    $task = new Task();
    $task->title = $request->title;
    $task->description = $request->description;
    $task->is_completed = $request->is_completed;
    $task->save();

    return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès.');
    }

    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show',['task' => $task]);
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit',['task' => $task]);
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'is_completed' => 'required|boolean',
    ]);

    $task = Task::find($id);
    $task->title = $request->title;
    $task->description = $request->description;
    $task->is_completed = $request->is_completed;
    $task->save();

    return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
