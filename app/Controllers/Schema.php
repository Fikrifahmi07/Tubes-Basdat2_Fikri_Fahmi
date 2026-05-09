<?php

namespace App\Controllers;

class Schema extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $tabelUtama = [
            'mahasiswa',
            'dosen',
            'mata_kuliah',
            'kelas',
            'nilai',
            'log_nilai'
        ];

        $schema = [];

        foreach ($tabelUtama as $tabel) {
            $schema[$tabel] = $this->db->getFieldData($tabel);
        }

        return view('schema/index', [
            'schema' => $schema
        ]);
    }
}