<?php

class Buku {
    public $id;
    public $judul;
    public $penulis;
    public $tahun;
    public $kategori;
    public $cover;

    public function __construct($id, $judul, $penulis, $tahun, $kategori, $cover = '') {
        $this->id = $id;
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tahun = $tahun;
        $this->kategori = $kategori;
        $this->cover = $cover;
    }

    public function setTahun($tahun) {
        if (!ctype_digit($tahun)) {
            return false;
        }

        $tahun = (int)$tahun;

        if ($tahun < 1000 || $tahun > date('Y')) {
            return false;
        }

        $this->tahun = $tahun;
        return true;
    }

    public function setKategori($kategori) {
        $kategoriSah = ['Fiksi', 'Nonfiksi', 'Pendidikan'];

        if (!in_array($kategori, $kategoriSah, true)) {
            return false;
        }

        $this->kategori = $kategori;
        return true;
    }
}

?>