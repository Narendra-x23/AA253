<?php

class Mahasiswa {
    public $nama;
    public $nim;
    private $nilai;

    public function setNilai($nilai) {
        if ($nilai >= 0 && $nilai <= 100) {
            $this->nilai = $nilai;
        } else {
            echo "Nilai $nilai tidak valid!<br>";
        }
    }

    public function getNilai() {
        return $this->nilai;
    }

    public function getPredikat() {
        if ($this->nilai >= 85) return "A";
        if ($this->nilai >= 70) return "B";
        if ($this->nilai >= 55) return "C";
        return "D";
    }
}

$mahasiswa1 = new Mahasiswa();
$mahasiswa1->nama = "Andi";
$mahasiswa1->nim = "22030101";
$mahasiswa1->setNilai(88);

echo "Nama: " . $mahasiswa1->nama . "<br>";
echo "NIM: " . $mahasiswa1->nim . "<br>";
echo "Nilai: " . $mahasiswa1->getNilai() . "<br>";
echo "Predikat: " . $mahasiswa1->getPredikat() . "<br><br>";

$mahasiswa2 = new Mahasiswa();
$mahasiswa2->nama = "Budi";
$mahasiswa2->nim = "22030102";

echo "Nama: " . $mahasiswa2->nama . "<br>";
echo "NIM: " . $mahasiswa2->nim . "<br>";

$mahasiswa2->setNilai(120);

?>