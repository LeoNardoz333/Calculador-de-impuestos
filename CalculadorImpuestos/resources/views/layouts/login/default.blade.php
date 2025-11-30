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
        <div class="d-flex flex-column vh-100">
            <div class="recuadro-blanco-login m-auto pb-4 pt-5">
                @if (session('success'))
                    <div class="alert alert-success text-center" role="alert" id="alertSuccess">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="mb-2">
                    <form action="{{ route('user.login') }}" method="post">
                        @csrf
                        <div class="w-100 d-flex justify-content-center">
                            <img class="m-auto" style="width: 45%;" src="{{ asset('icons/cuenta verde.png') }}"
                                alt="">
                        </div>
                        @yield('main')
                    </form>
                </div>
            </div>
        </div>
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
