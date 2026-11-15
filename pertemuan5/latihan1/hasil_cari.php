<?php

$nama = $_GET['nama'] ?? '';
$nim = $_GET['nim'] ?? '';
$nilai = $_GET['nilai'] ?? '';
$predikat = $_GET['predikat'] ?? '';

if ($nama != '') {
    echo "Nama: " . $nama . "<br>";
    echo "NIM: " . $nim . "<br>";
    echo "Nilai: " . $nilai . "<br>";
    echo "Predikat: " . $predikat . "<br>";
} else {
    echo "Tidak ada data";
}

?>