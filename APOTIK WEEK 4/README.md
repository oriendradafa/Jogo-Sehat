# Apotek Sehat (PHP - Week 4)

## Menjalankan proyek
1. Pastikan PHP 7.4+ terpasang.
2. Buka terminal pada folder proyek.
3. Jalankan `php -S localhost:8000`.
4. Buka `http://localhost:8000` di browser.

Bagian Layanan menggunakan JavaScript Fetch API untuk meminta `index.php?api=1`.
PHP mengembalikan array layanan dalam format JSON. JavaScript mem-parsing JSON dan merender kartu layanan ke DOM, lengkap dengan loading, error, dan tombol retry.
Data layanan merupakan contoh untuk tugas, bukan klaim layanan medis yang benar-benar tersedia.

File utama: `index.php`, `style.css`, `script.js`.
