@extends('layouts.login.default')

@section('header-menu')
    @include('components.menus.menu-admins-users')
@endsection

@section('main')

    <x:forms.login-form :permissions="'user'" :loginTitle="'Inicio de sesión'" />

    <div class="row text-center mt-2">
        <a href="{{ route('v_sign-up') }}">¿No tienes una cuenta?, regístrate aquí</a>
    </div>
@endsection
