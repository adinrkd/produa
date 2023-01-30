<?php
 include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Project CRUD</title>
</head>
<body>
    <div class="w-50 mx-auto border p-3 mt-5">
        <a href="index.php">Kembali</a>
        <form action="add.php" method="post">
            <label for="No">No</label>
            <input type="text" id="No" name="No" class="form-control" required>

            <label for="No">Nama</label>
            <input type="text" id="Nama" name="Nama" class="form-control" required>

            <label for="No">No Absen</label>
            <input type="text" id="No Absen" name="No Absen" class="form-control" required>

            <label for="Kelas">Kelas</label>
            <select name="Kelas" id="Kelas" class="form-select" required>
                <option>Pilih Kelas</option>
                <option value="TKJ 1">XI TKJ 1</option>
                <option value="TKJ 2">XI TKJ 2</option>
            </select>

            <label for="No">Foto</label>
            <input type="file" id="Foto" name="oto" class="form-control" required>

            <input class="btn btn-success mt-3" type="submit" name="tambah" value="Tambah Data">
        </form>
    </div>

    <?php

        if (isset($_POST['tambah'])) {
            $No = $_POST['No'];
            $Nama = $_POST['Nama'];
            $No_Absen = $_POST['No_Absen'];
            $Foto = $_POST['Foto'];

            $KelasSelect = $_POST['Kelas'];
            if ($KelasSelect == 'TKJ 1') {
              $Kelas = 'XI TKJ 1';
            } if ($KelasSelect == 'TKJ 2') {
                $Kelas = 'XI TKJ 2';
            }

            $sqlGet = "SELECT * FROM siswa WHERE No='$No'";
            $queryGet = mysqli_query($conn, $sqlGet);
            $cek = mysqli_num_rows($queryGet);

            $sqlInsert = "INSERT INTO siswa(No,Nama,No_Absen,Kelas,Foto) VALUES ('$No','$Nama','$No_Absen','$Kelas','$Foto')";

            $queryInsert = mysqli_query($conn, $sqlInsert);
            
            if (isset($sqlInsert) && $cek < 0 && $queryInsert) {
                echo "
                    <div class='alert alert-success'>Data berhasil ditambahkan <a href='index.php'>Lihat data</a></div>
                ";
            } else if ($cek > 0) {
                echo "
                    <div class='alert alert-danger'>Data gagal ditambahkan <a href='index.php'>Lihat data</a></div>
                ";
            }
            
            header("location: index.php");
        }
    ?>
</body>
</html>