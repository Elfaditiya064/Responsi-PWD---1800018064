<?php

require('fpdf/fpdf.php'); // memanggil library FPDF
$pdf = new FPDF('l', 'mm', 'A5'); // intance object dan memberikan pengaturan halaman PDF
$pdf->AddPage(); // membuat halaman baru
$pdf->SetFont('Arial', 'B', 16); // setting jenis font yang akan digunakan
// mencetak string
$pdf->Cell(190, 7, 'Bukti Pembayaran gofutsal', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'RIWAYAT PEMESANAN ANDA', 0, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(50, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(35, 6, 'Tanggal Main', 1, 0);
$pdf->Cell(25, 6, 'Mulai', 1, 0);
$pdf->Cell(25, 6, 'Selesai', 1, 0);
$pdf->Cell(30, 6, 'Jenis Bayar', 1, 0);
$pdf->Cell(30, 6, 'Total Bayar', 1, 0);
$pdf->Cell(45, 6, 'status', 1, 1);
$pdf->SetFont('Arial', '', 10);
include '../koneksi.php';
$transaksi = mysqli_query($koneksi, "select * from transaksi");
while ($row = mysqli_fetch_array($transaksi)) {
    $pdf->Cell(35, 6, $row['tgl_main'], 1, 0);
    $pdf->Cell(25, 6, $row['jam_mulai'], 1, 0);
    $pdf->Cell(25, 6, $row['jam_berakhir'], 1, 0);
    $pdf->Cell(30, 6, $row['jenis_bayar'], 1, 0);
    $pdf->Cell(30, 6, $row['total_harga'], 1, 0);
    $pdf->Cell(45, 6, $row['status'], 1, 1);
}
$pdf->Output();
