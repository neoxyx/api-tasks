<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // Crear tarea
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

    // Listar tareas por usuario
    public function index($userId)
    {
        $tasks = Task::where('user_id', $userId)->get();
        return response()->json($tasks);
    }

    // Actualizar el estado de una tarea
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,in_progress,completed'
        ]);

        $task = Task::findOrFail($id);
        $task->update(['status' => $request->status]);

        return response()->json($task);
    }

    // Eliminar una tarea
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Tarea eliminada']);
    }
}
