<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasBesarModel extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    // VIEW Transkrip
    public function getTranskrip(?string $nim = null): array
    {
        $sql = "SELECT * FROM v_transkrip_mahasiswa";

        if ($nim) {
            $sql .= " WHERE nim = ?";
            return $this->db->query($sql, [$nim])->getResultArray();
        }

        return $this->db->query($sql)->getResultArray();
    }

    // VIEW Rekap IPK
    public function getRekapIPK(): array
    {
    return $this->db->query(
        "SELECT * FROM v_rekap_ipk ORDER BY ipk DESC"
    )->getResultArray();
    }

    // STORED PROCEDURE Status Lulus
    public function getStatusLulus(string $nim): ?array
    {
        $this->db->query("CALL sp_status_lulus(?)", [$nim]);

        $result = $this->db->connID->store_result();
        $row = $result ? $result->fetch_assoc() : null;

        $this->db->connID->next_result();

        return $row;
    }

    // AGGREGATE FUNCTION
    public function getStatistikNilai(): array
    {
        return $this->db->query("
            SELECT 
                mk.nama_mk,
                COUNT(n.id_nilai) AS peserta,
                ROUND(AVG(n.nilai_akhir),2) AS rata_rata,
                MAX(n.nilai_akhir) AS tertinggi,
                MIN(n.nilai_akhir) AS terendah
            FROM nilai n
            JOIN kelas k ON n.id_kelas = k.id_kelas
            JOIN mata_kuliah mk ON k.kode_mk = mk.kode_mk
            GROUP BY mk.nama_mk
        ")->getResultArray();
    }

    // SUBQUERY
    public function getMahasiswaBelumNilai(): array
    {
        return $this->db->query("
            SELECT nama_mahasiswa, angkatan
            FROM mahasiswa
            WHERE nim NOT IN (
                SELECT nim FROM nilai
            )
        ")->getResultArray();
    }
}