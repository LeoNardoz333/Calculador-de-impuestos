<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.ts', 'resources/js/modules/auth.ts'])

    @stack('styles')

    <title>@yield('title', config('app.name'))</title>
</head>

<body class="bg-login h-100">
    <div class="d-flex flex-column min-vh-100">

        <main class="flex-grow-1 d-flex justify-content-center align-items-center">
                <div class="@yield('container-class', 'app-form-container form-login-container')">
                    <x-alert />
                    
                    <div class="mb-2">
                        @yield('content')
                    </div>
                </div>
        </main>

    @stack('scripts')
</body>

</html>
