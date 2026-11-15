<?php

include "Mahasiswa.php";

$predikat = $_GET['predikat'];

$mahasiswa1 = new Mahasiswa();
$mahasiswa1->nama = "Andi";
$mahasiswa1->nim = "22030101";
$mahasiswa1->setNilai(88);

$mahasiswa2 = new Mahasiswa();
$mahasiswa2->nama = "Budi";
$mahasiswa2->nim = "22030102";
$mahasiswa2->setNilai(75);

$mahasiswa3 = new Mahasiswa();
$mahasiswa3->nama = "Citra";
$mahasiswa3->nim = "22030103";
$mahasiswa3->setNilai(60);

$mahasiswa = [$mahasiswa1, $mahasiswa2, $mahasiswa3];

foreach ($mahasiswa as $mhs) {
    if ($mhs->getPredikat() == $predikat) {

        header("Location: hasil_cari.php?nama=" . urlencode($mhs->nama) .
            "&nim=" . urlencode($mhs->nim) .
            "&nilai=" . urlencode($mhs->getNilai()) .
            "&predikat=" . urlencode($mhs->getPredikat()));

        exit;
    }
}

header("Location: hasil_cari.php");
exit;

?>