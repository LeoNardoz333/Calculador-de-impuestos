<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/elements/divs.css', 'resources/css/elements/buttons.css',
     'resources/css/elements/fonts.css', 'resources/css/elements/icons.css',
      'resources/css/elements/texts.css', 'resources/js/app.js', 'resources/js/modules/login/f_login.js',
       'resources/css/elements/navbars.css', 'resources/css/elements/inputs.css'])
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="bg-login h-100">
    <div class="d-flex flex-column min-vh-100">
        <header>
            @yield('header-menu')
        </header>

        <main class="flex-grow-1  d-flex">
            <div class="d-flex justify-content-center align-items-center w-100">
                <div class="white-box-login">
                    @if (session('success'))
                        <div class="alert alert-success text-center" role="alert" id="alertSuccess">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="mb-2">
                        <form action="{{ route('user.login') }}" method="post">
                            @csrf
                            <div class="w-100 d-flex justify-content-center">
                                <i class="bi bi-person-fill login-big-user-icon"></i>
                            </div>
                            @yield('main')
                        </form>
                    </div>
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
                window.togglePasswordVisibility("password", "togglePassword", "iconPassword");
            });
            hideAlert("alertSuccess");
        });
    </script>
</body>

</html>
