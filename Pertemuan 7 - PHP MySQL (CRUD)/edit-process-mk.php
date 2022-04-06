<?php
include 'connection.php';
if (isset($_POST['edit'])) {
    $kodemk = $_POST['kodemk'];
    $matkul = $_POST['matkul'];
    $jumlah_sks = $_POST['jumlah_sks'];

    $query = mysqli_query($conn, "UPDATE matakuliah SET kodemk='$kodemk', nama='$matkul', jumlah_sks='$jumlah_sks' WHERE kodemk='$kodemk'");
    if ($query) {
        $message = "Data berhasil diubah";
        $message = urlencode($message);
        header("Location:list-mk.php?message={$message}");
    } else {
        $message = "Data gagal diubah";
        $message = urlencode($message);
        header("Location:add-mk.php?message={$message}");
    }
}
?>