# APOTIK ABE — Implementasi Week 7 (MVC)

Project website Apotek Sehat disusun ulang mengikuti materi Week 7 tentang pola arsitektur **MVC (Model–View–Controller)**.

## Struktur folder

```text
APOTIK ABE/
├── index.php                    # Entry point / Front Controller
├── app/
│   ├── models/
│   │   └── Product.php          # Data dan operasi pencarian produk
│   ├── controllers/
│   │   └── ProductController.php# Mengolah request dan menghubungkan Model-View
│   └── views/
│       └── home.php             # Antarmuka website
├── style.css                    # Tampilan
└── script.js                    # Interaksi Fetch API pada View
```

## Penerapan MVC
- **Model:** `app/models/Product.php` menyimpan data produk, mengambil seluruh produk, mencari produk, dan mencari produk berdasarkan ID.
- **Controller:** `app/controllers/ProductController.php` menerima request pencarian/keranjang, memanggil Model, lalu menyiapkan data untuk View.
- **View:** `app/views/home.php` menampilkan halaman dan data produk yang diberikan Controller.
- **Alur:** User → Request → `index.php`/Controller → Model → Controller → View → User.

## Fitur
1. Pencarian produk berdasarkan nama, kategori, atau deskripsi.
2. Penambahan produk ke keranjang dengan jumlah tersimpan pada session PHP.
3. Tampilan kategori dan produk tetap menggunakan desain sebelumnya.
4. Bagian REST API & Fetch API dari tugas sebelumnya tetap dipertahankan.

## Cara menjalankan
1. Pastikan PHP tersedia (disarankan PHP 8+).
2. Buka terminal pada folder `APOTIK ABE`.
3. Jalankan `php -S localhost:8000`.
4. Buka `http://localhost:8000` pada browser.

Catatan: Jangan membuka `index.php` langsung sebagai file. Jalankan melalui server PHP (atau XAMPP dengan folder diletakkan di `htdocs`).
