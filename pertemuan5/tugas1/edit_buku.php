<?php

require_once 'Buku.php';

session_start();

$id = $_GET['id'] ?? '';

$bukuDitemukan = null;

if (isset($_SESSION['buku'])) {

    foreach ($_SESSION['buku'] as $buku) {

        if ($buku->id === $id) {
            $bukuDitemukan = $buku;
            break;
        }
    }
}

if ($bukuDitemukan === null) {
    echo 'Data buku tidak ditemukan';
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
</head>
<body>

<h2>Edit Buku</h2>

<form action="proses_buku.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="aksi" value="update">

    <input type="hidden" name="id"
        value="<?php echo htmlspecialchars($bukuDitemukan->id); ?>">

    <label for="judul">Judul : </label><br>

    <input type="text"
        name="judul"
        value="<?php echo htmlspecialchars($bukuDitemukan->judul); ?>"><br><br>


    <label for="penulis">Penulis : </label><br>

    <input type="text"
        name="penulis"
        value="<?php echo htmlspecialchars($bukuDitemukan->penulis); ?>"><br><br>


    <label for="tahun">Tahun : </label><br>

    <input type="text"
        name="tahun"
        value="<?php echo htmlspecialchars($bukuDitemukan->tahun); ?>"><br><br>


    <label for="kategori">Kategori : </label><br>

    <select name="kategori">

        <option value="Fiksi"
            <?php if ($bukuDitemukan->kategori == 'Fiksi') echo 'selected'; ?>>
            Fiksi
        </option>

        <option value="Nonfiksi"
            <?php if ($bukuDitemukan->kategori == 'Nonfiksi') echo 'selected'; ?>>
            Nonfiksi
        </option>

        <option value="Pendidikan"
            <?php if ($bukuDitemukan->kategori == 'Pendidikan') echo 'selected'; ?>>
            Pendidikan
        </option>

    </select>

    <br><br>

    <label for="cover">Ganti Cover : </label><br>

    <input type="file" name="cover"><br><br>

    <button type="submit">Update</button>

</form>

<br>

<a href="daftar_buku.php">Kembali</a>

</body>
</html>