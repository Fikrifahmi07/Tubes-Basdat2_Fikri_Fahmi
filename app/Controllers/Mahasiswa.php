<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['mahasiswa'] = $this->db->table('mahasiswa')->get()->getResultArray();

        return view('mahasiswa/index', $data);
    }


    public function tambah()
    {
    return view('mahasiswa/tambah');
    }

    public function simpan()
    {
    $data = [
        'nim' => $this->request->getPost('nim'),
        'nama_mahasiswa' => $this->request->getPost('nama_mahasiswa'),
        'angkatan' => $this->request->getPost('angkatan'),
    ];

    $this->db->table('mahasiswa')->insert($data);

    return redirect()->to(base_url('mahasiswa'));
    }

    public function edit($nim)
    {
    $data['mahasiswa'] = $this->db->table('mahasiswa')
        ->where('nim', $nim)
        ->get()
        ->getRowArray();

    return view('mahasiswa/edit', $data);
    }

    public function update($nim)
    {
    $data = [
        'nama_mahasiswa' => $this->request->getPost('nama_mahasiswa'),
        'angkatan' => $this->request->getPost('angkatan'),
    ];

    $this->db->table('mahasiswa')
        ->where('nim', $nim)
        ->update($data);

    return redirect()->to(base_url('mahasiswa'));
    }

    public function hapus($nim)
    {
    $this->db->table('mahasiswa')
        ->where('nim', $nim)
        ->delete();

    return redirect()->to(base_url('mahasiswa'));
    }
}
