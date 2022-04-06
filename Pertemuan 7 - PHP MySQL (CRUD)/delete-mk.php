<?php
if (isset($_GET['id'])) {
    include "connection.php";
    $id = $_GET['id'];
    $query = mysqli_query($conn, "DELETE FROM matakuliah WHERE kodemk='$id'");
    if ($query) {
        $message = "Data berhasil dihapus!";
        $message = urlencode($message);
        header("Location:list-mk.php?message={$message}");
    } else {
        $message = "Data gagal dihapus!";
        $message = urlencode($message);
        header("Location:add-mk.php?message={$message}");
    }
}
?>