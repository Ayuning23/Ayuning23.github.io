<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Magang')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <nav class="bg-blue-600 text-white p-4 shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-lg font-bold">Magang App</h1>
            <div>
                <a href="{{ route('mahasiswa.index') }}" class="px-4 py-2 hover:underline">Mahasiswa</a>
                <a href="{{ route('tempat-magang.index') }}" class="px-4 py-2 hover:underline">Tempat Magang</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-6 px-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
