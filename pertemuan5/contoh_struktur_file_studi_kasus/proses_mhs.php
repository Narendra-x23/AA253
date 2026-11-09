<?php

include "Mahasiswa.php";

$nama = $_POST['nama'] ?? '';
$nim = $_POST['nim'] ?? '';
$nilai = $_POST['nilai'] ?? '';
$prodi = $_POST['prodi'] ?? '';

$mhs = new Mahasiswa($nama, $nim);

if ($mhs->setNilai((float)$nilai)) {

    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {

        $namaFile = $_FILES['file']['name'];
        $tmpFile = $_FILES['file']['tmp_name'];

        move_uploaded_file(
            $tmpFile,
            "uploads/" . $namaFile
        );

        echo "Nama: " . htmlspecialchars($mhs->nama) . "<br>";
        echo "NIM: " . htmlspecialchars($mhs->nim) . "<br>";
        echo "Nilai: " . $mhs->getNilai() . "<br>";
        echo "Predikat: " . $mhs->getPredikat() . "<br>";
        echo "Prodi: " . htmlspecialchars($prodi) . "<br>";
        echo "File: " . htmlspecialchars($namaFile);

    } else {

        echo "File belum dipilih";

    }

} else {

    echo "Nilai " . htmlspecialchars($nilai) . " tidak valid!";

}

?>