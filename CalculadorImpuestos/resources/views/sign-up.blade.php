<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/css/Botones.css'])
        @vite(['resources/css/Fuentes.css'])
        @vite(['resources/css/Recuadros.css'])
        <link rel="stylesheet" href="{{ url('/css/Botones.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <title>Registrarse</title>
    </head>
        <body style="background-color: #035a3b;">
            @include('layouts.menu-admins-users')
            <div class="recuadro-blanco d-flex justify-content-center mt-4">
                <label class="login">Nombre: </label>
                <input type="text">
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>
</html>