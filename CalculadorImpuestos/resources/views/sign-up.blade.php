<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/css/Botones.css'])
        @vite(['resources/css/Fuentes.css'])
        @vite(['resources/css/Recuadros.css'])
        @vite(['resources/css/Iconos.css'])
        <link rel="stylesheet" href="{{ url('/css/Botones.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <title>Registrarse</title>
    </head>
        <body style="background-color:rgb(189, 235, 203);">
            @include('layouts.menu-admins-users')
            <div class="recuadro-blanco pt-5 pb-4 mt-4">
    <div class="row mb-2">
        <div class="col-12 text-center mb-2">
            <label class="titulos-negritas">Completa los datos para crear tu cuenta</label>
        </div>
    </div>
    <div class="row mt-2 mb-2">
        <div class="col-12">
            <label class="login">Nombre:</label>
            <input type="text" class="form-control" id="nombre">
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-12">
            <label class="login">Apellido:</label>
            <input type="text" class="form-control" id="apellido">
        </div>
    </div>
    <div class="row mt-2 mb-2">
        <div class="col-12">
            <label class="login">Nombre de usuario:</label>
            <input type="text" class="form-control" id="usuario">
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-12">
            <label class="login">Contraseña:</label>
            <div class="position-relative">
                <input type="password" class="form-control" id="password">
                <button class="btn ojo position-absolute end-0" type="button" id="togglePassword">
                    <img src="{{ asset('icons/showPass.png') }}" alt="ShowPassword" id="showPassword">
                </button>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12">
            <label class="login">Confirmar contraseña:</label>
            <div class="position-relative">
                <input type="password" class="form-control" id="confirm-password">
                <button class="btn ojo position-absolute end-0" type="button" id="confirmPassword">
                    <img src="{{ asset('icons/showPass.png') }}" alt="ShowConfirmPassword" id="showConfirmPassword">
                </button>
            </div>
        </div>
    </div>
    <div class="row mt-4 d-flex justify-content-between align-items-center flex-column flex-md-row">
        <div class="col-12 col-md-auto mb-2 mb-md-0 text-center">
            <a href="" class="regresar w-100 w-md-auto">Regresar</a>
        </div>
        <div class="col-12 col-md-auto text-center">
            <button class="btn btn-success w-100 w-md-auto">Crear cuenta</button>
        </div>
    </div>
</div>


            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            
            <script>
                //Clicking on the eye icon to show and hide the password
                document.getElementById("togglePassword")
                .addEventListener("click", function () {
                    togglePasswordVisibility("password", "showPassword");
                });
                document.getElementById("confirmPassword").addEventListener("click", function (){
                    togglePasswordVisibility("confirm-password", "showConfirmPassword");
                });

                function togglePasswordVisibility(inputId, inputIconId) {
                    var passwordInput = document.getElementById(inputId);
                    var passwordIcon = document.getElementById(inputIconId);

                    if (passwordInput && passwordIcon) {
                        if (passwordInput.type === "password") {
                            passwordInput.type = "text";
                            passwordIcon.src = "{{ asset('icons/hidePass.png') }}";
                        } else {
                            passwordInput.type = "password";
                            passwordIcon.src = "{{ asset('icons/showPass.png') }}";
                        }
                    }
                }
            </script>
        </body>
</html>