<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\DosenModel;
use App\Models\MatkulModel;

class Dashboard extends BaseController
{
    protected $db;
    public function __construct()
    {
    $this->db = \Config\Database::connect();

    if (!session()->get('login')) {

        header('Location: ' . base_url('/login'));
        exit;
    }
    }

    public function index()
    {
        $mhsModel = new MahasiswaModel();
        $dsnModel = new DosenModel();
        $mkModel  = new MatkulModel();

        $avgNilai = $this->db->query(
            "SELECT AVG(nilai_akhir) as avg_nilai FROM nilai"
        )->getRowArray();

        $rekapIpk = $this->db->query(
            "SELECT * FROM v_rekap_ipk"
        )->getResultArray();

        $data = [
            'mhs'       => $mhsModel->countAll(),
            'dsn'       => $dsnModel->countAll(),
            'mk'        => $mkModel->countAll(),
            'avg_nilai' => round($avgNilai['avg_nilai'] ?? 0, 2),
            'rekap_ipk' => $rekapIpk
        ];

        return view('dashboard/index', $data);
        
    }
}