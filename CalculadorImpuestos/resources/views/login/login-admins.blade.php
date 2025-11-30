@extends('layouts.login.default')

@section('header-menu')
    @include('components.menus.menu-admins-users')
@endsection

@section('main')
    <input type="hidden" name="permisos" value="admin">
    <div class="text-center mt-2 mb-3">
        <label class="titulos-negritas">Login - Administradores</label>
    </div>

    @include('components.forms.login-form')
@endsection
