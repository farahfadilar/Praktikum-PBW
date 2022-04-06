<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Farah Fadila Rahman">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        label{
            font-weight: 500;
        }
    </style>
    <title>Input Data Mahasiswa</title>
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
                            <h2>Input Data Mahasiswa</h2>
                            <a href="list-mhs.php" class="btn btn-primary">Daftar Mahasiswa</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="add-process-mhs.php" method="post" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label for="npm" class="form-label">NPM</label>
                                <input type="text" name="npm" id="npm" class="form-control" placeholder="Masukkan 13 digit NPM">
                            </div>
                            <div class="mb-4">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama lengkap">
                            </div>
                            <div class="mb-4">
                                <label for="jurusan" class="form-label">Program Studi</label>
                                <select name="jurusan" id="jurusan" class="form-select">
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat"></textarea>
                            </div>
                            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>