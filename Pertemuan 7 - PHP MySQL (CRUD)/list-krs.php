<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Farah Fadila Rahman">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Daftar KRS</title>
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
                    <div class="alert alert-success my-4"><?= $message ?></div>
                <?php
                } else if (isset($_GET['message_err'])) {
                    $message_err = $_GET['message_err'];
                ?>
                    <div class="alert alert-danger my-4"><?= $message_err ?></div>
                <?php
                }
                ?>
                
                <div class="card border-0">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h2>Daftar KRS (Kartu Rencana Studi)</h2>
                            <a href="add-krs.php" class="btn btn-primary">Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>Mata Kuliah</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "connection.php";
                                $no = 0;
                                $query = mysqli_query($conn, "SELECT krs.id AS id, mhs.nama AS nama, matkul.nama AS matkul, matkul.jumlah_sks AS sks FROM (krs krs LEFT JOIN mahasiswa mhs ON krs.mahasiswa_npm = mhs.npm) LEFT JOIN matakuliah matkul ON krs.matakuliah_kodemk = matkul.kodemk");
                                foreach ($query as $data) {
                                    $no++;
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['matkul'] ?></td>
                                    <td><?= $data['nama'] . " mengambil mata kuliah " . $data['matkul'] . " (" . $data['sks'] . " SKS)" ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="edit-krs.php?id=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
                                            <a href="delete-krs.php?id=<?= $data['id'] ?>" class="btn btn-danger">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>