<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Magang App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 1rem;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-500 min-h-screen text-white flex items-center justify-center px-4">

    <div class="max-w-4xl w-full space-y-8">
        <!-- Header -->
        <div class="text-center">
            <h1 class="text-4xl font-extrabold">Magang App</h1>
            <p class="text-white/80 text-lg">Sistem Informasi Mahasiswa Magang</p>
        </div>

        <!-- Flash message -->
        @if (session('status'))
            <div class="bg-green-500 text-white text-center py-2 rounded shadow-lg">
                {{ session('status') }}
            </div>
        @endif

        <!-- Menu Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('mahasiswa.index') }}" class="glass-card p-6 hover:bg-white/10 transition text-center">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/student-center.png" class="mx-auto mb-4" />
                <h2 class="text-2xl font-bold">Mahasiswa</h2>
                <p class="text-white/80 mt-2">Kelola data mahasiswa magang</p>
            </a>

            <a href="{{ route('tempat-magang.index') }}" class="glass-card p-6 hover:bg-white/10 transition text-center">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/company.png" class="mx-auto mb-4" />
                <h2 class="text-2xl font-bold">Tempat Magang</h2>
                <p class="text-white/80 mt-2">Kelola daftar tempat magang</p>
            </a>
        </div>

        <!-- Footer -->
        <footer class="text-center text-white/60 text-sm pt-6">
            &copy; {{ date('Y') }} Magang App — Sistem Informasi Magang Mahasiswa
        </footer>
    </div>

</body>
</html>
