<?php
if (isset($_GET['id'])) {
    include "connection.php";
    $id = $_GET['id'];
    $query = mysqli_query($conn, "DELETE FROM mahasiswa WHERE npm='$id'");
    if ($query) {
        $message = "Data berhasil dihapus!";
        $message = urlencode($message);
        header("Location:list-mhs.php?message={$message}");
    } else {
        $message = "Data gagal dihapus!";
        $message = urlencode($message);
        header("Location:add-mhs.php?message={$message}");
    }
}
?>