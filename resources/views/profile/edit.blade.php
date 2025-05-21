@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Editar Perfil</h2>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <!-- Atualizar Nome e Email -->
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Alterações</button>
        </form>

        <hr class="my-5">

        <!-- Atualizar Palavra-passe -->
        <h4>Alterar Palavra-passe</h4>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Palavra-passe atual</label>
                <input type="password" name="current_password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nova Palavra-passe</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Confirmar nova Palavra-passe</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-warning">Atualizar Palavra-passe</button>
        </form>

        <hr class="my-5">

        <!-- Eliminar Conta -->
        <h4 class="text-danger">Eliminar Conta</h4>
        <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Tem a certeza que deseja eliminar a sua conta? Esta ação é irreversível.')">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Eliminar Conta</button>
        </form>
    </div>
@endsection

