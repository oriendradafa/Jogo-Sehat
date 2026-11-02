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


// ================= REST API & FETCH API =================
const API_URL = "https://jsonplaceholder.typicode.com/posts?_limit=9";

const apiLoadBtn = document.getElementById("api-load-btn");
const apiRetryBtn = document.getElementById("api-retry-btn");
const apiLoading = document.getElementById("api-loading");
const apiError = document.getElementById("api-error");
const apiSuccess = document.getElementById("api-success");
const apiErrorMessage = document.getElementById("api-error-message");
const apiStatus = document.getElementById("api-status");
const apiList = document.getElementById("api-list");

function showApiState(state) {
    apiLoading.classList.add("hidden");
    apiError.classList.add("hidden");
    apiSuccess.classList.add("hidden");

    if (state === "loading") {
        apiLoading.classList.remove("hidden");
        apiStatus.textContent = "Sedang mengambil data...";
    } else if (state === "success") {
        apiSuccess.classList.remove("hidden");
        apiStatus.textContent = "Data berhasil diambil dari API.";
    } else if (state === "error") {
        apiError.classList.remove("hidden");
        apiStatus.textContent = "Terjadi kesalahan.";
    }
}

// DOM manipulation: membuat card berdasarkan data JSON.
function displayApiData(posts) {
    apiList.innerHTML = "";

    posts.forEach((post, index) => {
        const card = document.createElement("article");
        card.className = "api-card";

        const number = document.createElement("span");
        number.className = "api-number";
        number.textContent = `POST ${index + 1}`;

        const title = document.createElement("h3");
        title.textContent = post.title;

        const description = document.createElement("p");
        description.textContent = post.body;

        card.append(number, title, description);
        apiList.appendChild(card);
    });
}

// Fetch API + parsing JSON + error handling.
async function getApiData() {
    showApiState("loading");
    apiLoadBtn.disabled = true;
    apiLoadBtn.textContent = "Loading...";

    try {
        const response = await fetch(API_URL);

        if (!response.ok) {
            throw new Error(`HTTP Error: ${response.status}`);
        }

        const data = await response.json();
        displayApiData(data);
        showApiState("success");
    } catch (error) {
        console.error("API Error:", error);
        apiErrorMessage.textContent =
            "Tidak dapat terhubung ke API. Periksa koneksi internet lalu coba lagi.";
        showApiState("error");
    } finally {
        apiLoadBtn.disabled = false;
        apiLoadBtn.textContent = "Ambil Data API";
    }
}

if (apiLoadBtn) {
    apiLoadBtn.addEventListener("click", getApiData);
}

if (apiRetryBtn) {
    apiRetryBtn.addEventListener("click", getApiData);
}

// Ambil data otomatis saat halaman dibuka.
getApiData();
