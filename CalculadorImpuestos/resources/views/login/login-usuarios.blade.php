@extends('layouts.login.default')

@section('header-menu')
    @include('components.menus.menu-admins-users')
@endsection

@section('main')
    <div class="d-flex flex-column vh-100">
        <div class="recuadro-blanco-login m-auto pb-4 pt-5">
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert" id="alertSuccess">
                    {{ session('success') }}
                </div>
            @endif
            <div class="mb-2">
                <form action="{{ route('user.login') }}" method="post">
                    @csrf
                    <input type="hidden" name="permisos" value="user">

                    @include('components.forms.login-form')

                    <div class="row text-center mt-2">
                        <a href="{{ route('v_sign-up') }}">¿No tienes una cuenta?, regístrate aquí</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
