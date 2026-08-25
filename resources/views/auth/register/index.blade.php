@extends('layouts.auth')

@section('title', 'Registrarse')

@section('container-class', 'white-box white-box-sign-up pl-0 w-75')

@section('content')
    @include('auth.register._form')
@endsection
