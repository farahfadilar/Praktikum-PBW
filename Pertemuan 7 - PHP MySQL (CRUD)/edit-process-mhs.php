<?php
include 'connection.php';
if (isset($_POST['edit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($conn, "UPDATE mahasiswa SET npm='$npm', nama='$nama', jurusan='$jurusan', alamat='$alamat' WHERE npm='$npm'");
    if ($query) {
        $message = "Data berhasil diubah";
        $message = urlencode($message);
        header("Location:index.php?message={$message}");
    } else {
        $message = "Data gagal diubah";
        $message = urlencode($message);
        header("Location:add.php?message={$message}");
    } else {
        $message = "Ukuran File Terlalu Besar";
        $message = urlencode($message);
        header("Location:add.php?message={$message}");
    } else {
        $query = mysqli_query($koneksi, "UPDATE articles SET 
        title='$title', content='$content', category='$category' WHERE 
        id='$id'");
        if ($query) {
            $message = "Data berhasil diubah";
            $message = urlencode($message);
            header("Location:index.php?message={$message}");
        } else {
            $message = "Data gagal diubah";
            $message = urlencode($message);
            header("Location:add.php?message={$message}");
        }
    }
}
?>