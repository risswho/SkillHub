# PRD — SkillHub

**Product Requirements Document**

**Nama Produk:** SkillHub
**Jenis:** Web Marketplace Jasa
**Platform:** Website
**Framework:** Laravel
**Frontend:** Blade + HTML/CSS
**Backend:** Laravel/PHP
**Database:** MySQL
**Authentication:** Laravel Sanctum

---

## 1. Overview

### 1.1 Latar Belakang

SkillHub adalah platform berbasis web yang memungkinkan pengguna menawarkan dan memesan berbagai jasa secara online.

Pengguna dapat membuat jasa, melihat jasa yang tersedia, melakukan pemesanan, serta mengelola pesanan. Sementara itu, admin bertugas mengelola pengguna, jasa, kategori, dan order yang terdapat di dalam sistem.

SkillHub dibuat untuk menyediakan sistem marketplace jasa yang sederhana, terstruktur, dan mudah digunakan.

---

# 2. Tujuan Produk

SkillHub memiliki beberapa tujuan utama:

1. Memudahkan pengguna menawarkan jasa secara online.
2. Memudahkan pengguna mencari dan memesan jasa.
3. Menyediakan sistem pengelolaan order dari awal hingga selesai.
4. Menyediakan sistem autentikasi dan hak akses pengguna.
5. Memudahkan admin mengelola data dalam sistem.
6. Menyediakan tempat bagi penyedia jasa untuk mengirimkan hasil pekerjaan kepada pembeli.

---

# 3. Target User

## 3.1 User

User merupakan pengguna utama SkillHub yang dapat berperan sebagai:

* Pembeli jasa.
* Penyedia jasa.
* Pengguna yang mengelola profil sendiri.

Satu akun dapat menggunakan fitur sebagai pembeli maupun penyedia jasa.

## 3.2 Admin

Admin bertanggung jawab terhadap pengelolaan sistem, seperti:

* Mengelola user.
* Mengelola kategori.
* Mengelola jasa.
* Mengelola order.
* Melihat statistik sistem.

---

# 4. Role & Permission

| Fitur                    | User | Admin |
| ------------------------ | :--: | :---: |
| Register                 |   ✅  |   -  |
| Login                    |   ✅  |  ✅  |
| Logout                   |   ✅  |   ✅   |
| Melihat profil           |   ✅  |   ✅   |
| Edit profil              |   ✅  |   -   |
| Membuat jasa             |   ✅  |   -   |
| Edit jasa sendiri        |   ✅  |   -   |
| Hapus jasa sendiri       |   ✅  |   -   |
| Melihat jasa             |   ✅  |  ✅   |
| Membuat order            |   ✅  |   -   |
| Melihat order sendiri    |   ✅  |   -   |
| Mengelola incoming order |   ✅  |   -   |
| CRUD kategori            |   ❌  |   ✅   |
| Kelola user              |   ❌  |   ✅   |
| Kelola jasa              |   ❌  |   ✅   |
| Kelola order             |   ❌  |   ✅   |
| Dashboard statistik      |   ❌  |   ✅   |

---

# 5. Fitur Utama

## 5.1 Authentication

### Register

User dapat membuat akun baru dengan memasukkan data yang diperlukan.

**Requirement:**

* Username wajib diisi.
* Password wajib diisi.
* Data user disimpan ke database.
* Password disimpan dalam bentuk hash.

### Login

User dapat masuk menggunakan:

* Username
* Password

Sistem melakukan validasi kredensial sebelum membuat session/token.

### Logout

User dapat keluar dari akun.

---

# 6. Profile

User dapat mengelola informasi profilnya.

### Data Profil

* Username
* Avatar
* Bio
* Skill
* Sekolah/Kelas

### Requirement

User hanya dapat mengubah profil miliknya sendiri.

---

# 7. Category Management

Kategori digunakan untuk mengelompokkan jasa.

### Admin dapat:

* Melihat kategori.
* Menambahkan kategori.
* Mengedit kategori.
* Menghapus kategori.

### Access

Fitur ini hanya dapat digunakan oleh **Admin**.

---

# 8. Service / Jasa

Fitur jasa merupakan fitur utama SkillHub.

User dapat menawarkan jasa yang dimilikinya.

### Data Jasa

* Judul jasa
* Deskripsi
* Kategori
* Harga
* Estimasi pengerjaan
* Thumbnail
* Status

### Status Jasa

* `active`
* `inactive`

### User dapat:

* Membuat jasa.
* Melihat jasa.
* Mengedit jasa sendiri.
* Menghapus jasa sendiri.
* Mengubah status jasa.
* Mengunggah thumbnail.

