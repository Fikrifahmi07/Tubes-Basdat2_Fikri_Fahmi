<?php

namespace App\Controllers;

class Dosen extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['dosen'] = $this->db->table('dosen')->get()->getResultArray();

        return view('dosen/index', $data);
    }

    public function tambah()
    {
        return view('dosen/tambah');
    }

    public function simpan()
    {
        $this->db->table('dosen')->insert([
            'nidn' => $this->request->getPost('nidn'),
            'nama_dosen' => $this->request->getPost('nama_dosen'),
        ]);

        return redirect()->to(base_url('dosen'));
    }

    public function edit($nidn)
    {
        $data['dosen'] = $this->db->table('dosen')
            ->where('nidn', $nidn)
            ->get()
            ->getRowArray();

        return view('dosen/edit', $data);
    }

    public function update($nidn)
    {
        $this->db->table('dosen')
            ->where('nidn', $nidn)
            ->update([
                'nama_dosen' => $this->request->getPost('nama_dosen'),
            ]);

        return redirect()->to(base_url('dosen'));
    }
    public function hapus($nidn)
    {
        $this->db->table('dosen')
            ->where('nidn', $nidn)
            ->delete();

        return redirect()->to(base_url('dosen'));
    }
}