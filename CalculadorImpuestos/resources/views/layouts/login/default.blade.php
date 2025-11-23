<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/Recuadros.css'])
    @vite(['resources/css/Fuentes.css'])
    @vite(['resources/css/Iconos.css'])
    @vite(['resources/js/f_login.js'])
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="bg-login">
    <header>
        @yield('header-menu')
    </header>

    <main>
        @yield('main')
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("togglePassword").
            addEventListener("click", function() {
                togglePasswordVisibility("password", "togglePassword");
            });
            hideAlert("alertSuccess");
        });
    </script>
</body>

</html>
