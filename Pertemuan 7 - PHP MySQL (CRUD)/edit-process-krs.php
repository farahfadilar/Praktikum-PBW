<?php
include 'connection.php';
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $mahasiswa_npm = $_POST['mahasiswa_npm'];
    $matakuliah_kodemk = $_POST['matakuliah_kodemk'];

    $query = mysqli_query($conn, "UPDATE krs SET id='$id', mahasiswa_npm='$mahasiswa_npm', matakuliah_kodemk='$matakuliah_kodemk' WHERE id='$id'");
    if ($query) {
        $message = "Data berhasil diubah";
        $message = urlencode($message);
        header("Location:list-krs.php?message={$message}");
    } else {
        $message = "Data gagal diubah";
        $message = urlencode($message);
        header("Location:add-krs.php?message={$message}");
    }
}
?>