@extends('layouts.app')

@section('title', 'Lista de Tarefas')

@section('content')
    <h1>As Minhas Tarefas</h1>
    <a href="{{ route('tarefas.create') }}" class="btn btn-primary mb-2">Nova Tarefa</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <form method="GET" action="{{ route('tarefas.index') }}" class="row g-2 align-items-center">
            <div class="col-auto">
                <label for="order_by" class="form-label">Ordenar por:</label>
            </div>
            <div class="col-auto">
                <select name="order_by" id="order_by" class="form-select">
                    <option value="data_fim" {{ $orderBy == 'data_fim' ? 'selected' : '' }}>Data de Fim</option>
                    <option value="status" {{ $orderBy == 'status' ? 'selected' : '' }}>Estado</option>
                </select>
            </div>
            <div class="col-auto">
                <select name="direction" id="direction" class="form-select">
                    <option value="asc" {{ $direction == 'asc' ? 'selected' : '' }}>Ascendente</option>
                    <option value="desc" {{ $direction == 'desc' ? 'selected' : '' }}>Descendente</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-outline-primary">Ordenar</button>
            </div>
        </form>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Data de Fim</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tarefas as $tarefa)
                <tr>
                    <td>{{ $tarefa->titulo }}</td>
                    <td>{{ $tarefa->data_fim }}</td>
                    <td>{{ $tarefa->status }}</td>
                    <td>
                        <a href="{{ route('tarefas.show', $tarefa) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('tarefas.edit', $tarefa) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('tarefas.destroy', $tarefa) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Confirma eliminação?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <img src="{{ asset('images/bg.jpg') }}" alt="Imagem de Tarefas" class="img-fluid">

    {{ $tarefas->links() }}
@endsection
