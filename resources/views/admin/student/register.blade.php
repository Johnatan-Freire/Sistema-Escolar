@extends('layouts.main')

@section('title', 'Welcome')

@section('content')
    @auth
        @include('components.student.register')
    @endauth

    @guest
        <p>Faça login para ter acesso</p>
    @endguest
@endsection
