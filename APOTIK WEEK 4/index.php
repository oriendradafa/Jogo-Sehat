<?php
// Endpoint PHP untuk meneruskan permintaan ke REST API dan mengembalikan JSON.
if (isset($_GET['api'])) {
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-Control: no-store');

    // Data layanan dikirim sebagai JSON dari endpoint PHP lokal.
    $services = [
        ['id' => 1, 'name' => 'Konsultasi Apoteker', 'description' => 'Konsultasikan penggunaan obat dan pertanyaan kesehatan dengan apoteker.', 'icon' => '🩺'],
        ['id' => 2, 'name' => 'Informasi Obat', 'description' => 'Dapatkan informasi umum mengenai aturan penggunaan dan penyimpanan obat.', 'icon' => '💊'],
        ['id' => 3, 'name' => 'Pemesanan Produk', 'description' => 'Bantu temukan dan pesan produk kesehatan yang tersedia di apotek.', 'icon' => '🛒'],
        ['id' => 4, 'name' => 'Pemeriksaan Kesehatan', 'description' => 'Layanan pemeriksaan dasar seperti tekanan darah sesuai ketersediaan.', 'icon' => '🩹'],
        ['id' => 5, 'name' => 'Antar Obat', 'description' => 'Informasi layanan antar untuk area yang dijangkau apotek.', 'icon' => '🚚'],
        ['id' => 6, 'name' => 'P3K dan Alat Kesehatan', 'description' => 'Bantuan memilih perlengkapan pertolongan pertama dan alat kesehatan.', 'icon' => '🧰'],
    ];
    echo json_encode($services, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apotek Sehat</title>

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
                    <h2>Apotek Sehat</h2>
                    <p>Solusi Kesehatan Anda</p>
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
                <div class="search-box">
                    <input type="text" id="search" placeholder="Cari nama obat atau produk...">
                    <button onclick="searchProduct()">🔍 Cari</button>
                </div>

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

                <div class="category">
                    <div class="category-icon">💊</div>
                    <h3>Obat</h3>
                    <p>Berbagai macam kebutuhan obat.</p>
                </div>

                <div class="category">
                    <div class="category-icon">🍊</div>
                    <h3>Vitamin</h3>
                    <p>Vitamin dan suplemen kesehatan.</p>
                </div>

                <div class="category">
                    <div class="category-icon">🩹</div>
                    <h3>P3K</h3>
                    <p>Perlengkapan pertolongan pertama.</p>
                </div>

                <div class="category">
                    <div class="category-icon">🩺</div>
                    <h3>Alat Kesehatan</h3>
                    <p>Berbagai alat kesehatan.</p>
                </div>

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

            <div class="product-list">

                <!-- PRODUK 1 -->
                <div class="product">
                    <div class="product-image">💊</div>
                    <span class="product-category">OBAT</span>
                    <h3>Paracetamol 500mg</h3>
                    <p>Membantu meredakan demam dan nyeri.</p>
                    <div class="product-bottom">
                        <span class="price">Rp 10.000</span>
                        <button class="cart-button" onclick="addCart()">+ Keranjang</button>
                    </div>
                </div>

                <!-- PRODUK 2 -->
                <div class="product">
                    <div class="product-image">🍊</div>
                    <span class="product-category">VITAMIN</span>
                    <h3>Vitamin C 500mg</h3>
                    <p>Membantu memenuhi kebutuhan vitamin C.</p>
                    <div class="product-bottom">
                        <span class="price">Rp 25.000</span>
                        <button class="cart-button" onclick="addCart()">+ Keranjang</button>
                    </div>
                </div>

                <!-- PRODUK 3 -->
                <div class="product">
                    <div class="product-image">🧴</div>
                    <span class="product-category">KESEHATAN</span>
                    <h3>Hand Sanitizer</h3>
                    <p>Membersihkan tangan dari kuman.</p>
                    <div class="product-bottom">
                        <span class="price">Rp 15.000</span>
                        <button class="cart-button" onclick="addCart()">+ Keranjang</button>
                    </div>
                </div>

                <!-- PRODUK 4 -->
                <div class="product">
                    <div class="product-image">🩹</div>
                    <span class="product-category">P3K</span>
                    <h3>Plester Luka</h3>
                    <p>Perlengkapan untuk luka ringan.</p>
                    <div class="product-bottom">
                        <span class="price">Rp 8.000</span>
                        <button class="cart-button" onclick="addCart()">+ Keranjang</button>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <!-- ================= REST API ================= -->
    <section id="api-data" class="api-section">
        <div class="container">
            <div class="section-title">
                <small>LAYANAN APOTEK · WEEK 4</small>
                <h2>Layanan Apotek ABE</h2>
                <p class="api-intro">
                    Daftar layanan dimuat secara dinamis dari endpoint PHP dalam format JSON menggunakan Fetch API.
                </p>
            </div>

            <div class="api-control">
                <div>
                    <strong>Status API:</strong>
                    <span id="api-status">Siap mengambil data...</span>
                </div>
                <button id="api-load-btn" class="cart-button">Muat Layanan</button>
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
            © 2026 Apotek Sehat. Semua hak dilindungi.
        </div>

    </footer>


    <!-- File JavaScript (fungsi tombol) -->
    <script src="script.js"></script>

</body>

</html>
