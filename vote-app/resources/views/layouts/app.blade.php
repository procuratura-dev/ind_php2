<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voting App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <nav class="p-4 bg-white shadow flex justify-between">
        <a href="{{ route('votes.index') }}" class="font-bold">Voting App</a>
        <div>
            @auth
                <a href="{{ route('votes.index') }}" class="mr-4">Votes</a>
                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.index') }}" class="mr-4">Admin Panel</a>
                @endif
                <form action="{{ route('logout') }}" method="post" class="inline">
                    @csrf
                    <button type="submit" class="text-red-500">Logout</button>
                </form>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="mr-4">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endguest
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        @if(session('success'))
            <div class="p-4 mb-4 text-green-700 bg-green-200">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="p-4 mb-4 text-red-700 bg-red-200">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
