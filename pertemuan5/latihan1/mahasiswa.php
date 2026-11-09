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

$mahasiswa2 = new Mahasiswa();
$mahasiswa2->nama = "Budi";
$mahasiswa2->nim = "22030102";
$mahasiswa2->setNilai(75);

$mahasiswa3 = new Mahasiswa();
$mahasiswa3->nama = "Citra";
$mahasiswa3->nim = "22030103";
$mahasiswa3->setNilai(60);

?>