<?php

require_once 'Buku.php';

session_start();

if (!isset($_SESSION['buku'])) {
    $_SESSION['buku'] = [];
}

$aksi = $_POST['aksi'] ?? '';

$judul = trim($_POST['judul'] ?? '');
$penulis = trim($_POST['penulis'] ?? '');
$tahun = trim($_POST['tahun'] ?? '');
$kategori = $_POST['kategori'] ?? '';

$e = [];

if ($judul === '') {
    $e[] = 'Judul wajib diisi';
}

if ($penulis === '') {
    $e[] = 'Penulis wajib diisi';
}

if (!ctype_digit($tahun)) {
    $e[] = 'Tahun harus berupa angka';
} elseif ((int)$tahun < 1000 || (int)$tahun > date('Y')) {
    $e[] = 'Tahun tidak valid';
}

$kategoriSah = ['Fiksi', 'Nonfiksi', 'Pendidikan'];

if (!in_array($kategori, $kategoriSah, true)) {
    $e[] = 'Kategori tidak valid';
}

$namaCover = '';

if (isset($_FILES['cover']) && $_FILES['cover']['error'] !== UPLOAD_ERR_NO_FILE) {

    $file = $_FILES['cover'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        $e[] = 'Upload cover gagal';
    } else {

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, ['jpg', 'png'], true)) {
            $e[] = 'Cover harus berformat JPG atau PNG';
        }

        if ($file['size'] > 2097152) {
            $e[] = 'Ukuran cover maksimal 2 MB';
        }

        if (!$e) {

            if (!is_dir('uploads')) {
                mkdir('uploads', 0777, true);
            }

            $namaCover = uniqid() . '.' . $ext;

            move_uploaded_file(
                $file['tmp_name'],
                'uploads/' . $namaCover
            );
        }
    }
}

if ($e) {

    foreach ($e as $pesan) {
        echo htmlspecialchars($pesan) . '<br>';
    }

    echo '<br><a href="form_buku.php">Kembali ke Form</a>';

    exit;
}

if ($aksi === 'tambah') {

    $id = uniqid();

    $buku = new Buku(
        $id,
        $judul,
        $penulis,
        $tahun,
        $kategori,
        $namaCover
    );

    $_SESSION['buku'][] = $buku;

    header('Location: daftar_buku.php');
    exit;
}

if ($aksi === 'update') {

    $id = $_POST['id'] ?? '';

    foreach ($_SESSION['buku'] as $key => $buku) {

        if ($buku->id === $id) {

            $_SESSION['buku'][$key]->judul = $judul;
            $_SESSION['buku'][$key]->penulis = $penulis;
            $_SESSION['buku'][$key]->tahun = $tahun;
            $_SESSION['buku'][$key]->kategori = $kategori;

            if ($namaCover !== '') {

                if (
                    $_SESSION['buku'][$key]->cover !== '' &&
                    file_exists('uploads/' . $_SESSION['buku'][$key]->cover)
                ) {
                    unlink('uploads/' . $_SESSION['buku'][$key]->cover);
                }

                $_SESSION['buku'][$key]->cover = $namaCover;
            }

            break;
        }
    }

    header('Location: daftar_buku.php');
    exit;
}

?>