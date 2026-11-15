<?php

$nim = $_GET['nim'] ?? '';

if ($nim != '') {

    echo "Hasil Pencarian Mahasiswa<br><br>";
    echo "NIM: " . htmlspecialchars($nim);

} else {

    echo "Data mahasiswa tidak ditemukan";

}

?>