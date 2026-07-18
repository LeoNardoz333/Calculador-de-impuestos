<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

    <title>@yield('title', 'Calculador de Impuestos')</title>
</head>

<body class="bg-login h-100">
    <div class="d-flex flex-column min-vh-100">
        <header>
            @yield('header-menu')
        </header>

        <main class="flex-grow-1 d-flex">
            <div class="d-flex justify-content-center align-items-center w-100">
                <div class="white-box-login">
                    <x-alert />
                    
                    <div class="mb-2">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>

    @stack('scripts')
</body>

</html>
