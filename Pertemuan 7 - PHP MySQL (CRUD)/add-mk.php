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
    <title>Input Data Mata Kuliah</title>
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
                            <h2>Input Data Mata Kuliah</h2>
                            <a href="list-mk.php" class="btn btn-primary">Daftar Mata Kuliah</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="add-process-mk.php" method="post" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label for="kodemk" class="form-label">Kode Mata Kuliah</label>
                                <input type="text" name="kodemk" id="kodemk" class="form-control" placeholder="Masukkan 6 digit kode mata kuliah">
                            </div>
                            <div class="mb-4">
                                <label for="matkul" class="form-label">Nama Mata Kuliah</label>
                                <input type="text" name="matkul" id="matkul" class="form-control" placeholder="Masukkan nama mata kuliah">
                            </div>
                            <div class="mb-4">
                                <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
                                <div class="input-group mb-3">
                                    <select name="jumlah_sks" id="jumlah_sks" class="form-select">
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="6">6</option>
                                    </select>
                                    <span class="input-group-text">SKS</span>
                                </div>
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