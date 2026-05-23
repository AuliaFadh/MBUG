# 🎓 MBUG - Monitoring Beasiswa Universitas Gunadarma

MBUG adalah aplikasi web berbasis **CodeIgniter 4** yang digunakan untuk melakukan monitoring data beasiswa (seperti KIP-K, Beasiswa LIPI, dll.) di lingkungan Universitas Gunadarma. Aplikasi ini mencakup pencatatan prestasi, laporan keaktifan, laporan akademik (IPK), hingga integrasi Google Form.

---

## 🛠️ Stack Teknologi

Aplikasi ini berjalan menggunakan lingkungan ter-kontainerisasi (Docker) sehingga Anda tidak perlu menginstal PHP atau database MySQL secara lokal di mesin Anda.

*   **Framework:** PHP CodeIgniter 4.x
*   **Database:** MariaDB 10.4 (MySQL compatible)
*   **Server:** Apache (pada PHP 8.2)
*   **Runtime Environment:** Docker & Docker Compose

---

## 🚀 Cara Menjalankan Project

### 📋 Prasyarat
Pastikan Anda sudah menginstal **Docker Desktop** di komputer Anda:
*   [Unduh Docker Desktop](https://www.docker.com/products/docker-desktop/)

### ⚡ Langkah-Langkah Menjalankan
1.  **Clone / Buka Project** di editor pilihan Anda (misalnya VS Code).
2.  **Jalankan Docker Compose**:
    Buka terminal di root direktori proyek ini, lalu jalankan perintah:
    ```bash
    docker compose up -d
    ```
    *Perintah ini akan membangun image PHP, membuat kontainer web server & database, serta mengimpor skema database dari `mbug.sql` secara otomatis.*
3.  **Buka di Browser**:
    Akses aplikasi melalui URL:
    👉 **[http://localhost:8080](http://localhost:8080)**

---

## 🔑 Akun Uji Coba (Credentials)

Gunakan akun berikut yang sudah tersedia di database dummy untuk mencoba fungsionalitas sistem:

### 👤 Admin (Hak Akses: Admin/Staf)
*   **Username:** `10120700`
*   **Password:** `umul`

### 🎓 Mahasiswa (Hak Akses: Penerima Beasiswa)
| Username | Password | Keterangan |
| :--- | :--- | :--- |
| `10120698` | `owlowl` | Muhammad Aulia Nur Fadhillah |
| `10120699` | `12345678` | Isa Tarmana Mustopa |
| `10120701` | `10120701.beasiswa` | Naufal Nur |

---

## 📂 Struktur Konfigurasi Docker

*   **`Dockerfile`**: Mengonfigurasi Apache, menginstal PHP 8.2, dan mengaktifkan ekstensi wajib CodeIgniter 4 (`intl`, `mysqli`, `gd`, dan rewrite module). Dokumen root diarahkan langsung ke folder `public/`.
*   **`docker-compose.yml`**:
    *   **`web`**: Berjalan pada port `8080`. Perubahan kode di lokal akan langsung disinkronkan ke dalam kontainer (live reload/bind mount).
    *   **`db`**: Berjalan pada port `3306`. Menggunakan volume `db_data` agar data database tidak hilang saat kontainer dimatikan.
*   **`.env`**: Menyimpan konfigurasi lokal (lingkungan `development`, base URL `http://localhost:8080/`, serta kredensial database kontainer).

---

## 💻 Perintah Docker yang Sering Digunakan

| Perintah | Deskripsi |
| :--- | :--- |
| `docker compose up -d` | Menyalakan aplikasi di latar belakang (detached mode). |
| `docker compose down` | Mematikan dan menghapus kontainer aplikasi. |
| `docker compose down -v` | Mematikan aplikasi sekaligus menghapus volume database (jika ingin mereset DB). |
| `docker compose restart` | Memulai ulang seluruh kontainer. |
| `docker compose logs -f` | Menampilkan log server secara real-time untuk keperluan debugging. |
| `docker compose exec web bash` | Masuk ke terminal kontainer web server PHP. |

---

## 🎨 Desain Figma
Referensi desain UI/UX proyek ini dapat diakses pada tautan berikut:
🔗 [Figma Link - Monitoring Beasiswa UG](https://www.figma.com/file/gAPIg48PMj1PeKokLeupfA/MONITORING-BEASISWA-UG?type=design&node-id=0-1&mode=design)
