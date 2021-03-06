<?php
if (isset($_GET['id'])) {
include "connection.php";
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM krs WHERE id='$id'");
$data = mysqli_fetch_array($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Farah Fadila Rahman">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Edit Data KRS</title>
</head>
<body>
    <div class="container my-5">
    <button type="button" class="btn btn-link"><a href="index.html">Beranda</a></button>
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_GET['message'])) {
                    $message = $_GET['message'];
                ?>
                    <div class="alert alert-danger my-4"><?= $message ?></div>
                <?php
                }
                ?>
                <div class="card border-0">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h2>Edit Data KRS (Kartu Rencana Studi)</h2>
                            <a href="list-krs.php" class="btn btn-primary">Daftar KRS</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="edit-process-krs.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="mb-4">
                                <label for="mahasiswa_npm" class="form-label">NPM Mahasiswa</label>
                                <input type="text" name="mahasiswa_npm" id="mahasiswa_npm" class="form-control" value="<?= $data['mahasiswa_npm'] ?>">
                            </div>
                            <div class="mb-4">
                                <label for="matakuliah_kodemk" class="form-label">Kode Mata Kuliah</label>
                                <input type="text" name="matakuliah_kodemk" id="matakuliah_kodemk" class="form-control" value="<?= $data['matakuliah_kodemk'] ?>">
                            </div>
                            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>