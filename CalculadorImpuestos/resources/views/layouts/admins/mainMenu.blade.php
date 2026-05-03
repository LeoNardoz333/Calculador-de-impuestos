<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('components.imports.css.home')
    <title>Inicio</title>
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
</body>

</html>
