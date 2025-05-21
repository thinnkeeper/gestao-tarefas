@extends('layouts.app')

@section('title', 'Criar Tarefa')

@section('content')
    <h1>Criar Nova Tarefa</h1>

    <form method="POST" action="{{ route('tarefas.store') }}">
        @csrf
        @include('tarefas.form')
        <button class="btn btn-success">Guardar</button>
    </form>
@endsection