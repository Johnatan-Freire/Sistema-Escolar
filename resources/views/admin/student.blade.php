@extends(auth()->check() ? 'layouts.admin' : 'layouts.guest')

@section('title', 'Welcome')

@section('content')
    @auth
        @include('components.student')
    @endauth

    @guest
        <p>Faça login para acessar esta pagina.</p>
    @endguest
@endsection
