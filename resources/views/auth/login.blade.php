@extends('layouts.app')

@section('title', 'Iniciar Sessão')

@section('content')
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4">Iniciar Sessão</h2>

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autofocus>

            @error('email')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Palavra-passe</label>
            <input id="password" type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="password" required>

            @error('password')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Lembrar-me -->
        <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                   {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Lembrar-me</label>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </div>

        <div class="text-center">
            <a href="{{ route('password.request') }}">Esqueceu-se da palavra-passe?</a>
        </div>
    </form>
</div>
@endsection
