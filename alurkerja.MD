# 🔄 Workflow Sistem SkillHub

## 1. Workflow Utama

```text
                    ┌───────────────┐
                    │     MULAI     │
                    └───────┬───────┘
                            ↓
                    ┌───────────────┐
                    │   Register    │
                    │ / Login User  │
                    └───────┬───────┘
                            ↓
                    ┌───────────────┐
                    │    Beranda    │
                    └───────┬───────┘
                            ↓
                  ┌─────────┴─────────┐
                  ↓                   ↓
           ┌─────────────┐     ┌─────────────┐
           │ Cari Jasa   │     │ Buat Jasa   │
           │ / Explore   │     │   Sendiri   │
           └──────┬──────┘     └──────┬──────┘
                  ↓                   ↓
           ┌─────────────┐     ┌─────────────┐
           │Detail Jasa  │     │  Menunggu   │
           └──────┬──────┘     │    Order    │
                  ↓            └──────┬──────┘
           ┌─────────────┐            ↓
           │  Pesan Jasa │      ┌─────────────┐
           └──────┬──────┘      │Incoming     │
                  ↓             │Order        │
           ┌─────────────┐      └──────┬──────┘
           │Isi Detail   │             ↓
           │Requirements │      ┌─────────────┐
           └──────┬──────┘      │Accept /     │
                  ↓             │Reject       │
           ┌─────────────┐      └──────┬──────┘
           │    Order    │             ↓
           │   Pending   │      ┌─────────────┐
           └──────┬──────┘      │In Progress  │
                  ↓             └──────┬──────┘
                  │                     ↓
                  │              ┌─────────────┐
                  │              │Upload Hasil │
                  │              └──────┬──────┘
                  │                     ↓
                  │              ┌─────────────┐
                   └─────────────→│  Complete   │
                                 └──────┬──────┘
                                        ↓
                                 ┌─────────────┐
                                 │Lihat/Download│
                                 │    Hasil    │
                                 └─────────────┘
```

---

# 👤 2. Workflow Buyer

Buyer adalah user yang **memesan jasa**.

```text
LOGIN
  ↓
Explore Jasa
  ↓
Search / Filter
  ↓
Pilih Jasa
  ↓
Detail Jasa
  ↓
Pesan
  ↓
Isi Requirements
  ├── Kebutuhan pekerjaan
  ├── Deadline
  └── Catatan
  ↓
Order Pending
  ↓
Provider menerima?
  ├── TIDAK → Rejected
  │
  └── YA
       ↓
   Accepted
       ↓
   In Progress
       ↓
   Provider mengerjakan
       ↓
   Upload Hasil
       ↓
   Complete
       ↓
   Buyer melihat / download hasil
```

---

# 🧑‍💻 3. Workflow Provider

Provider adalah user yang **menyediakan jasa**.

```text
LOGIN
  ↓
My Services
  ↓
Buat Jasa
  ├── Judul
  ├── Deskripsi
  ├── Kategori
  ├── Harga
  ├── Estimasi
  └── Thumbnail
  ↓
Jasa Active
  ↓
Menunggu Order
  ↓
Incoming Order
  ↓
Lihat Detail Order
  ↓
┌────────────────────┐
│ Terima atau Tolak? │
└─────────┬──────────┘
          │
     ┌────┴────┐
     ↓         ↓
  Reject     Accept
     ↓         ↓
 Selesai   In Progress
               ↓
         Kerjakan Jasa
               ↓
         Upload Hasil
               ↓
            Complete
               ↓
             Selesai
```

---

# 🛠️ 4. Workflow Order

Ini workflow paling penting di SkillHub:

```text
                 CREATE ORDER
                      ↓
                   PENDING
                  /       \
                 /         \
            REJECT        ACCEPT
               ↓             ↓
           REJECTED      ACCEPTED
                             ↓
                        IN_PROGRESS
                         /        \
                        /          \
                   CANCEL       COMPLETE
                     ↓             ↓
                 CANCELLED     HASIL FILE
                                   ↓
                              Buyer Download
```

### Status Order

| Status        | Keterangan                  |
| ------------- | --------------------------- |
| `pending`     | Order baru dibuat           |
| `accepted`    | Order diterima provider     |
| `in_progress` | Pekerjaan sedang dikerjakan |
| `complete`    | Pekerjaan selesai           |
| `rejected`    | Order ditolak               |
| `cancelled`   | Order dibatalkan            |

---

# 👨‍💼 5. Workflow Admin

Admin memiliki workflow tersendiri:

```text
LOGIN ADMIN
    ↓
Admin Dashboard
    ↓
    ├───────────────┐
    ↓               ↓
Manage User    Manage Category
    ↓               ↓
View / Delete   CRUD Category
    │
    ├───────────────┐
    ↓               ↓
Manage Service  Manage Order
    ↓               ↓
View Service    View Order
    │               │
    └───────┬───────┘
            ↓
       Dashboard Stats
            ↓
          SELESAI
```

---

# 🔐 6. Workflow Authentication

```text
            REGISTER
               ↓
        Data User Disimpan
               ↓
             LOGIN
               ↓
       Validasi Username
       + Password
               ↓
        ┌──────┴──────┐
        ↓             ↓
      USER          ADMIN
        ↓             ↓
   Home User     Admin Dashboard
```

---

# 📁 7. Workflow Upload Hasil

Karena fitur ini baru kamu kerjakan, alurnya:

```text
Provider menerima order
          ↓
      ACCEPTED
          ↓
   Mulai pekerjaan
          ↓
    IN_PROGRESS
          ↓
  Provider selesai
          ↓
   Pilih file hasil
          ↓
      Upload File
          ↓
 File disimpan Storage
          ↓
 result_file tersimpan
          ↓
 Status → COMPLETE
          ↓
 Buyer membuka detail
          ↓
 Lihat / Download Hasil
```

---

# 🧩 8. Workflow Sistem Secara Keseluruhan

Kalau mau dimasukkan ke **laporan/PRD**, versi ringkasnya bisa pakai ini:

```text
                    ┌───────────┐
                    │   START   │
                    └─────┬─────┘
                          ↓
                    ┌───────────┐
                    │Register/  │
                    │   Login   │
                    └─────┬─────┘
                          ↓
                    ┌───────────┐
                    │Dashboard  │
                    └─────┬─────┘
                          ↓
              ┌───────────┴───────────┐
              ↓                       ↓
        ┌───────────┐           ┌───────────┐
        │   BUYER   │           │ PROVIDER  │
        └─────┬─────┘           └─────┬─────┘
              ↓                       ↓
         Explore Jasa             Buat Jasa
              ↓                       ↓
         Detail Jasa             Jasa Active
              ↓                       ↓
         Buat Order              Incoming Order
              ↓                       ↓
            Pending              Accept/Reject
              ↓                       ↓
        Menunggu Provider         In Progress
              │                       ↓
              │                  Upload Hasil
              │                       ↓
              └────────────────→ Complete
                                      ↓
                               Buyer menerima
                                   hasil
                                      ↓
                                  SELESAI
```

**Intinya:** SkillHub bekerja seperti marketplace jasa: **Provider menawarkan → Buyer memesan → Provider menerima → mengerjakan → upload hasil → order selesai.** Admin berada di atas sistem untuk mengelola data dan memantau aktivitas.