<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Glassmorphism card */
        .glass-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 1.5rem;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-500 via-purple-600 to-pink-500 min-h-screen flex items-center justify-center text-white">

    <div class="glass-card p-10 max-w-md w-full text-center">
        <div class="mb-6">
            <!-- Optional logo -->
            <img src="https://img.icons8.com/ios-filled/100/ffffff/graduation-cap.png" alt="Magang Logo" class="mx-auto mb-4">
            <h1 class="text-4xl font-extrabold mb-2">Selamat Datang</h1>
            <p class="text-white/80">di Sistem Informasi Magang Mahasiswa</p>
        </div>

        <div class="flex justify-center space-x-4 mt-6">
            <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-full font-semibold shadow transition-all duration-200">
                Login
            </a>
            <a href="{{ route('register') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-full font-semibold shadow transition-all duration-200">
                Register
            </a>
        </div>

        <footer class="mt-8 text-sm text-white/70">
            &copy; {{ date('Y') }} Magang App — Universitas Muhammadiya Semarang

        </footer>
    </div>

</body>
</html>
