@extends('layouts.app')

@section('title', 'Bem-vindo')

@section('content')
    @auth
        <script>window.location = "{{ route('tarefas.index') }}";</script>
    @endauth

    <div class="text-center py-5">
        <h1 class="display-4">📝 Aplicação de Gestão de Tarefas</h1>
        <p class="lead">Organize o seu dia com simplicidade e produtividade.</p>
        <img src="{{ asset('images/bg.jpg') }}" alt="Imagem de Tarefas" class="img-fluid">

        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Entrar</a>
            <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg">Registar</a>
        </div>
    </div>
@endsection
