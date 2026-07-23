<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>

    @vite(['resources/css/elements/Botones.css', 'resources/css/elements/Fuentes.css', 'resources/css/elements/Iconos.css', 'resources/css/elements/Texto.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>

<body>
    <header>
        <x-menus.menu-admins title="Administrador del sistema" navbarColor="#d3ffd0"
            logOutIcon="bi bi-arrow-left-circle navbar-user" userIcon="bi bi-person-fill navbar-user"
            userTitle="Ver perfil" logOutTitle="Cerrar sesión" />
        @yield('header')
    </header>
    <main>
        @include('components.menus.homepage.side-menu-admins')
        @yield('main')
    </main>
    <footer>
        @yield('footer')
    </footer>
    @include('components.imports.js.home')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
