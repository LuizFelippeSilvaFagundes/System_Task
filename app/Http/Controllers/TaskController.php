<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get(); // Obtém as tarefas do usuário logado
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create'); // Retorna a view para criar uma nova tarefa
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(), // Associando a tarefa ao usuário logado
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function edit(Task $task)
    {
        // Verifica se o usuário logado é o dono da tarefa
        if ($task->user_id !== Auth::id()) {
            return redirect()->route('tasks.index')->with('error', 'Acesso não autorizado.');
        }

        return view('tasks.edit', compact('task')); // Retorna a view para editar a tarefa
    }

    public function update(Request $request, Task $task)
    {
        // Verifica se o usuário logado é o dono da tarefa
        if ($task->user_id !== Auth::id()) {
            return redirect()->route('tasks.index')->with('error', 'Acesso não autorizado.');
        }

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy(Task $task)
    {
        // Verifica se o usuário logado é o dono da tarefa
        if ($task->user_id !== Auth::id()) {
            return redirect()->route('tasks.index')->with('error', 'Acesso não autorizado.');
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarefa excluída com sucesso!');
    }
}
