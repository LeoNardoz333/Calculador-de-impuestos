@extends('layouts.login.default')

@section('header-menu')
    @include('components.menus.menu-admins-users')
@endsection

@section('main')
    <input type="hidden" name="permisos" value="user">
    <div class="text-center mt-2 mb-3">
        <label class="titulos-negritas">Iniciar sesión</label>
    </div>

    @include('components.forms.login-form')

    <div class="row text-center mt-2">
        <a href="{{ route('v_sign-up') }}">¿No tienes una cuenta?, regístrate aquí</a>
    </div>
@endsection
