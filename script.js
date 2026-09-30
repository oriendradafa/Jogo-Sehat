// ================= JAVASCRIPT APOTEK SEHAT =================

// Menyimpan jumlah produk di keranjang
let jumlahKeranjang = 0;


// Dipanggil saat tombol "+ Keranjang" ditekan
function addCart() {
    jumlahKeranjang++;
    alert("Produk berhasil ditambahkan ke keranjang!");
}


// Dipanggil saat tombol "Cari" ditekan
function searchProduct() {
    let keyword = document.getElementById("search").value;

    if (keyword.trim() === "") {
        alert("Silakan masukkan nama obat atau produk.");
    } else {
        alert("Mencari produk: " + keyword);
    }
}


// Dipanggil saat tombol "Login" ditekan
function login() {
    alert("Halaman login akan dibuat pada tahap berikutnya.");
}
