<?php

namespace App\Controllers;

class MataKuliah extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['matkul'] = $this->db->table('mata_kuliah')->get()->getResultArray();

        return view('matakuliah/index', $data);
    }

    public function tambah()
    {
        return view('matakuliah/tambah');
    }

    public function simpan()
    {
        $this->db->table('mata_kuliah')->insert([
            'kode_mk' => $this->request->getPost('kode_mk'),
            'nama_mk' => $this->request->getPost('nama_mk'),
            'sks' => $this->request->getPost('sks'),
        ]);

        return redirect()->to(base_url('matakuliah'));
    }

    public function edit($kode_mk)
    {
        $data['matkul'] = $this->db->table('mata_kuliah')
            ->where('kode_mk', $kode_mk)
            ->get()
            ->getRowArray();

        return view('matakuliah/edit', $data);
    }

    public function update($kode_mk)
    {
        $this->db->table('mata_kuliah')
            ->where('kode_mk', $kode_mk)
            ->update([
                'nama_mk' => $this->request->getPost('nama_mk'),
                'sks' => $this->request->getPost('sks'),
            ]);

        return redirect()->to(base_url('matakuliah'));
    }

    public function hapus($kode_mk)
    {
        $this->db->table('mata_kuliah')
            ->where('kode_mk', $kode_mk)
            ->delete();

        return redirect()->to(base_url('matakuliah'));
    }
}