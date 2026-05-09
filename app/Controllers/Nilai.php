<?php

namespace App\Controllers;

use App\Models\TugasBesarModel;

class Nilai extends BaseController
{
    protected $model;
    protected $db;

    public function __construct()
    {
        $this->model = new TugasBesarModel();
        $this->db    = \Config\Database::connect();
    }

    // =========================
    // TAMPIL DATA NILAI
    // =========================
    public function index()
    {
        $data['nilai'] = $this->db->query("
            SELECT 
                n.id_nilai,
                m.nama_mahasiswa,
                mk.nama_mk,
                n.nilai_akhir,
                fn_grade(n.nilai_akhir) AS grade
            FROM nilai n
            JOIN mahasiswa m ON n.nim = m.nim
            JOIN kelas k ON n.id_kelas = k.id_kelas
            JOIN mata_kuliah mk ON k.kode_mk = mk.kode_mk
            ORDER BY m.nama_mahasiswa
        ")->getResultArray();

        return view('nilai/index', $data);
    }

    // =========================
    // FORM TAMBAH
    // =========================
    public function tambah()
    {
        $data['mahasiswa'] = $this->db->query("
            SELECT nim, nama_mahasiswa 
            FROM mahasiswa 
            ORDER BY nama_mahasiswa
        ")->getResultArray();

        $data['kelas'] = $this->db->query("
            SELECT id_kelas 
            FROM kelas 
            ORDER BY id_kelas
        ")->getResultArray();

        return view('nilai/tambah', $data);
    }

    // =========================
    // SIMPAN NILAI
    // =========================
    public function simpan()
    {
        $nim   = $this->request->getPost('nim');
        $kelas = $this->request->getPost('id_kelas');
        $nilai = $this->request->getPost('nilai_akhir');

        // VALIDASI FORMAT
        if (!is_numeric($nilai)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Nilai harus berupa angka!');
        }

        $nilai = (float) $nilai;

        // VALIDASI RANGE
        if ($nilai < 0 || $nilai > 100) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Rollback: Nilai harus antara 0 - 100!');
        }

        $this->db->transBegin();

        try {

            // VALIDASI DUPLIKAT NILAI
            $cek = $this->db->query("
                SELECT id_nilai 
                FROM nilai
                WHERE nim = ? AND id_kelas = ?
            ", [$nim, $kelas])->getRowArray();

            if ($cek) {
                $this->db->transRollback();

                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Rollback: Mahasiswa sudah memiliki nilai pada kelas ini!');
            }

            // INSERT DATA
            $this->db->query("
                INSERT INTO nilai (nim, id_kelas, nilai_akhir)
                VALUES (?, ?, ?)
            ", [$nim, $kelas, $nilai]);

            if ($this->db->transStatus() === false) {
                throw new \Exception('Transaction gagal');
            }

            $this->db->transCommit();

            return redirect()->to('/nilai')
                ->with('success', 'Nilai berhasil disimpan!');

        } catch (\Throwable $e) {

            $this->db->transRollback();

            return redirect()->back()
                ->withInput()
                ->with('error', 'Rollback: Terjadi kesalahan sistem, data dibatalkan!');
        }
    }

    // =========================
    // FORM EDIT
    // =========================
    public function edit($id)
    {
        $data['nilai'] = $this->db->query("
            SELECT * 
            FROM nilai 
            WHERE id_nilai = ?
        ", [$id])->getRowArray();

        return view('nilai/edit', $data);
    }

    // =========================
    // UPDATE NILAI
    // =========================
    public function update()
    {
        $id        = $this->request->getPost('id_nilai');
        $nilaiBaru = (float) $this->request->getPost('nilai_akhir');

        $nilaiLamaData = $this->db->query("
            SELECT nilai_akhir 
            FROM nilai 
            WHERE id_nilai = ?
        ", [$id])->getRowArray();

        $nilaiLama = (float) $nilaiLamaData['nilai_akhir'];

        $this->db->transBegin();

        if ($nilaiBaru < 0 || $nilaiBaru > 100) {
            $this->db->transRollback();

            return redirect()->to('/nilai')
                ->with('error', 'Rollback: Nilai harus antara 0 - 100!');
        }

        if ($nilaiBaru < $nilaiLama) {
            $this->db->transRollback();

            return redirect()->to('/nilai')
                ->with('error', 'Rollback: Nilai baru tidak boleh lebih rendah dari nilai lama!');
        }

        $this->db->query("
            UPDATE nilai 
            SET nilai_akhir = ?
            WHERE id_nilai = ?
        ", [$nilaiBaru, $id]);

        $this->db->transCommit();

        return redirect()->to('/nilai')
            ->with('success', 'Nilai berhasil diupdate!');
    }

    // =========================
    // HAPUS NILAI
    // =========================
    public function hapus($id)
    {
        $this->db->query("
            DELETE FROM nilai 
            WHERE id_nilai = ?
        ", [$id]);

        return redirect()->to('/nilai')
            ->with('success', 'Data nilai berhasil dihapus!');
    }
}