<?php

namespace App\Controllers;

require_once ROOTPATH . 'public/assets/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

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

    public function exportPdf($nim)
    {
    // TRANSKRIP
    $query = $this->db->query(
        "CALL transkrip_mahasiswa(?)",
        [$nim]
    );

    $transkrip = $query->getResultArray();

    $query->freeResult();

    while ($this->db->connID->more_results()) {
        $this->db->connID->next_result();
    }

    // ambil data mahasiswa
    $mahasiswa = $this->db->table('mahasiswa')
        ->where('nim', $nim)
        ->get()
        ->getRowArray();

    // hitung IPK
    $totalSks = 0;
    $totalBobot = 0;

    foreach($transkrip as $t){
        
        $sks = $t['sks'];
        $nilai = $t['nilai_akhir'];

        if($nilai >= 85){
            $bobot = 4;
        }elseif($nilai >= 75){
            $bobot = 3;
        }elseif($nilai >= 65){
            $bobot = 2;
        }else{
            $bobot = 1;
        }

        $totalSks += $sks;
        $totalBobot += ($bobot * $sks);
    }

    $ipk = $totalSks > 0
        ? round($totalBobot / $totalSks, 2)
        : 0;

    // load view pdf
    $html = view('transkrip/pdf', [
        'mahasiswa' => $mahasiswa,
        'transkrip' => $transkrip,
        'ipk' => $ipk
    ]);

    $dompdf = new Dompdf();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream(
    'transkrip_' . $nim . '.pdf',
    array("Attachment" => false)
    );
    exit;
    }
}