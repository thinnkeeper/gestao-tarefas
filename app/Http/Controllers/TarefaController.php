<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TarefaRequest;
use App\Http\Controllers\Controller;

class TarefaController extends Controller
{
    public function index(Request $request)
{
    $orderBy = $request->get('order_by', 'data_fim');
    $direction = $request->get('direction', 'asc');

    // Garantir que apenas campos válidos são utilizados
    if (!in_array($orderBy, ['data_fim', 'status'])) {
        $orderBy = 'data_fim';
    }

    if (!in_array($direction, ['asc', 'desc'])) {
        $direction = 'asc';
    }

    $tarefas = Tarefa::where('user_id', Auth::id())
                ->orderBy($orderBy, $direction)
                ->paginate(10)
                ->appends(['order_by' => $orderBy, 'direction' => $direction]);

    return view('tarefas.index', compact('tarefas', 'orderBy', 'direction'));
}


    public function create()
    {
        return view('tarefas.create');
    }

    public function store(TarefaRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        Tarefa::create($data);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso');
    }

    public function show(Tarefa $tarefa)
    {
        //$this->authorize('view', $tarefa);
        if (Auth::id() !== $tarefa->user_id) {
            abort(403, 'Acesso não autorizado.');
        }
        return view('tarefas.show', compact('tarefa'));
    }

    public function edit(Tarefa $tarefa)
    {
        //$this->authorize('update', $tarefa);
        if (Auth::id() !== $tarefa->user_id) {
            abort(403, 'Acesso não autorizado.');
        }
        return view('tarefas.edit', compact('tarefa'));
    }

    public function update(TarefaRequest $request, Tarefa $tarefa)
    {
        //$this->authorize('update', $tarefa);
        if (Auth::id() !== $tarefa->user_id) {
            abort(403, 'Acesso não autorizado.');
        }
        $tarefa->update($request->validated());
        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso.');
    }

    public function destroy(Tarefa $tarefa)
    {
        //$this->authorize('delete', $tarefa);
        if (Auth::id() !== $tarefa->user_id) {
            abort(403, 'Acesso não autorizado.');
        }
        $tarefa->delete();
        return redirect()->route('tarefas.index')->with('success', 'Tarefa eliminada com sucesso.');
    }
}