---

# 9. Explore Jasa

Halaman Explore digunakan untuk mencari dan menemukan jasa yang tersedia.

### Fitur

* Menampilkan daftar jasa.
* Search jasa.
* Filter berdasarkan kategori.
* Filter harga minimum.
* Filter harga maksimum.
* Sorting.
* Pagination.

### Sorting

User dapat mengurutkan jasa berdasarkan:

* Terbaru.
* Harga terendah.
* Harga tertinggi.

---

# 10. Service Detail

User dapat melihat informasi lengkap sebuah jasa.

Informasi yang ditampilkan:

* Thumbnail.
* Judul.
* Deskripsi.
* Kategori.
* Harga.
* Estimasi pengerjaan.
* Penyedia jasa.
* Status jasa.

Dari halaman detail, user dapat melanjutkan ke proses pemesanan.

---

# 11. My Services

Penyedia jasa memiliki halaman untuk melihat jasa yang telah dibuat.

### Fitur

* Melihat jasa milik sendiri.
* Edit jasa.
* Hapus jasa.
* Mengatur status jasa.

---

# 12. Order / Pemesanan

User dapat memesan jasa yang tersedia.

### Data Order

Order menyimpan informasi seperti:

* Buyer.
* Service.
* Requirements.
* Deadline.
* Notes.
* Status.
* File hasil pekerjaan.

### Status Order

Alur order:

```text
PENDING
   ↓
ACCEPTED
   ↓
IN_PROGRESS
   ↓
COMPLETE
```

Jika terjadi penolakan:

```text
PENDING → REJECTED
```

Jika order dibatalkan:

```text
PENDING / ACCEPTED / IN_PROGRESS
              ↓
          CANCELLED
```

---

# 13. Incoming Order

Penyedia jasa dapat melihat order yang masuk dari pembeli.

### Fitur

Provider dapat:

* Melihat order masuk.
* Melihat detail order.
* Menerima order.
* Menolak order.
* Memulai pengerjaan.
* Membatalkan order.
* Menyelesaikan order.

---

# 14. Order Detail

Detail order menampilkan informasi lengkap mengenai transaksi.

### Informasi

* Jasa yang dipesan.
* Kategori.
* Pembeli.
* Harga.
* Deadline.
* Requirements.
* Catatan.
* Status order.

---

# 15. Upload Hasil Jasa

Ketika pekerjaan selesai, provider dapat mengunggah file hasil pekerjaan.

### Requirement

Provider dapat mengupload file ketika order berada pada status:

```text
in_progress
```

Setelah file berhasil diupload:

```text
in_progress → complete
```

File disimpan pada storage aplikasi.

### Contoh file yang dapat digunakan

* PDF
* ZIP
* RAR
* JPG
* PNG
* DOC/DOCX

---

# 16. Order History

User dapat melihat riwayat order yang pernah dilakukan.

Riwayat mencakup order berdasarkan status seperti:

* Complete
* Rejected
* Cancelled

---

# 17. Admin Dashboard

Admin memiliki dashboard untuk melihat kondisi sistem secara keseluruhan.

### Statistik yang tersedia

* Total User.
* Total Services.
* Total Orders.
* Total Categories.
* Pending Orders.
* Complete Orders.
* Rejected Orders.
* Inactive Services.

Contoh struktur dashboard:

```text
┌──────────────┐ ┌──────────────┐
│ Total User   │ │ Total Jasa   │
│     100      │ │      50      │
└──────────────┘ └──────────────┘

┌──────────────┐ ┌──────────────┐
│ Total Order  │ │Total Kategori│
│      75      │ │      10      │
└──────────────┘ └──────────────┘
```

---

# 18. Admin User Management

Admin dapat mengelola user yang terdaftar.

### Fitur

* Melihat daftar user.
* Melihat informasi user.
* Menghapus user.

### Security

Admin tidak dapat menghapus akun admin yang sedang digunakan untuk login.

---

# 19. Admin Service Management

Admin dapat melihat dan mengelola data jasa yang terdapat dalam sistem.

### Fitur

* Melihat daftar jasa.
* Melihat detail jasa.
* Mengelola jasa.

---

# 20. Admin Order Management

Admin dapat melihat data order yang terdapat di dalam sistem.

### Informasi yang dapat dipantau

* Buyer.
* Service.
* Provider.
* Harga.
* Deadline.
* Status order.

---

# 21. Security & Access Control

SkillHub menggunakan sistem role untuk membatasi akses fitur.

Role utama:

```text
user
admin
```

Middleware digunakan untuk memastikan user hanya dapat mengakses fitur sesuai role.

