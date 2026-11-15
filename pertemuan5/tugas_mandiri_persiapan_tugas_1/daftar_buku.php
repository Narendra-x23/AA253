<?php

require_once 'Buku.php';

session_start();

if (!isset($_SESSION['buku'])) {
    $_SESSION['buku'] = [];
}

$kategori = $_GET['kategori'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
</head>
<body>

<h2>Daftar Buku</h2>

<form action="daftar_buku.php" method="get">

    <label for="kategori">Cari berdasarkan kategori : </label>

    <select name="kategori">
        <option value="">Semua</option>
        <option value="Fiksi" <?php if ($kategori == 'Fiksi') echo 'selected'; ?>>Fiksi</option>
        <option value="Nonfiksi" <?php if ($kategori == 'Nonfiksi') echo 'selected'; ?>>Nonfiksi</option>
        <option value="Pendidikan" <?php if ($kategori == 'Pendidikan') echo 'selected'; ?>>Pendidikan</option>
    </select>

    <button type="submit">Cari</button>

</form>

<br>

<a href="form_buku.php">Tambah Buku</a>

<br><br>

<?php

$adaData = false;

foreach ($_SESSION['buku'] as $buku) {

    if ($kategori !== '' && $buku->kategori !== $kategori) {
        continue;
    }

    $adaData = true;

    echo '<hr>';

    echo 'Judul: ' . htmlspecialchars($buku->judul) . '<br>';
    echo 'Penulis: ' . htmlspecialchars($buku->penulis) . '<br>';
    echo 'Tahun: ' . htmlspecialchars($buku->tahun) . '<br>';
    echo 'Kategori: ' . htmlspecialchars($buku->kategori) . '<br>';

    if ($buku->cover !== '') {

        echo '<br>';

        echo '<img src="uploads/' .
            htmlspecialchars($buku->cover) .
            '" width="150"><br>';

    } else {

        echo 'Cover: Tidak ada<br>';

    }

    echo '<br>';

    echo '<a href="edit_buku.php?id=' .
        urlencode($buku->id) .
        '">Edit</a> | ';

    echo '<a href="hapus_buku.php?id=' .
        urlencode($buku->id) .
        '" onclick="return confirm(\'Hapus buku ini?\')">Hapus</a>';
}

if (!$adaData) {
    echo '<br>Tidak ada data buku';
}

?>

</body>
</html>