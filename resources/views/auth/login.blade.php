@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<div class="flex justify-center items-center h-screen">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-white">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="username" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Username</label>
                <input type="text" id="username" name="username" class="block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Senha</label>
                <input type="password" id="password" name="password" class="block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
            </div>
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">Lembrar-me</label>
                </div>
                <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400">Esqueceu a senha?</a>
            </div>
            <div>
                <button type="submit" class="w-full px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-500">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection
