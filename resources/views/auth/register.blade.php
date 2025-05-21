@extends('layouts.app')

@section('title', 'Criar Conta')

@section('content')
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4">Criar Conta</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nome -->
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input id="name" type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   name="name" value="{{ old('name') }}" required autofocus>

            @error('name')
                <span class="invalid-feedback d-block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required>

            @error('email')
                <span class="invalid-feedback d-block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Palavra-passe -->
        <div class="mb-3">
            <label for="password" class="form-label">Palavra-passe</label>
            <input id="password" type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="password" required>

            @error('password')
                <span class="invalid-feedback d-block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirmar Palavra-passe -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Palavra-passe</label>
            <input id="password_confirmation" type="password"
                   class="form-control" name="password_confirmation" required>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success w-100">Registar</button>
        </div>

        <div class="text-center">
            Já tem conta? <a href="{{ route('login') }}">Entrar</a>
        </div>
    </form>
</div>
@endsection