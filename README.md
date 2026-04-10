# Aplikasi CRUD Manajemen Data Guru

Aplikasi web sederhana untuk mengelola data guru menggunakan Laravel 10 dan MySQL.

## 📋 Persyaratan

Sebelum memulai, pastikan Anda telah menginstal:

- **PHP 8.1+** — [Download PHP](https://www.php.net/downloads)
- **Composer** — [Download Composer](https://getcomposer.org)
- **MySQL 8.0+** — Dapat menggunakan Laragon, XAMPP, atau MySQL standalone
- **Git** — [Download Git](https://git-scm.com)

## 🚀 Instalasi

### 1. Clone Repository

Buka terminal/command prompt dan jalankan:

```bash
git clone https://github.com/7zenArd/crud-guru.git
cd crud-guru
```

### 2. Instal Dependencies

```bash
composer install
```

Tunggu hingga semua package terunduh selesai.

### 3. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Atau jika menggunakan Windows Command Prompt:

```bash
copy .env.example .env
```

### 4. Generate APP Key

```bash
php artisan key:generate
```

### 5. Konfigurasi Database

Edit file `.env` dan sesuaikan konfigurasi database sesuai dengan setup database lokal Anda:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_sekolah_azka
DB_USERNAME=root
DB_PASSWORD=
```

**Penjelasan:**
- `DB_HOST`: Alamat server MySQL (biasanya `127.0.0.1` untuk lokal)
- `DB_PORT`: Port MySQL (standar: `3306`)
- `DB_DATABASE`: Nama database yang akan dibuat
- `DB_USERNAME`: Username MySQL (default Laragon: `root`)
- `DB_PASSWORD`: Password MySQL (default Laragon: kosong)

### 6. Buat Database

Buka MySQL client atau phpMyAdmin, lalu buat database:

```sql
CREATE DATABASE IF NOT EXISTS db_sekolah_azka;
```

Atau gunakan artisan command:

```bash
php artisan db:create
```

### 7. Jalankan Migrasi

```bash
php artisan migrate
```

Perintah ini akan membuat tabel `gurus` di database.

## 📱 Cara Menggunakan

### Jalankan Server

```bash
php artisan serve
```

Server akan berjalan di: **http://127.0.0.1:8000**

### Buka Aplikasi

1. Buka browser Anda
2. Kunjungi: `http://127.0.0.1:8000`
3. Anda akan diarahkan ke halaman utama CRUD Guru

### Fitur Aplikasi

#### 1. **Tambah Data Guru** (CREATE)
- Isi form di bagian atas halaman dengan data guru
- Klik tombol **Simpan**
- Data guru akan ditambahkan dan muncul di tabel

#### 2. **Lihat Data Guru** (READ)
- Semua data guru ditampilkan dalam tabel
- Setiap baris menampilkan: NIP, Nama, Tanggal Lahir, Jabatan, Mata Pelajaran, Sosial Media

#### 3. **Edit Data Guru** (UPDATE)
- Klik tombol **Edit** pada baris guru yang ingin diubah
- Form akan terpopulasi dengan data guru tersebut
- NIP menjadi readonly (tidak bisa diubah)
- Ubah data sesuai kebutuhan
- Klik tombol **Update** untuk menyimpan perubahan
- Klik tombol **Batal** jika ingin membatalkan edit

#### 4. **Hapus Data Guru** (DELETE)
- Klik tombol **Hapus** pada baris guru yang ingin dihapus
- Jendela konfirmasi akan muncul
- Klik **OK** untuk menghapus atau **Batal** untuk membatalkan
- Data guru akan dihapus dari sistem

## 📁 Struktur Project

```
crud-guru/
├── app/
│   ├── Models/
│   │   └── Guru.php                 # Model Guru
│   └── Http/
│       └── Controllers/
│           └── GuruController.php   # Controller CRUD
├── database/
│   └── migrations/
│       └── *_create_gurus_table.php # Migration untuk tabel gurus
├── resources/
│   └── views/
│       └── guru/
│           └── index.blade.php      # View halaman utama
├── routes/
│   └── web.php                      # Definisi routes
├── .env                             # Konfigurasi environment
├── composer.json                    # Dependencies
└── README.md                        # File ini
```

## 🗄️ Spesifikasi Database

Tabel `gurus` memiliki field sebagai berikut:

| Field | Tipe Data | Keterangan |
|-------|-----------|-----------|
| nip | varchar(20) | Primary Key, nomor induk pegawai |
| nama_guru | varchar(50) | Nama lengkap guru |
| tgl_lahir | date | Tanggal lahir guru |
| jabatan | varchar(50) | Jabatan (contoh: Guru Mapel, Wakasek) |
| mata_pelajaran | varchar(50) | Mata pelajaran (contoh: MTK, B.ING) |
| sosmed | varchar(50) | Username akun sosial media |
| created_at | timestamp | Waktu data dibuat |
| updated_at | timestamp | Waktu data terakhir diubah |

## ⚙️ Teknologi yang Digunakan

- **Laravel 10** — PHP framework
- **MySQL 8.0** — Database
- **Bootstrap 5** — UI Framework
- **Blade** — Template engine

## 🛠️ Troubleshooting

### Error: "SQLSTATE[HY000] [2002] Connection refused"

**Solusi:**
- Pastikan MySQL sudah berjalan
- Cek konfigurasi `.env` sudah benar (host, port, username, password)
- Pastikan database sudah dibuat

### Error: "Class 'App\Models\Guru' not found"

**Solusi:**
- Jalankan `composer dump-autoload`
- Pastikan file `app/Models/Guru.php` ada

### Error: "Table 'db_sekolah_azka.gurus' doesn't exist"

**Solusi:**
- Jalankan migrasi: `php artisan migrate`

### Page tidak bisa dibuka di browser

**Solusi:**
- Pastikan server sedang berjalan (`php artisan serve`)
- Cek apakah URL benar: `http://127.0.0.1:8000`
- Jika port 8000 sudah terpakai, gunakan port lain: `php artisan serve --port=8001`

## 📝 Lisensi

Project ini bebas digunakan untuk keperluan pendidikan dan komersial.

## 👨‍💻 Author 7zenArd

Dibuat untuk Ujian Remedial Kompetensi Keahlian (UKK) RPL 2026

---

**Pertanyaan?** Buat issue di GitHub atau hubungi developer.
EOF
