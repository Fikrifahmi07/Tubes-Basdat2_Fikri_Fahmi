<?php

namespace App\Controllers;

class Transkrip extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['mahasiswa'] = $this->db->table('mahasiswa')->get()->getResultArray();

        return view('transkrip/index', $data);
    }

    public function detail($nim)
    {
    // TRANSKRIP
    $query = $this->db->query(
        "CALL transkrip_mahasiswa(?)",//memanggil storage procedure transkrip_mahasiswa
        [$nim]
    );

    $data['transkrip'] = $query->getResultArray();

    $query->freeResult();
    while ($this->db->connID->more_results()) {
        $this->db->connID->next_result();
    }

    // STATUS KELULUSAN
    $query2 = $this->db->query(
        "CALL sp_status_lulus(?)",//memanggil storage procedure sp_status_lulus
        [$nim]
    );

    $status = $query2->getRowArray();

    $query2->freeResult();
    while ($this->db->connID->more_results()) {
        $this->db->connID->next_result();
    }

    $data['status_kelulusan'] =
        $status['status_kelulusan'] ?? 'Tidak Diketahui';

    return view('transkrip/detail', $data);
    }
}