<?php
// Data utama apotek disimpan dalam variabel.
$namaApotek = "Apotek Sehat";
$tagline = "Solusi Kesehatan Anda";
$tahun = date("Y");

// Array kategori.
$kategori = [
    ["ikon" => "💊", "nama" => "Obat", "deskripsi" => "Berbagai macam kebutuhan obat."],
    ["ikon" => "🍊", "nama" => "Vitamin", "deskripsi" => "Vitamin dan suplemen kesehatan."],
    ["ikon" => "🩹", "nama" => "P3K", "deskripsi" => "Perlengkapan pertolongan pertama."],
    ["ikon" => "🩺", "nama" => "Alat Kesehatan", "deskripsi" => "Berbagai alat kesehatan."]
];

// Array produk.
$produk = [
    ["ikon" => "💊", "kategori" => "OBAT", "nama" => "Paracetamol 500mg", "deskripsi" => "Membantu meredakan demam dan nyeri.", "harga" => 10000],
    ["ikon" => "🍊", "kategori" => "VITAMIN", "nama" => "Vitamin C 500mg", "deskripsi" => "Membantu memenuhi kebutuhan vitamin C.", "harga" => 25000],
    ["ikon" => "🧴", "kategori" => "KESEHATAN", "nama" => "Hand Sanitizer", "deskripsi" => "Membersihkan tangan dari kuman.", "harga" => 15000],
    ["ikon" => "🩹", "kategori" => "P3K", "nama" => "Plester Luka", "deskripsi" => "Perlengkapan untuk luka ringan.", "harga" => 8000]
];

// Function untuk format harga.
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ",", ".");
}

// Mengambil input pencarian dari URL/form GET.
$kataKunci = isset($_GET["cari"]) ? trim($_GET["cari"]) : "";

