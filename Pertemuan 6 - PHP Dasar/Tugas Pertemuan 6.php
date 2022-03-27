<?php
$bandaraAsal = array(
    "Soekarno Hatta" => 65000,
    "Husein Sastranegara" => 50000,
    "Abdul Rachman Saleh" => 40000,
    "Juanda" => 30000
);

$bandaraTujuan = array(
    "Ngurah Rai" => 85000,
    "Hasanuddin" => 70000,
    "Inanwatan" => 90000,
    "Sultan Iskandar Muda" => 60000
);

function getPajakBA($bandaraAsal, $tujuan)
{
    $pajak = $bandaraAsal[$tujuan];
    return $pajak;
}

function getPajakBT($bandaraTujuan, $tujuan)
{
    $pajak = $bandaraTujuan[$tujuan];
    return $pajak;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Farah Fadila Rahman">
    <title>Aviation: Rute Penerbangan</title>
    <link rel="shortcut icon" href="Asset/world.png" type="image/x-icon">
    <link rel="stylesheet" href="Tugas Pertemuan 6.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container">
          <a class="navbar-brand mb-0 h1" href="#">
            <img src="Asset/airplane.png" alt="Aviation" width="30" height="30" class="d-inline-block align-text-top">
            Aviation
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="d-flex flex-row-reverse collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="#" style="color: #4c7ea1;">Home</a>
              <a class="nav-link" href="#" style="color: #4c7ea1;">Pendaftaran</a>
              <a class="nav-link" href="#" style="color: #4c7ea1;">Daftar Rute</a>
            </div>
          </div>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-md-6 offset-4">
                <img src="Asset/airplane (1).png" alt="Airplane" width="50%">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center mb-5">
                <h1>Pendaftaran Rute Penerbangan</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center mb-5">
            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="maskapai" class="form-label">Nama Maskapai</label>
                        <input type="text" class="form-control" id="maskapai" name="maskapai">
                    </div>
                    <label for="asal" class="form-label">Bandara Asal</label>
                    <select class="form-select mb-3" name="asal" id="asal">
                        <option selected>Pilih Bandara Asal</option>
                        <?php foreach ($bandaraAsal as $bandara => $pajak) : ?>
                            <option value="<?= $bandara ?>"><?= $bandara; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="tujuan" class="form-label">Bandara Tujuan</label>
                    <select class="form-select mb-3" name="tujuan" id="tujuan">
                        <option selected>Pilih Bandara Tujuan</option>
                        <?php foreach ($bandaraTujuan as $bandara => $pajak) : ?>
                            <option value="<?= $bandara ?>"><?= $bandara; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Tiket</label>
                        <input type="text" class="form-control" name="harga" id="harga">
                    </div>
                    <button class="btn btn-success" name="submit">Simpan</button>
                </form>
            </div>
        </div>
        <?php
        $file = 'Data/rute.json';
        $dataRute = array();

        $file_json = file_get_contents($file);

        $dataRute = json_decode($file_json, true);

        if (isset($_POST['submit'])) {
            $pajak = getPajakBA($bandaraAsal, $_POST['asal']) + getPajakBT($bandaraTujuan, $_POST['tujuan']);
            $total = $pajak + $_POST['harga'];

            $inputData = array(
                "Nama_Maskapai" => $_POST['maskapai'],
                "Bandara_Asal" => $_POST['asal'],
                "Bandara_Tujuan" => $_POST['tujuan'],
                "Harga_Tiket" => $_POST['harga'],
                "Pajak" => $pajak,
                "Total_Harga" => $total
            );

            array_push($dataRute, $inputData);

            $data_json = json_encode($dataRute, JSON_PRETTY_PRINT);
            file_put_contents($file, $data_json);
        }
        ?>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama Maskapai</th>
                        <th scope="col">Bandara Asal</th>
                        <th scope="col">Bandara Tujuan</th>
                        <th scope="col">Harga Tiket</th>
                        <th scope="col">Pajak</th>
                        <th scope="col">Total Harga Tiket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataRute as $data => $value) : ?>
                        <tr>
                            <td><?= $dataRute[$data]['Nama_Maskapai']; ?></td>
                            <td><?= $dataRute[$data]['Bandara_Asal']; ?></td>
                            <td><?= $dataRute[$data]['Bandara_Tujuan']; ?></td>
                            <td><?= $dataRute[$data]['Harga_Tiket']; ?></td>
                            <td><?= $dataRute[$data]['Pajak']; ?></td>
                            <td><?= $dataRute[$data]['Total_Harga']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="comtainer mt-5" id="footer">
        <h6>Made with ♡ by Farah Fadila Rahman</h6>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>