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
        <form action="{{ route('auth.register') }}" method="POST">
            @csrf

            <div class="row mt-2 mb-2">
                <x-form.input name="name" label="Nombre(s):" placeholder="Nombre(s)" required />
            </div>

            <div class="row mb-2">
                <x-form.input name="last_name" label="Apellido(s):" placeholder="Apellidos completos" required />
            </div>

            <div class="row mt-2 mb-2">
                <x-form.input name="username" label="Nombre de usuario:" placeholder="Nombre de usuario" required />
            </div>

            <div class="row mb-2">
                <x-form.input name="email" type="email" label="Correo electrónico:" placeholder="Correo electrónico" required />
            </div>

            <div class="row mb-2">
                <x-form.password name="password" label="Contraseña:" required />
            </div>

            <div class="row mb-2">
                <x-form.password name="password_confirmation" label="Confirmar contraseña:" required />
            </div>

            <div class="row mt-4 d-flex justify-content-between align-items-center flex-column flex-md-row">
                <div class="col-12 col-md-auto mb-2 mb-md-0 text-center">
                    <x-form.back-button :href="{{ route('auth.login') }}">
                        Regresar
                    </x-form.back-button>
                </div>

                <div class="col-12 col-md-auto text-center">
                    <x-form.primary-button type="submit" :useIcon="false">
                        Crear cuenta
                    </x-form.primary-button>
                </div>
            </div>
        </form>
    </div>
</div>