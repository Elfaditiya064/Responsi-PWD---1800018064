<?php

$kon = mysqli_connect('localhost', 'root', '', 'futsal');

if (!$kon) {
    die("Koneksi Gagal : " . mysqli_connect_error());
}
