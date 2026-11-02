<?php
/** Model: sumber dan pengolahan data produk apotek. */
class Product {
    private array $products = [
        ['id'=>1,'name'=>'Paracetamol 500mg','category'=>'OBAT','description'=>'Membantu meredakan demam dan nyeri.','price'=>10000,'icon'=>'💊'],
        ['id'=>2,'name'=>'Vitamin C 500mg','category'=>'VITAMIN','description'=>'Membantu memenuhi kebutuhan vitamin C.','price'=>25000,'icon'=>'🍊'],
        ['id'=>3,'name'=>'Hand Sanitizer','category'=>'KESEHATAN','description'=>'Membersihkan tangan dari kuman.','price'=>15000,'icon'=>'🧴'],
        ['id'=>4,'name'=>'Plester Luka','category'=>'P3K','description'=>'Perlengkapan untuk luka ringan.','price'=>8000,'icon'=>'🩹'],
    ];
    public function getAll(): array { return $this->products; }
    public function search(string $keyword): array {
        $keyword = mb_strtolower(trim($keyword));
        if ($keyword === '') return $this->getAll();
        return array_values(array_filter($this->products, function ($product) use ($keyword) {
            return str_contains(mb_strtolower($product['name'].' '.$product['category'].' '.$product['description']), $keyword);
        }));
    }
    public function findById(int $id): ?array {
        foreach ($this->products as $product) if ($product['id'] === $id) return $product;
        return null;
    }
}
