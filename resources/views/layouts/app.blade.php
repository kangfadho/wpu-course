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
    <header class="bg-green-500 text-white p-6">
        <h1 class="text-2xl font-bold">Perpustakaan FaDoo</h1>
    </header>

    <main class="p-6">
        @yield('content')
    </main>
</body>
</html>