<?php
include 'connection.php';
if (isset($_POST['tambah'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    
    //Cek NPM di database
    $cek = mysqli_num_rows(mysqli_query($conn, "SELECT npm FROM mahasiswa WHERE npm='$_POST[npm]'"));

    if (empty($_POST['npm'])||empty($_POST['nama'])||empty($_POST['jurusan'])||empty($_POST['alamat'])) {
        $message = "Harap lengkapi data!";
        $message = urlencode($message);
        header("Location:add-mhs.php?message={$message}");
    } else if ($cek > 0) {
        $message = "NPM sudah digunakan, silahkan ganti yang lain!";
        $message = urlencode($message);
        header("Location:add-mhs.php?message={$message}");
    } else {
        $query = mysqli_query($conn, "INSERT INTO mahasiswa VALUES('$npm','$nama','$jurusan','$alamat')");
        if ($query) {
            $message = "Data berhasil ditambahkan!";
            $message = urlencode($message);
            header("Location:list-mhs.php?message={$message}");
        } else {
            $message_err = "Data gagal ditambahkan!";
            $message_err = urlencode($message_err);
            header("Location:list-mhs.php?message_err={$message_err}");
        }
    }
}
?>