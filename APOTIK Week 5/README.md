# APOTEK JOGO SEHAT - Week 5 (PHP Server-Side)

Website Apotek JOGO SEHAT disesuaikan dengan materi Week 5.

## Penerapan materi
1. **PHP Page:** halaman utama menggunakan `index.php`.
2. **Variable:** `$namaApotek`, `$tagline`, `$tahun`, dan `$kataKunci`.
3. **Array:** `$kategori` dan `$produk` menyimpan data kategori dan produk.
4. **Conditional:** `if/else` memeriksa kata kunci dan kondisi produk ditemukan/tidak.
5. **Loop:** `foreach` menampilkan kategori dan produk dari array.
6. **Function:** `formatRupiah()` memformat harga menjadi Rupiah.
7. **Server-side processing:** pencarian dikirim dengan metode GET dan diproses oleh PHP.
8. **Dynamic HTML:** PHP menghasilkan HTML berdasarkan data dan kata kunci.

Fitur REST API & Fetch API sebelumnya tetap dipertahankan sebagai fitur JavaScript tambahan.

## Cara menjalankan dengan XAMPP
1. Install XAMPP, lalu buka XAMPP Control Panel.
2. Klik **Start** pada Apache.
3. Ekstrak folder `APOTIK ABE`.
4. Salin folder tersebut ke `C:\xampp\htdocs\`.
5. Buka `http://localhost/APOTIK%20ABE/` atau `http://localhost/APOTIK%20ABE/index.php`.
6. Coba pencarian seperti `Vitamin` atau `Paracetamol`.

**Catatan:** PHP tidak dapat dijalankan dengan membuka file langsung atau Live Server biasa. Gunakan Apache melalui XAMPP atau PHP development server.

## Isi folder
- `index.php` - halaman utama dan proses PHP.
- `style.css` - desain website.
- `script.js` - keranjang dan Fetch API.
- `README.md` - petunjuk penggunaan.
