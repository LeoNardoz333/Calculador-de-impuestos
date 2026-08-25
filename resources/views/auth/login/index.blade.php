@extends('layouts.auth')

@section('title', 'Inicio de sesión')

@section('content')
    @include('auth.login._form')

    <p class="text-center mt-2">
        ¿No tienes una cuenta?
        <a href="{{ route('register.form') }}">
            Regístrate aquí
        </a>
    </p>
@endsection