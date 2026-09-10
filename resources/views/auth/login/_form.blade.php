<form method="POST" action="{{ route('auth.login') }}" class="w-100">
    @csrf
    <div class="text-center mt-2 mb-3">
        <h2 class="bold-title-login">Inicio de sesión</h2>
    </div>

    <x-form.input name="username" label="Usuario:" labelClass="mt-2" autofocus required
        placeholder="Ingresa el nombre de usuario" />

    <x-form.password name="password" label="Contraseña:" labelClass="mt-2" required autocomplete="current-password" />

    <x-buttons.primary-button type="submit" :useIcon="false" class="mt-4">
        Iniciar sesión
    </x-buttons.primary-button>

    <x-form.checkbox name="remember" label="Recuérdame"
        containerClass="w-100 mt-2 d-flex align-items-center justify-content-center" />
</form>