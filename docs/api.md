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