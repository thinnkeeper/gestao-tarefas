@extends('layouts.app')

@section('title', 'Detalhes da Tarefa')

@section('content')
    <h1>{{ $tarefa->titulo }}</h1>

    <p><strong>Descrição:</strong> {{ $tarefa->descricao }}</p>
    <p><strong>Data de Fim:</strong> {{ $tarefa->data_fim }}</p>
    <p><strong>Status:</strong> {{ ucfirst($tarefa->status) }}</p>

    <a href="{{ route('tarefas.index') }}" class="btn btn-secondary">Voltar</a>
@endsection