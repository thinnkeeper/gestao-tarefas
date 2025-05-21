@extends('layouts.app')

@section('title', 'Editar Tarefa')

@section('content')
    <h1>Editar Tarefa</h1>

    <form method="POST" action="{{ route('tarefas.update', $tarefa) }}">
        @csrf @method('PUT')
        @include('tarefas.form', ['tarefa' => $tarefa])
        <button class="btn btn-primary">Atualizar</button>
    </form>
@endsection