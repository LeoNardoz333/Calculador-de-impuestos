<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    @vite(['resources/css/elements/divs.css', 'resources/css/elements/buttons.css', 'resources/css/elements/fonts.css', 'resources/css/elements/icons.css', 'resources/css/elements/texts.css', 'resources/js/app.js', 'resources/js/modules/login/f_login.js', 'resources/css/elements/navbars.css', 'resources/css/elements/inputs.css'])
    <meta charset="UTF-8">
    <title>Registrarse</title>
</head>

<body class="bg-login h-100">
    <div class="d-flex flex-column min-vh-100">
        <header>
            @include('components.menus.menu-admins-users')
        </header>
        <main class="flex-grow-1 d-flex justify-content-center align-items-center w-100">
            <div class="white-box white-box-sign-up pl-0 w-75">
                <div class="two-columns">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="img-gradient"></div>
                    </div>

                    <div class="div-form-sign-up">
                        <div class="row mb-2">
                            <div class="col-12 mb-2">
                                <div class="d-flex flex-column pt-0">
                                    <label class="titulos-negritas-sign-up">Crea tu cuenta nueva</label>
                                    <label class="subtitulos-sign-up mt-2">Completa los datos para comenzar</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2 mb-2">
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <label class="login mb-1">Nombre:</label>
                                    <input type="text" class="form-control login-form-input-text" name="nombre"
                                        id="nombre" value="{{ old('nombre') }}" placeholder="Nombre completo">
                                </div>
                        </div>
                        @error('nombre')
                            <p class="text text-danger">{{ $message }}</p>
                        @enderror
                        <div class="row mb-2">
                            <div class="col-12">
                                <label class="login mb-1">Apellido(s):</label>
                                <input type="text" class="form-control login-form-input-text" name="apellido"
                                    id="apellido" value="{{ old('apellido') }}" placeholder="Apellido(s) completo">
                            </div>
                        </div>
                        @error('apellido')
                            <p class="text text-danger">{{ $message }}</p>
                        @enderror
                        <div class="row mt-2 mb-2">
                            <div class="col-12">
                                <label class="login mb-1">Nombre de usuario:</label>
                                <input type="text" class="form-control login-form-input-text" name="usuario"
                                    id="usuario" value="{{ old('usuario') }}" placeholder="Nombre de usuario">
                            </div>
                        </div>
                        @error('usuario')
                            <p class="text text-danger">{{ $message }}</p>
                        @enderror
                        <div class="row mb-2">
                            <div class="col-12">
                                <label class="login mb-1">Contraseña:</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control login-form-input-text" name="password"
                                        id="password" placeholder="*******" value="{{ old('password') }}">
                                    <button class="btn ojo end-0" type="button" id="togglePassword">
                                        <i class="bi bi-eye-fill ojo ojo-login-color" id="iconPassword"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @error('password')
                            <p class="text text-danger">{{ $message }}</p>
                        @enderror
                        <div class="row mb-2">
                            <div class="col-12">
                                <label class="login mb-1">Confirmar contraseña:</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control login-form-input-text"
                                        name="password_confirmation" id="password_confirmation" placeholder="*******"
                                        value="{{ old('password_confirmation') }}">
                                    <button class="btn ojo end-0" type="button" id="confirmPassword">
                                        <i class="bi bi-eye-fill ojo ojo-login-color" id="iconConfirmPassword"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @error('password_confirmation')
                            <p class="text text-danger">{{ $message }}</p>
                        @enderror
                        <input type="text" name="permisos" value="usuario" hidden>
                        <div class="row mt-4 d-flex justify-content-between align-items-center flex-column flex-md-row">
                            <div class="col-12 col-md-auto mb-2 mb-md-0 text-center">
                                <a href=" {{ /*url()->previous() */ route('home') }}  "
                                    class="regresar w-100 w-md-auto d-inline-flex align-items-center gap-0">
                                    <i class="bi bi-arrow-left-short regresar"></i>
                                    <span>Regresar</span>
                                </a>
                            </div>
                            <div class="col-12 col-md-auto text-center">
                                <button type="submit" class="btn btn-success btn-sign-up w-md-auto">Crear
                                    cuenta</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        //Clicking on the eye icon to show and hide the password
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("togglePassword")
                .addEventListener("click", function() {
                    togglePasswordVisibility("password", "togglePassword", "iconPassword");
                });
            document.getElementById("confirmPassword").addEventListener("click", function() {
                togglePasswordVisibility("password_confirmation", "confirmPassword", "iconConfirmPassword");
            });
        });
    </script>
</body>

</html>
