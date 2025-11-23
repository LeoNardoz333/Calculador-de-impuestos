<nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgb(60, 206, 155);">
    <div class="container">
        <a class="navbar-brand text-wrap" href="{{ route('home') }}">Calculador de Impuestos - SAT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('V_login-usuarios') }}">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('V_login-admins') }}">Administradores</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
