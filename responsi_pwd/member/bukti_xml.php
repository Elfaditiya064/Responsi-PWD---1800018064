<?php
// Panggil koneksi.php nya untuk mendapatkan data
include "koneksi_1.php";
// Panggil tipe content yaitu XML ke dalam header
header('Content-Type: text/xml');
// Ambil semua data di tabel 
$query = "SELECT * FROM transaksi";
// Buat query
$hasil = mysqli_query($con, $query);
// Buat field baru yang diambil dari query
$jumField = mysqli_num_fields($hasil);
// Tampilakn XML Version
echo "<?xml version='1.0'?>";
// Tampilkan proses data yang akan ditampilkan
echo "<data>";
// Buat perulangan while menggunakan fetch array agar data dijadikan array
while ($data = mysqli_fetch_array($hasil)) {
    // Tampilkan data dibawah
    echo "<transaksi>";
    echo "<tgl_main>", $data['tgl_main'], "</tgl_main>";
    echo "<jam_mulai>", $data['jam_mulai'], "</jam_mulai>";
    echo "<jam_berakhir>", $data['jam_berakhir'], "</jam_berakhir>";
    echo "<jenis_bayar>", $data['jenis_bayar'], "</jenis_bayar>";
    echo "<total_harga>", $data['total_harga'], "</total_harga>";
    echo "</transaksi>";
}
// Tutup proses data yang sudah ditampilkan
echo "</data>";
