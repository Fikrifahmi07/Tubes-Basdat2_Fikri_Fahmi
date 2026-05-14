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
        $db = \Config\Database::connect();

        $data = [

            'log_nilai' => $db->table('log_nilai')
                ->select('
                    log_nilai.*,
                    mahasiswa.nama_mahasiswa,
                    mata_kuliah.nama_mk
                ')
                ->join('mahasiswa', 'mahasiswa.nim = log_nilai.nim')
                ->join('kelas', 'kelas.id_kelas = log_nilai.id_kelas')
                ->join('mata_kuliah', 'mata_kuliah.kode_mk = kelas.kode_mk')
                ->orderBy('log_nilai.waktu', 'DESC')
                ->get()
                ->getResultArray(),

            'log_mahasiswa' => $db->table('log_mahasiswa')
                ->orderBy('created_at', 'DESC')
                ->get()
                ->getResultArray(),

            'log_dosen' => $db->table('log_dosen')
                ->orderBy('created_at', 'DESC')
                ->get()
                ->getResultArray(),

            'log_matakuliah' => $db->table('log_matakuliah')
                ->orderBy('created_at', 'DESC')
                ->get()
                ->getResultArray(),

            'log_kelas' => $db->table('log_kelas')
                ->orderBy('created_at', 'DESC')
                ->get()
                ->getResultArray(),
        ];

        return view('log_aktivitas/index', $data);
    }
}