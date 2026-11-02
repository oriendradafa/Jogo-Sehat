// JavaScript pada sisi View: interaksi REST API menggunakan Fetch API.
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
    [apiLoading, apiError, apiSuccess].forEach(element => element?.classList.add("hidden"));
    if (state === "loading") { apiLoading?.classList.remove("hidden"); apiStatus.textContent = "Sedang mengambil data..."; }
    if (state === "success") { apiSuccess?.classList.remove("hidden"); apiStatus.textContent = "Data berhasil diambil dari API."; }
    if (state === "error") { apiError?.classList.remove("hidden"); apiStatus.textContent = "Terjadi kesalahan."; }
}
function displayApiData(posts) {
    apiList.innerHTML = "";
    posts.forEach((post, index) => {
        const card = document.createElement("article"); card.className = "api-card";
        const number = document.createElement("span"); number.className = "api-number"; number.textContent = `POST ${index + 1}`;
        const title = document.createElement("h3"); title.textContent = post.title;
        const description = document.createElement("p"); description.textContent = post.body;
        card.append(number, title, description); apiList.appendChild(card);
    });
}
async function getApiData() {
    showApiState("loading"); if (apiLoadBtn) { apiLoadBtn.disabled = true; apiLoadBtn.textContent = "Loading..."; }
    try {
        const response = await fetch(API_URL);
        if (!response.ok) throw new Error(`HTTP Error: ${response.status}`);
        displayApiData(await response.json()); showApiState("success");
    } catch (error) {
        console.error("API Error:", error);
        apiErrorMessage.textContent = "Tidak dapat terhubung ke API. Periksa koneksi internet lalu coba lagi.";
        showApiState("error");
    } finally { if (apiLoadBtn) { apiLoadBtn.disabled = false; apiLoadBtn.textContent = "Ambil Data API"; } }
}
apiLoadBtn?.addEventListener("click", getApiData);
apiRetryBtn?.addEventListener("click", getApiData);
getApiData();
