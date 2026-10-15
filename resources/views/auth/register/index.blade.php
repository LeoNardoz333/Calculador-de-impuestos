@extends('layouts.auth')

@section('title', 'Registrarse')

@section('container-class', 'app-form-container pl-0 w-75')

@section('content')
    @include('auth.register._form')
@endsection
