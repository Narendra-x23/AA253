<?php

require_once 'Buku.php';

session_start();

$id = $_GET['id'] ?? '';

if (isset($_SESSION['buku'])) {

    foreach ($_SESSION['buku'] as $key => $buku) {

        if ($buku->id === $id) {

            if (
                $buku->cover !== '' &&
                file_exists('uploads/' . $buku->cover)
            ) {
                unlink('uploads/' . $buku->cover);
            }

            unset($_SESSION['buku'][$key]);

            $_SESSION['buku'] = array_values($_SESSION['buku']);

            break;
        }
    }
}

header('Location: daftar_buku.php');
exit;

?>