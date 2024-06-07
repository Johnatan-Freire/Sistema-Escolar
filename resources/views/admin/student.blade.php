@extends(auth()->check() ? 'layouts.admin' : 'layouts.guest')

@section('title', 'Welcome')

@section('content')
    @auth
        @include('components.students')
    @endauth

    @guest
        <p>Faça login para ter acesso</p>
    @endguest
@endsection
