<?php
// Panggil koneksi.php nya untuk mendapatkan data
include "koneksi_1.php";
// Ambil semua data di tabel mahasiswa berdasarkan NI
$sql = "select * from transaksi order by id_book";
// Buat query
$tampil = mysqli_query($con, $sql);
// Jika terdapat datanya maka tampilkan
if (mysqli_num_rows($tampil) > 0) {
    // Mulai dari satu (Untuk mengganti Array yng dimulai dari 0)
    $no = 1;
    // Buat response menjadi Array agar data di export menjadi array
    $response = array();
    // ambil data tersebut dan jadikan menjadi array
    $response["data"] = array();
    // Jika data terseut ada maka ubah menjadi fetch array
    while ($r = mysqli_fetch_array($tampil)) {
        // Tampilkan semua atribut yang dimasukkan
        $h['tgl_main'] = $r['tgl_main'];
        $h['jam_mulai'] = $r['jam_mulai'];
        $h['jam_berakhir'] = $r['jam_berakhir'];
        $h['jenis_bayar'] = $r['jenis_bayar'];
        $h['total_harga'] = $r['total_harga'];
        // Simpan data array tersebut kedalam "data" agar dipanggil di proses response
        array_push($response["data"], $h);
    }
    // tutup proses Json dengan sintaks PHP json_encode
    echo json_encode($response);
    // jika data tersebut kosong atau tidak ada datanya
} else {
    // tampilkan pesan TIdak ada data
    $response["message"] = "tidak ada data";
    // tutup proses Json dengan sintaks PHP json_encode
    echo json_encode($response);
}
