# APOTEK ABE — Week 6 (PHP Object-Oriented Programming)

Project Apotek Sehat diperbarui untuk menerapkan materi OOP pada Week 6 sambil mempertahankan desain, pencarian produk, dan fitur Fetch API yang sudah ada.

## Penerapan Week 6
1. **Class**: `Produk` dan `Apotek` menjadi blueprint object.
2. **Object**: object dibuat menggunakan `new Produk(...)` dan `new Apotek(...)`.
3. **Property**: data produk (ikon, kategori, nama, deskripsi, harga) dan data apotek disimpan dalam property.
4. **Method**: getter (`getNama()`, `getHarga()`, dan lainnya) serta `cocokDengan()` untuk pencarian.
5. **Constructor**: `__construct()` mengisi nilai awal object.
6. **Encapsulation**: property dibuat `private` dan diakses melalui method public.
7. **Dynamic HTML**: `foreach` memproses object dan method object digunakan untuk menghasilkan kartu produk HTML.
8. **OOP data processing**: pencarian GET memanggil method `cocokDengan()` pada setiap object produk.

## Cara menjalankan dengan XAMPP
1. Jalankan XAMPP Control Panel dan klik **Start** pada Apache.
2. Ekstrak folder `APOTIK ABE` ke `C:\xampp\htdocs\`.
3. Buka `http://localhost/APOTIK%20ABE/` atau `http://localhost/APOTIK%20ABE/index.php`.
4. Uji pencarian seperti `Vitamin` atau `Paracetamol`, dan klik **Ambil Data API** untuk mencoba fitur Fetch API.

PHP harus dijalankan melalui Apache/XAMPP atau PHP development server, bukan dengan membuka file langsung.

## Isi folder
- `index.php` — class, object, constructor, encapsulation, pencarian, dan dynamic HTML.
- `style.css` — tampilan website.
- `script.js` — keranjang, login, dan REST API/Fetch API.
