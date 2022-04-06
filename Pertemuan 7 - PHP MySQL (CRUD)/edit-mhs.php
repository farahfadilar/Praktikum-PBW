<?php
if (isset($_GET['npm'])) {
    include "connection.php";
    $npm = $_GET['npm'];
    $query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE npm='$npm'");
    $data = mysqli_fetch_array($query);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Farah Fadila Rahman">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Edit Data Mahasiswa</title>
    </head>
    <body>
        <div class="container my-5">
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
                                <h2>Edit Data Mahasiswa</h2>
                                <a href="list-mhs.php" class="btn btn-primary">Daftar Mahasiswa</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="edit-proccess-mhs.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="npm" value="<?= $npm ?>">
                                <div class="mb-4">
                                    <label for="npm" class="form-label">NPM</label>
                                    <input type="text" name="npm" id="npm" class="form-control" value="<?= $data['npm'] ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" id="nama" class="form-control"><?=$data['nama'] ?>
                                </div>
                                <div class="mb-4">
                                    <label for="jurusan" class="form-label">Program Studi</label>
                                    <select name="jurusan" id="jurusan" class="form-select">
                                        <option value="Teknik Informatika" <?= $data['jurusan'] == "Teknik Informatika" ? "Selected" : "" ?>>Teknik Informatika</option>
                                        <option value="Sistem Informasi" <?= $data['jurusan'] == "Sistem Informasi" ?"Selected" : "" ?>>Sistem Informasi</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control"><?=$data['alamat'] ?></textarea>
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
<?php
}
?>