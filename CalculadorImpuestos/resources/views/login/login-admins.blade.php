@extends('layouts.login.default')

@section('header-menu')
    @include('components.menus.menu-admins-users')
@endsection

@section('main')
    <x:forms.login-form :permissions="'admin'" :loginTitle="'Login - Administradores'" />
@endsection
