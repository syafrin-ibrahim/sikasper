<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Lap_a extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('fpdf_lib');
        $this->load->model('admin/mod_aduan');
    }

    function aduan($id){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'JUDUL KECAMATAN',1,0);
        $pdf->Cell(85,6,'KECAMATAN',1,0);
        $pdf->Cell(27,6,'TANGGAL',1,0);
        $pdf->Cell(25,6,'STATUS',1,1);
        $pdf->SetFont('Arial','',10);
        $data['aduan'] = $this->mod_aduan->select_lap($id)->row_array();
    
            $pdf->Cell(20,6,$data['aduan']['judul'],1,0);
            $pdf->Cell(85,6,$data['aduan']['nama_kec'],1,0);
            $pdf->Cell(27,6,$data['aduan']['tgl_aduan'],1,0);
            $pdf->Cell(25,6,$data['aduan']['status'],1,1); 
      
        $pdf->Output();
    }

   
}


 ?>