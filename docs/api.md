# API Documentation

Dokumentasi endpoint dan proses sistem pada aplikasi Sistem Informasi Akademik UNIPI.

---

# Tambah Mahasiswa

## Endpoint
POST /mahasiswa/simpan

---

## Controller
Mahasiswa.php

---

## Method
simpan()

---

## Deskripsi
Digunakan untuk menambahkan data mahasiswa baru.

---

## Parameter

| Nama | Tipe |
|---|---|
| nim | string |
| nama_mahasiswa | string |
| angkatan | integer |

---

## Response Success

```json
{
  "status": "success",
  "message": "Data mahasiswa berhasil ditambahkan"
}

# Login Admin

## Endpoint
POST /cek-login

---

## Controller
Auth.php

---

## Method
cek_login()

---

## Deskripsi
Digunakan untuk proses login admin ke dalam sistem SIAKAD.

---

## Parameter

| Nama | Tipe |
|---|---|
| username | string |
| password | string |

---

## Response Success

```json
{
  "status": "success",
  "message": "Login berhasil"
}

# Schema Database

## Endpoint
GET /schema

---

## Controller
Schema.php

---

## Method
index()

---

## Deskripsi
Digunakan untuk menampilkan struktur database secara dinamis.

---

# SQL Query Runner

## Endpoint
POST /schema/runQuery

---

## Controller
Schema.php

---

## Method
runQuery()

---

## Deskripsi
Digunakan untuk menjalankan query SQL langsung dari halaman web seperti phpMyAdmin.

---

## Mendukung Query
- SELECT
- INSERT
- UPDATE
- DELETE
- CREATE TABLE
- ALTER TABLE
- DROP TABLE

---

# Log Aktivitas

## Endpoint
GET /log-aktivitas

---

## Controller
LogAktivitas.php

---

## Method
index()

---

## Deskripsi
Menampilkan seluruh log aktivitas sistem:
- Nilai
- Mahasiswa
- Dosen
- Mata Kuliah
- Kelas

---

# Realtime Search Log

## Fitur
Realtime filtering data log menggunakan JavaScript tanpa reload halaman.

---

# Database Trigger

## Digunakan Untuk
- Logging otomatis aktivitas database
- Monitoring perubahan data
- Audit aktivitas sistem

---

## Trigger
- trg_insert_mahasiswa
- trg_update_mahasiswa
- trg_delete_mahasiswa
- trg_insert_dosen
- trg_update_dosen
- trg_delete_dosen
- trg_insert_matakuliah
- trg_update_matakuliah
- trg_delete_matakuliah
- trg_insert_kelas
- trg_update_kelas
- trg_delete_kelas
- trg_insert_nilai
- trg_log_update
- trg_log_delete