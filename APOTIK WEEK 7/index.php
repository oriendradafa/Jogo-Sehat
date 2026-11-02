<?php
// Entry point aplikasi (Front Controller).
require_once __DIR__ . '/app/controllers/ProductController.php';
$controller = new ProductController();
$data = $controller->index();
extract($data, EXTR_SKIP);
require __DIR__ . '/app/views/home.php';