Contoh:

```text
/admin/dashboard
        ↓
Role Middleware
        ↓
      ADMIN?
     ↙      ↘
   YES       NO
   ↓         ↓
Dashboard   403
```

Authentication menggunakan Laravel Sanctum untuk kebutuhan autentikasi API.

---

# 22. Teknologi

| Teknologi       | Penggunaan            |
| --------------- | --------------------- |
| Laravel         | Backend framework     |
| PHP             | Bahasa pemrograman    |
| MySQL/MariaDB   | Database              |
| Blade           | Template frontend     |
| HTML            | Struktur halaman      |
| CSS             | Styling               |
| JavaScript      | Interaksi frontend    |
| Laravel Sanctum | API authentication    |
| XAMPP           | Local development     |
| Composer        | Dependency management |
| NPM             | Frontend dependency   |

---

# 23. Database Utama

Beberapa entitas utama yang digunakan:

```text
users
categories
services
orders
```

Relasi sederhananya:

```text
USER
 │
 ├── membuat ──> SERVICE
 │                 │
 │                 └── memiliki CATEGORY
 │
 └── membuat ──> ORDER
                    │
                    └── memesan SERVICE
```

---

# 24. User Flow

### Sebagai Pembeli

```text
Register
   ↓
Login
   ↓
Explore Jasa
   ↓
Pilih Jasa
   ↓
Lihat Detail
   ↓
Pesan Jasa
   ↓
Isi Requirements
   ↓
Menunggu Provider
   ↓
Order Diterima
   ↓
Pengerjaan
   ↓
Order Selesai
   ↓
Download/Lihat Hasil
```

### Sebagai Provider

```text
Login
   ↓
Buat Jasa
   ↓
Jasa Ditampilkan
   ↓
Mendapat Order
   ↓
Terima Order
   ↓
Mulai Pengerjaan
   ↓
Upload Hasil
   ↓
Order Complete
```

### Sebagai Admin

```text
Login
   ↓
Admin Dashboard
   ↓
┌───────────────┐
│               │
├─ Manage User  │
├─ Manage Jasa  │
├─ Manage Order │
└─ Manage Kategori
```

---

# 25. Status Implementasi Saat Ini

Berdasarkan fitur yang sudah kamu kerjakan:

| Fitur                     | Status |
| ------------------------- | :----: |
| Register                  |    ✅   |
| Login                     |    ✅   |
| Logout                    |    ✅   |
| Sanctum                   |    ✅   |
| Role User/Admin           |    ✅   |
| Middleware Role           |    ✅   |
| Profile                   |    ✅   |
| Avatar                    |    ✅   |
| Bio & Skill               |    ✅   |
| School/Class              |    ✅   |
| CRUD Category             |    ✅   |
| Create Jasa               |    ✅   |
| Edit Jasa                 |    ✅   |
| Delete Jasa               |    ✅   |
| Service Detail            |    ✅   |
| Thumbnail                 |    ✅   |
| Search Jasa               |    ✅   |
| Filter Category           |    ✅   |
| Filter Harga              |    ✅   |
| Sort Jasa                 |    ✅   |
| Pagination                |    ✅   |
| Create Order              |    ✅   |
| Order Detail              |    ✅   |
| Incoming Order            |    ✅   |
| Accept Order              |    ✅   |
| Reject Order              |    ✅   |
| Start Work                |    ✅   |
| Cancel Order              |    ✅   |
| Complete Order            |    ✅   |
| Order History             |    ✅   |
| Upload Hasil Jasa         |    ✅   |
| Admin Dashboard           |    ✅   |
| Admin User Management     |    ✅   |
| Admin Service Management  |    ✅   |
| Admin Order Management    |    ✅   |
| Admin Category Management |    ✅   |

### Fitur yang belum termasuk implementasi yang sudah kamu konfirmasi

| Fitur                  | Status |
| ---------------------- | :----: |
| Review & Rating        |    ❌   |
| Favorite               |    ❌   |
| Portfolio              |    ❌   |
| Report                 |    ❌   |
| Upload file dari Buyer |    ❌   |
| Notification           |    ❌   |

---

# 26. MVP Scope

Untuk versi MVP, SkillHub sudah mencakup inti marketplace:

> **Authentication → Profile → Jasa → Explore → Order → Pengerjaan → Upload Hasil → Admin Management**

Jadi sebenarnya **core system-nya sudah cukup lengkap**. Fitur seperti Review, Favorite, Portfolio, Report, dan Notification bisa dianggap sebagai **pengembangan tahap berikutnya**, bukan bagian wajib dari core yang sudah kamu bangun.