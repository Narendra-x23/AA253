<?php

class Mahasiswa {
    public $nama;
    public $nim;
    private $nilai;

    public function __construct($nama, $nim) {
        $this->nama = $nama;
        $this->nim = $nim;
    }

    public function setNilai($nilai) {
        if ($nilai < 0 || $nilai > 100) {
            return false;
        }

        $this->nilai = $nilai;
        return true;
    }

    public function getNilai() {
        return $this->nilai;
    }

    public function getPredikat() {
        if ($this->nilai >= 85) {
            return "A";
        } elseif ($this->nilai >= 70) {
            return "B";
        } elseif ($this->nilai >= 55) {
            return "C";
        } else {
            return "D";
        }
    }
}

?>