@extends(auth()->check() ? 'layouts.admin' : 'layouts.guest')

@section('title', 'Welcome')

@section('content')
    <h1>Bem-vindo ao sistema escolar</h1>
    <p>Este é o conteúdo da página de boas-vindas.</p>

    @auth
        <p>Conteúdo para usuários autenticados.</p>
    @endauth

    @guest
        <p>Conteúdo para visitantes.</p>
    @endguest
@endsection
