<nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('tarefas.index') }}">📝 Gestão de Tarefas</a>

        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tarefas.index') }}">Tarefas</a>
                    </li>

                    <li>
                        <span class="nav-link disabled">|</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.edit') }}">Dados Pessoais</a>
                    </li>

                    <li>
                        <span class="nav-link disabled">|</span>
                    </li>

                    <li class="nav-item">
                        <span class="nav-link disabled">Olá, {{ Auth::user()->name }}</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sair
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registar</a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
