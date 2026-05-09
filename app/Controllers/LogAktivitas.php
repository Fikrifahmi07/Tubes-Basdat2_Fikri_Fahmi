<?php

namespace App\Controllers;

class LogAktivitas extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['log'] = $this->db->query("
    SELECT 
        l.id_log,
        m.nama_mahasiswa,
        mk.nama_mk,
        l.nilai_lama,
        l.nilai_baru,
        l.aksi,
        l.waktu
    FROM log_nilai l
    LEFT JOIN mahasiswa m ON l.nim = m.nim
    LEFT JOIN kelas k ON l.id_kelas = k.id_kelas
    LEFT JOIN mata_kuliah mk ON k.kode_mk = mk.kode_mk
    ORDER BY l.waktu DESC
    LIMIT 50
")->getResultArray();

        return view('log_aktivitas/index', $data);
    }
}