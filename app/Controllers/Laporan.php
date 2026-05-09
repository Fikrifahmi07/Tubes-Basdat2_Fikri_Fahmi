<?php

namespace App\Controllers;

class Laporan extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // =========================================
        // CARD STATISTIK
        // =========================================
        $data['total_mahasiswa'] = $this->db->query(
            "SELECT COUNT(*) AS total FROM mahasiswa"
        )->getRowArray()['total'];

        $data['total_nilai'] = $this->db->query(
            "SELECT COUNT(*) AS total FROM nilai"
        )->getRowArray()['total'];

        $data['rata_nilai'] = $this->db->query(
            "SELECT ROUND(AVG(nilai_akhir),2) AS rata FROM nilai"
        )->getRowArray()['rata'];

        // =========================================
        // DATA DOSEN + JUMLAH MATKUL
        // =========================================
        $data['dosen'] = $this->db->query(
            "SELECT * FROM v_dosen_jumlah_matkul" //memanggil view 
        )->getResultArray();

        // =========================================
        // MAHASISWA UNGGUL
        // =========================================
        $data['mahasiswa_unggul'] = $this->db->query(
            "SELECT *
             FROM mahasiswa
             WHERE nim IN (
                 SELECT nim
                 FROM nilai
                 GROUP BY nim
                 HAVING AVG(nilai_akhir) >
                 (SELECT AVG(nilai_akhir) FROM nilai)
             )"
        )->getResultArray();

        // =========================================
        // STATISTIK NILAI PER MATA KULIAH
        // =========================================
        $data['statistik_nilai'] = $this->db->query(
            "SELECT 
                mk.nama_mk,
                COUNT(n.id_nilai) AS peserta,
                ROUND(AVG(n.nilai_akhir),2) AS rata_rata,
                MAX(n.nilai_akhir) AS tertinggi,
                MIN(n.nilai_akhir) AS terendah
             FROM nilai n
             JOIN kelas k ON n.id_kelas = k.id_kelas
             JOIN mata_kuliah mk ON k.kode_mk = mk.kode_mk
             GROUP BY mk.nama_mk
             ORDER BY mk.nama_mk ASC"
        )->getResultArray();

        // =========================================
        // MAHASISWA BELUM MEMILIKI NILAI
        // =========================================
        $data['mahasiswa_belum_nilai'] = $this->db->query(
            "SELECT nim, nama_mahasiswa
             FROM mahasiswa
             WHERE nim NOT IN (
                 SELECT nim FROM nilai
             )"
        )->getResultArray();

        // =========================================
        // FORMAT UNTUK TABEL LAPORAN MODERN
        // =========================================
        $data['laporan'] = [];

        foreach ($data['statistik_nilai'] as $s) {

            $data['laporan'][] = [
                'nama_mk'          => $s['nama_mk'],
                'jumlah_mahasiswa' => $s['peserta'],
                'nilai_tertinggi'  => $s['tertinggi'],
                'nilai_terendah'   => $s['terendah'],
                'rata_rata'        => $s['rata_rata']
            ];
        }

        // =========================================
        // LOAD VIEW
        // =========================================
        return view('laporan/index', $data);
    }
}