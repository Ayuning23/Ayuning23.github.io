
## Sistem Informasi Mahasiswa Magang

Sistem Informasi Mahasiswa Magang (MagangApp) adalah aplikasi web berbasis Laravel yang dikembangkan untuk mempermudah pengelolaan data mahasiswa yang sedang melaksanakan kegiatan magang di instansi atau perusahaan tertentu. Aplikasi ini dibuat sebagai bagian dari Ujian Akhir Semester Praktik Pemrograman Web.


## Fitur Unggulan
Aplikasi ini menyediakan berbagai fitur yang mendukung manajemen data magang, di antaranya:

🔐 Autentikasi Pengguna
    Fitur Login dan Register untuk mengamankan akses ke sistem.
    Hanya pengguna terdaftar yang dapat mengelola data.

👨‍🎓 CRUD Mahasiswa
    Tambah, edit, lihat, dan hapus data mahasiswa.
    Setiap mahasiswa memiliki informasi nama, NIM, program studi, dan tempat magang.

🏢 CRUD Tempat Magang
    Kelola daftar instansi atau perusahaan tempat mahasiswa magang.
    Dapat menambahkan nama, alamat, dan keterangan tempat magang.

📄 Upload Laporan Magang (PDF)
    Mahasiswa dapat mengunggah laporan hasil magangnya dalam format PDF.
    File laporan disimpan dan dapat diunduh kembali.

📊 Export Data ke Excel
    Data mahasiswa dapat diekspor ke file Excel untuk keperluan dokumentasi atau pelaporan.

📱 Antarmuka Responsif
    Tampilan disusun menggunakan Tailwind CSS tanpa dependensi npm.
    Responsif di berbagai ukuran layar (mobile, tablet, desktop).



###  Teknologi yang Digunakan

- Laravel 9 adalah framework utama yang digunakan untuk membangun struktur aplikasi secara MVC agar lebih rapi dan mudah dikelola.
- PHP 8 menjadi bahasa pemrograman sisi server yang mendukung performa tinggi dan fitur modern, ideal untuk Laravel.
- MySQL berfungsi sebagai database utama yang menyimpan data pengguna, mahasiswa, tempat magang, dan laporan.
- Blade digunakan sebagai template engine Laravel untuk membangun tampilan halaman yang dinamis dan terintegrasi dengan logika backend.
- Tailwind CSS digunakan untuk mendesain tampilan antarmuka yang responsif dan modern dengan pendekatan utility-first, tanpa instalasi npm.
- Laravel Excel adalah library tambahan yang mempermudah ekspor data mahasiswa ke file Excel dengan cepat dan otomatis.

## Struktur Fitur Utama
-app/Models → Model: Mahasiswa.php, TempatMagang.php, User.php
-app/Http/Controllers → Controller: MahasiswaController, TempatMagangController, AuthController
-resources/views → Tampilan Blade: dashboard.blade.php, mahasiswa/index.blade.php, dll.
-routes/web.php → Routing aplikasi
-public/uploads/laporan → Direktori penyimpanan file PDF laporan mahasiswa

