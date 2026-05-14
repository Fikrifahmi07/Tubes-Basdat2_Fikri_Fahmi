# Sistem Informasi Akademik UNIPI

## Deskripsi Project

Project ini merupakan aplikasi Sistem Informasi Akademik berbasis web menggunakan CodeIgniter 4 dan MySQL.

Sistem dibuat untuk membantu pengelolaan data akademik kampus seperti:
- Mahasiswa
- Dosen
- Mata Kuliah
- Kelas
- Nilai
- Transkrip
- Laporan Akademik
- Log Aktivitas

---

## Fitur Sistem

### Dashboard
- Menampilkan statistik sistem
- Menampilkan menu utama sistem
- Tampilan dashboard modern responsive

### Mahasiswa
- CRUD Mahasiswa
- Pencarian mahasiswa
- Validasi data mahasiswa

### Dosen
- CRUD Dosen
- Pencarian dosen

### Mata Kuliah
- CRUD Mata Kuliah
- Pencarian mata kuliah

### Kelas
- CRUD Kelas
- Pencarian kelas

### Nilai
- CRUD Nilai mahasiswa
- Relasi mahasiswa dengan kelas

### Transkrip
- Menampilkan transkrip nilai mahasiswa
- Menampilkan status kelulusan mahasiswa

### Laporan
- Statistik nilai mata kuliah
- Data mahasiswa unggul
- Data mahasiswa belum memiliki nilai
- Jumlah mata kuliah dosen
- Pencarian pada setiap tabel laporan

### Log Aktivitas
- Menampilkan aktivitas INSERT
- Menampilkan aktivitas UPDATE
- Menampilkan aktivitas DELETE

### Login & logout Admin


### Schema Database Dinamis

### SQL Query Runner

---

## Teknologi yang Digunakan

- PHP 8
- MySQL
- CodeIgniter 4
- Bootstrap
- AdminLTE
- HTML
- CSS
- JavaScript

---

## Konsep Database yang Digunakan

### Aggregate Function
Digunakan untuk:
- AVG()
- COUNT()
- MAX()
- MIN()

Pada fitur:
- Dashboard
- Laporan akademik

### View Database
Menggunakan:
- v_dosen_jumlah_matkul

Pada fitur:
- Laporan jumlah mata kuliah dosen

### Stored Procedure
Menggunakan:
- transkrip_mahasiswa()
- sp_status_lulus()

Pada fitur:
- Transkrip mahasiswa

### Trigger
Digunakan untuk:
- Log aktivitas perubahan nilai

---

## Struktur Folder Project

```plaintext
aapp/
├── Controllers/
├── Models/
├── Views/
├── Config/
├── Database/

docs/
├── api.md
└── changelog.md

public/
system/
tests/
vendor/
writable/

Documentation.md
README.md
composer.json
spark
.env

## Cara Menjalankan Project

### Install Dependency

```bash
composer install
```

### Copy Environment

```bash
cp env .env
```

### Jalankan Server

```bash
php spark serve
```

---

## Kontributor
- Fikri Fahmi
