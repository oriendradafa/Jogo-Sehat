// ================= JAVASCRIPT APOTEK SEHAT =================

// Menyimpan jumlah produk di keranjang
let jumlahKeranjang = 0;

function addCart() {
    jumlahKeranjang++;
    alert("Produk berhasil ditambahkan ke keranjang!");
}

function searchProduct() {
    const keyword = document.getElementById("search").value;
    if (keyword.trim() === "") {
        alert("Silakan masukkan nama obat atau produk.");
    } else {
        alert("Mencari produk: " + keyword);
    }
}

function login() {
    alert("Halaman login akan dibuat pada tahap berikutnya.");
}

// ================= WEEK 4: REST API, FETCH API, JSON, DOM =================
// JSONPlaceholder menyediakan data contoh untuk latihan API (bukan data medis).
const API_URL = "index.php?api=1";

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
    } else {
        apiError.classList.remove("hidden");
        apiStatus.textContent = "Terjadi kesalahan saat mengambil data.";
    }
}

// Membuat elemen HTML dari setiap object pada array JSON.
function displayApiData(posts) {
    apiList.replaceChildren();

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

async function getApiData() {
    showApiState("loading");
    apiLoadBtn.disabled = true;
    apiRetryBtn.disabled = true;
    apiLoadBtn.textContent = "Loading...";

    try {
        const response = await fetch(API_URL);

        // fetch tidak otomatis melempar error untuk status HTTP 4xx/5xx.
        if (!response.ok) {
            throw new Error(`HTTP Error: ${response.status}`);
        }

        const data = await response.json(); // Parsing JSON
        if (!Array.isArray(data)) {
            throw new Error("Format data API tidak sesuai.");
        }

        displayApiData(data); // DOM manipulation
        showApiState("success");
    } catch (error) {
        console.error("API Error:", error);
        apiErrorMessage.textContent =
            "Tidak dapat mengambil data dari API. Periksa koneksi internet, lalu coba lagi.";
        showApiState("error");
    } finally {
        apiLoadBtn.disabled = false;
        apiRetryBtn.disabled = false;
        apiLoadBtn.textContent = "Ambil Data API";
    }
}

apiLoadBtn?.addEventListener("click", getApiData);
apiRetryBtn?.addEventListener("click", getApiData);

// Ambil data saat halaman dibuka.
getApiData();
