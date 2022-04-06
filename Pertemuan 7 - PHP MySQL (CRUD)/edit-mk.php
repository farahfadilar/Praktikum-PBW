<?php
if (isset($_GET['id'])) {
include "connection.php";
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM matakuliah WHERE kodemk='$id'");
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
    <title>Edit Data Mata Kuliah</title>
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
                            <h2>Edit Data Mata Kuliah</h2>
                            <a href="list-mk.php" class="btn btn-primary">Daftar Mata Kuliah</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="edit-process-mk.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="kodemk" value="<?= $kodemk ?>">
                            <div class="mb-4">
                                <label for="kodemk" class="form-label">Kode Mata Kuliah</label>
                                <input type="text" name="kodemk" id="kodemk" class="form-control" value="<?= $data['kodemk'] ?>">
                            </div>
                            <div class="mb-4">
                                <label for="matkul" class="form-label">Nama Mata Kuliah</label>
                                <input type="text" name="matkul" id="matkul" class="form-control" value="<?= $data['nama'] ?>">
                            </div>
                            <div class="mb-4">
                                <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
                                <div class="input-group mb-3">
                                    <select name="jumlah_sks" id="jumlah_sks" class="form-select">
                                        <option value="2" <?= $data['jumlah_sks'] == "2" ? "Selected" : "" ?>>2</option>
                                        <option value="3" <?= $data['jumlah_sks'] == "3" ? "Selected" : "" ?>>3</option>
                                        <option value="6" <?= $data['jumlah_sks'] == "6" ? "Selected" : "" ?>>6</option>
                                    </select>
                                    <span class="input-group-text">SKS</span>
                                </div>
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