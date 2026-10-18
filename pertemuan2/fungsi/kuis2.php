<?php
function hitungNilaiAkhir($tugas, $uts, $uas) {
    $nilaiAkhir = ($tugas * 0.30) +
                  ($uts * 0.30) +
                  ($uas * 0.40);

    return $nilaiAkhir;
}

$tugas = 80;
$uts = 80;
$uas = 87.5;

$nilaiAkhir = hitungNilaiAkhir($tugas, $uts, $uas);

echo "Nilai Akhir: " . $nilaiAkhir . "<br>";

if ($nilaiAkhir >= 70) {
    echo "Status: Lulus";
} else {
    echo "Status: Tidak Lulus";
}

// Cara membuka hasil di browser:
// http://localhost/AA253/pertemuan2/fungsi/kuis2.php
?>