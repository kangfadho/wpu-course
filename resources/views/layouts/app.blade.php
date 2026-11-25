<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan FaDoo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="bg-green-500 text-white p-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold"><a href="{{ url('/') }}">Perpustakaan FaDoo</a></h1>
        <nav class="space-x-4">
            <a href="{{ url('/') }}" class="hover:underline font-medium">Home</a>
            <a href="{{ route('buku.index') }}" class="hover:underline font-medium">Daftar Buku</a>
        </nav>
    </header>

    <main class="p-6">
        @yield('content')
    </main>
</body>
</html>