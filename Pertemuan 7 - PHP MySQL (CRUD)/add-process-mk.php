<?php
include 'connection.php';
if (isset($_POST['tambah'])) {
    $kodemk = $_POST['kodemk'];
    $matkul = $_POST['matkul'];
    $jumlah_sks = $_POST['jumlah_sks'];
    
    //Cek Kode MK di database
    $cek = mysqli_num_rows(mysqli_query($conn, "SELECT kodemk FROM matakuliah WHERE kodemk='$_POST[kodemk]'"));

    if (empty($_POST['kodemk'])||empty($_POST['matkul'])||empty($_POST['jumlah_sks'])) {
        $message = "Harap lengkapi data!";
        $message = urlencode($message);
        header("Location:add-mk.php?message={$message}");
    } else if ($cek > 0) {
        $message = "Kode mata kuliah sudah digunakan, silahkan ganti yang lain!";
        $message = urlencode($message);
        header("Location:add-mk.php?message={$message}");
    } else {
        $query = mysqli_query($conn, "INSERT INTO matakuliah VALUES('$kodemk','$matkul','$jumlah_sks')");
        if ($query) {
            $message = "Data berhasil ditambahkan!";
            $message = urlencode($message);
            header("Location:list-mk.php?message={$message}");
        } else {
            $message_err = "Data gagal ditambahkan!";
            $message_err = urlencode($message_err);
            header("Location:list-mk.php?message_err={$message_err}");
        }
    }
}
?>