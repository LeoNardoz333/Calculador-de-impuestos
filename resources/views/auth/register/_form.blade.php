<div class="two-columns">
    <div class="d-flex justify-content-center align-items-center">
        <div class="img-gradient"></div>
    </div>

    <div class="div-form-sign-up">
        <div class="row mb-2">
            <div class="col-12 mb-2">
                <div class="d-flex flex-column pt-0">
                    <h1 class="bold-title-form">Crea tu cuenta nueva</h1>
                    <p class="subtitle-form mt-2">Completa los datos para comenzar</p>
                </div>
            </div>
        </div>
        <form action="{{ route('sign-up.register') }}" method="POST">
            @csrf

            <div class="row mt-2 mb-2">

                <div class="col-12">
                    <label for="name" class="login mb-1">Nombre:</label>

                    <input type="text" class="form-control login-form-input-text" name="name" id="name"
                        value="{{ old('name') }}" placeholder="Nombre completo">

                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-12">
                    <label for="last_name" class="login mb-1">Apellido(s):</label>

                    <input type="text" class="form-control login-form-input-text" name="last_name" id="last_name"
                        value="{{ old('last_name') }}" placeholder="Apellido(s) completo">


                    @error('last_name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mt-2 mb-2">
                <div class="col-12">
                    <label for="username" class="login mb-1">Nombre de usuario:</label>

                    <input type="text" class="form-control login-form-input-text" name="username" id="username"
                        value="{{ old('username') }}" placeholder="Nombre de usuario">

                    @error('username')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-12">
                    <label for="email" class="login mb-1">Correo electrónico:</label>

                    <input type="email" class="form-control login-form-input-text" name="email" id="email"
                        value="{{ old('email') }}" placeholder="Correo electrónico">

                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-12">
                    <label for="password" class="login mb-1">Contraseña:</label>

                    <div class="position-relative">
                        <input type="password" class="form-control login-form-input-text" name="password" id="password"
                            placeholder="*******">

                        <button class="absolute-input-icon end-0" type="button" id="togglePassword"
                            aria-label="Mostrar contraseña">
                            <i class="bi bi-eye-fill absolute-input-icon auth-eye-color" id="iconPassword"></i>
                        </button>
                    </div>

                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-12">
                    <label for="password_confirmation" class="login mb-1">Confirmar contraseña:</label>

                    <div class="position-relative">
                        <input type="password" class="form-control login-form-input-text" name="password_confirmation"
                            id="password_confirmation" placeholder="*******">

                        <button class="absolute-input-icon end-0" type="button" id="confirmPassword"
                            aria-label="Mostrar contraseña">
                            <i class="bi bi-eye-fill absolute-input-icon auth-eye-color" id="iconConfirmPassword"></i>
                        </button>
                    </div>

                    @error('password_confirmation')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mt-4 d-flex justify-content-between align-items-center flex-column flex-md-row">
                <div class="col-12 col-md-auto mb-2 mb-md-0 text-center">
                    <a href="{{ route('home') }}"
                        class="go-back-button w-100 w-md-auto d-inline-flex align-items-center gap-0">
                        <i class="bi bi-arrow-left-short go-back-icon"></i>
                        <span>Regresar</span>
                    </a>
                </div>

                <div class="col-12 col-md-auto text-center">
                    <button type="submit" class="btn btn-success btn-register w-md-auto">Crear
                        cuenta</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
