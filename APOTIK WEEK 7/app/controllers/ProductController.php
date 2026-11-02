<?php
/** Controller: menerima request, memanggil Model, lalu menentukan View. */
require_once __DIR__ . '/../models/Product.php';
class ProductController {
    private Product $model;
    public function __construct() { $this->model = new Product(); }
    public function index(): array {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        $keyword = trim($_GET['search'] ?? '');
        $notice = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'add_cart') {
            $product = $this->model->findById((int)($_POST['product_id'] ?? 0));
            if ($product) {
                $_SESSION['cart_count'] = ($_SESSION['cart_count'] ?? 0) + 1;
                $notice = htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') . ' berhasil ditambahkan ke keranjang.';
            }
        }
        if (isset($_GET['login'])) $notice = 'Fitur login akan dikembangkan pada tahap berikutnya.';
        return [
            'products' => $this->model->search($keyword),
            'keyword' => $keyword,
            'cartCount' => (int)($_SESSION['cart_count'] ?? 0),
            'notice' => $notice,
        ];
    }
}
