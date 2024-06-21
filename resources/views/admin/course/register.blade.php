@extends('layouts.main')

@section('title', 'Welcome')

@section('content')
    @auth
        @include('components.course.register')
        @include('components.course.list')
    @endauth

    @guest
        <p>Faça login para ter acesso</p>
    @endguest
@endsection
