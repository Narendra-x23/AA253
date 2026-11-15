<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku</title>
</head>
<body>

<h2>Form Input Buku</h2>

<form action="proses_buku.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="aksi" value="tambah">

    <label for="judul">Judul : </label><br>
    <input type="text" name="judul"><br><br>

    <label for="penulis">Penulis : </label><br>
    <input type="text" name="penulis"><br><br>

    <label for="tahun">Tahun : </label><br>
    <input type="text" name="tahun"><br><br>

    <label for="kategori">Kategori : </label><br>
    <select name="kategori">
        <option value="Fiksi">Fiksi</option>
        <option value="Nonfiksi">Nonfiksi</option>
        <option value="Pendidikan">Pendidikan</option>
    </select><br><br>

    <label for="cover">Cover Buku : </label><br>
    <input type="file" name="cover"><br><br>

    <button type="submit">Simpan</button>

</form>

<br>

<a href="daftar_buku.php">Lihat Daftar Buku</a>

</body>
</html>