// Conditional untuk memfilter data produk.
$produkTampil = [];
foreach ($produk as $item) {
    if ($kataKunci === "" || stripos($item["nama"], $kataKunci) !== false || stripos($item["kategori"], $kataKunci) !== false) {
        $produkTampil[] = $item;
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($namaApotek) ?></title>

    <!-- File CSS (tampilan) -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- ================= NAVBAR ================= -->
    <header>
        <nav class="navbar">

            <div class="logo">
                <div class="logo-icon">+</div>
                <div>
                    <h2><?= htmlspecialchars($namaApotek) ?></h2>
                    <p><?= htmlspecialchars($tagline) ?></p>
                </div>
            </div>

            <ul class="menu">
                <li><a href="#">Beranda</a></li>
                <li><a href="#produk">Produk</a></li>
                <li><a href="#kategori">Kategori</a></li>
                <li><a href="#api-data">API</a></li>
                <li><a href="#tentang">Tentang Kami</a></li>
                <li><a href="#kontak">Kontak</a></li>
            </ul>

            <button class="login-btn" onclick="login()">Login</button>

        </nav>
    </header>


    <!-- ================= HERO ================= -->
    <section class="hero">
        <div class="hero-container">

            <div class="hero-text">
                <div class="small-title">💚 KESEHATAN ANDA PRIORITAS KAMI</div>

                <h1>Temukan Kebutuhan <span>Kesehatan Anda</span></h1>

                <p>
                    Temukan berbagai macam obat, vitamin,
                    dan produk kesehatan dengan mudah
                    melalui Apotek Sehat.
                </p>

                <!-- SEARCH -->
                <form class="search-box" method="GET" action="index.php">
                    <input type="text" name="cari" value="<?= htmlspecialchars($kataKunci) ?>" placeholder="Cari nama obat atau produk...">
                    <button type="submit">🔍 Cari</button>
                </form>

                <div class="hero-buttons">
                    <a href="#produk" class="btn-primary">Lihat Produk →</a>
                    <a href="#tentang" class="btn-secondary">Tentang Kami</a>
                </div>
            </div>

            <!-- HERO CARD -->
            <div class="hero-card">
                <div class="icon">💊</div>
                <h2>Produk Kesehatan</h2>
                <p>Obat, vitamin, dan kebutuhan kesehatan tersedia untuk Anda.</p>

                <div class="statistics">
                    <div><strong>500+</strong><small>Produk</small></div>
                    <div><strong>24/7</strong><small>Layanan</small></div>
                    <div><strong>100%</strong><small>Terpercaya</small></div>
                </div>
            </div>

        </div>
    </section>


    <!-- ================= KATEGORI ================= -->
    <section id="kategori">
        <div class="container">

            <div class="section-title">
                <small>KATEGORI</small>
                <h2>Pilih Kebutuhan Anda</h2>
            </div>

            <div class="category-list">
                <?php foreach ($kategori as $itemKategori): ?>
                    <div class="category">
                        <div class="category-icon"><?= $itemKategori["ikon"] ?></div>
                        <h3><?= htmlspecialchars($itemKategori["nama"]) ?></h3>
                        <p><?= htmlspecialchars($itemKategori["deskripsi"]) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ================= PRODUK ================= -->
    <section id="produk">
        <div class="container">

            <div class="section-title">
                <small>PRODUK</small>
                <h2>Produk Populer</h2>
            </div>

            <?php if ($kataKunci !== ""): ?>
                <p class="search-result">Hasil pencarian untuk: <strong><?= htmlspecialchars($kataKunci) ?></strong></p>
            <?php endif; ?>
            <div class="product-list">
                <?php if (count($produkTampil) > 0): ?>
                    <?php foreach ($produkTampil as $itemProduk): ?>
                        <div class="product">
                            <div class="product-image"><?= $itemProduk["ikon"] ?></div>
                            <span class="product-category"><?= htmlspecialchars($itemProduk["kategori"]) ?></span>
                            <h3><?= htmlspecialchars($itemProduk["nama"]) ?></h3>
                            <p><?= htmlspecialchars($itemProduk["deskripsi"]) ?></p>
                            <div class="product-bottom">
                                <span class="price"><?= formatRupiah($itemProduk["harga"]) ?></span>
                                <button class="cart-button" type="button" onclick="addCart()">+ Keranjang</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-product">
                        <h3>Produk tidak ditemukan</h3>
                        <p>Coba gunakan kata kunci lain.</p>
                        <a href="index.php" class="btn-primary">Tampilkan Semua Produk</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>



    <!-- ================= REST API ================= -->
    <section id="api-data" class="api-section">
        <div class="container">
            <div class="section-title">
                <small>REST API & FETCH API</small>
                <h2>Data Kesehatan dari API</h2>
                <p class="api-intro">
                    Data berikut diambil secara dinamis menggunakan Fetch API dan JSON.
                </p>
            </div>

            <div class="api-control">
                <div>
                    <strong>Status API:</strong>
                    <span id="api-status">Siap mengambil data...</span>
                </div>
                <button id="api-load-btn" class="cart-button">Ambil Data API</button>
            </div>

            <div id="api-loading" class="api-state api-loading hidden">
                <div class="api-spinner"></div>
                <p>Loading data dari API...</p>
            </div>

            <div id="api-error" class="api-state api-error hidden">
                <h3>Gagal mengambil data</h3>
                <p id="api-error-message"></p>
                <button id="api-retry-btn" class="cart-button">Coba Lagi</button>
            </div>

            <div id="api-success" class="hidden">
                <div id="api-list" class="api-list"></div>
            </div>
        </div>
    </section>


    <!-- ================= TENTANG ================= -->
    <section class="about" id="tentang">
        <div class="about-container">

            <small class="small-title">TENTANG KAMI</small>

            <h2>Apotek Sehat untuk Kebutuhan Kesehatan Anda</h2>

            <p>
                Apotek Sehat menyediakan berbagai
                kebutuhan kesehatan seperti obat,
                vitamin, alat kesehatan, dan produk
                perawatan dengan proses pemesanan
                yang mudah dan praktis.
            </p>

        </div>
    </section>


    <!-- ================= FOOTER ================= -->
    <footer id="kontak">

        <div class="footer-container">

            <div>
                <h2>✚ Apotek Sehat</h2>
                <p>Solusi mudah untuk kebutuhan kesehatan Anda.</p>
            </div>

            <div>
                <h3>Kontak</h3>
                <p>📍 Malang, Jawa Timur</p>
                <p>📞 0812-3456-7890</p>
                <p>✉️ info@apoteksehat.com</p>
            </div>

        </div>

        <div class="copyright">
            © <?= $tahun ?> <?= htmlspecialchars($namaApotek) ?>. Semua hak dilindungi.
        </div>

    </footer>


    <!-- File JavaScript (fungsi tombol) -->
    <script src="script.js"></script>

</body>

</html>
