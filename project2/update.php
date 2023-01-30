<?php
 include 'koneksi.php';

 $No = $_GET['No'];
 $sqlGet = "SELECT * FROM siswa WHERE No='$No'";
 $queryGet = mysqli_query($conn, $sqlGet);
 $data = mysqli_fetch_array($queryGet);
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
        <form action="update.php" method="post">
            <label for="No">No</label>
            <input type="text" id="No" name="No" value="<?php echo "$data[No]";?>" class="form-control" readonly>

            <label for="No">Nama</label>
            <input type="text" id="Nama" name="Nama" value="<?php echo "$data[Nama]";?>" class="form-control" required>

            <label for="No">No Absen</label>
            <input type="text" id="No Absen" name="No Absen" value="<?php echo "$data[No_Absen]";?>" class="form-control" required>

            <label for="Kelas">Kelas</label>
            <select name="Kelas" id="Kelas" class="form-select" required>
                <option><?php echo "$data[Kelas]";?></option>
                <option value="TKJ 1">XI TKJ 1</option>
                <option value="TKJ 2">XI TKJ 2</option>
            </select>

            <label for="No">Foto</label>
            <input type="text" id="Foto" name="Foto" value="<?php echo "$data[Foto]";?>" class="form-control" required>

            <input class="btn btn-success mt-3" type="submit" name="tambah" value="Update Data">
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

            $sqlUpdate = "UPDATE siswa 
                          SET Nama='$Nama', No_Absen='$No_Absen', Kelas='$Kelas', Foto='$Foto'
                          WHERE No='$No'";
            $queryUpdate = mysqli_query($conn, $sqlUpdate);

            header("location: index.php");
        }
    ?>
</body>
</html>