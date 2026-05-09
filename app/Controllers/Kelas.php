<?php

namespace App\Controllers;

class Kelas extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['kelas'] = $this->db->query("
            SELECT k.*, mk.nama_mk, d.nama_dosen
            FROM kelas k
            JOIN mata_kuliah mk ON k.kode_mk = mk.kode_mk
            JOIN dosen d ON k.nidn = d.nidn
            ORDER BY k.id_kelas
        ")->getResultArray();

        return view('kelas/index', $data);
    }

    public function tambah()
    {
        $data['matkul'] = $this->db->table('mata_kuliah')->get()->getResultArray();
        $data['dosen']  = $this->db->table('dosen')->get()->getResultArray();

        return view('kelas/tambah', $data);
    }

    public function simpan()
    {
        $this->db->table('kelas')->insert([
            'kode_mk' => $this->request->getPost('kode_mk'),
            'nidn' => $this->request->getPost('nidn'),
            'semester' => $this->request->getPost('semester'),
        ]);

        return redirect()->to(base_url('kelas'));
    }

    public function edit($id)
    {
        $data['kelas'] = $this->db->table('kelas')
            ->where('id_kelas', $id)
            ->get()
            ->getRowArray();

        $data['matkul'] = $this->db->table('mata_kuliah')->get()->getResultArray();
        $data['dosen']  = $this->db->table('dosen')->get()->getResultArray();

        return view('kelas/edit', $data);
    }

    public function update($id)
    {
        $this->db->table('kelas')
            ->where('id_kelas', $id)
            ->update([
                'kode_mk' => $this->request->getPost('kode_mk'),
                'nidn' => $this->request->getPost('nidn'),
                'semester' => $this->request->getPost('semester'),
            ]);

        return redirect()->to(base_url('kelas'));
    }

    public function hapus($id)
    {
        $this->db->table('kelas')
            ->where('id_kelas', $id)
            ->delete();

        return redirect()->to(base_url('kelas'));
    }
}