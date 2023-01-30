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
            <!-- <label for="No">No</label>
            <input type="text" id="No" name="No" class="form-control" required> -->

            <label for="No">Nama</label>
            <input type="text" id="Nama" name="Nama" class="form-control" required>

            <label for="No">No Absen</label>
            <input type="text" id="No_Absen" name="No_Absen" class="form-control" required>

            <label for="Kelas">Kelas</label>
            <select name="Kelas" id="Kelas" class="form-select" required>
                <option>Pilih Kelas</option>
                <option value="TKJ 1">XI TKJ 1</option>
                <option value="TKJ 2">XI TKJ 2</option>
            </select>

            <label for="No">Foto</label>
            <input type="file" id="foto" name="foto" class="form-control" required="">

            <input class="btn btn-success mt-3" type="submit" name="tambah" value="Tambah Data">
        </form>
    </div>

    <?php
            // $No = $_POST['No'];
            $Nama = $_POST['Nama'];
            $No_Absen = $_POST['No_Absen'];
            $KelasSelect = $_POST['Kelas'];
            if ($KelasSelect == 'TKJ 1') {
              $Kelas = 'XI TKJ 1';
            } if ($KelasSelect == 'TKJ 2') {
                $Kelas = 'XI TKJ 2';
            }
            $foto = $_FILES['foto']['name'];
            $tmp = $_FILES['foto']['tmp_name'];
	
        // Rename nama fotonya dengan menambahkan tanggal dan jam upload
        $fotobaru = date('dmYHis').$foto;

        // Set path folder tempat menyimpan fotonya
        $path = "images/".$fotobaru;

        // Proses upload
        if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Proses simpan ke Database
            $query ="INSERT INTO siswa (Nama,No_Absen,Kelas,Foto)
            VALUE ('$Nama','$No_Absen','$KelasSelect','$fotobaru')";
            $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query

            if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
                header("location:index.php"); // Redirect ke halaman index.php
            }else{
                // Jika Gagal, Lakukan :
                echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
                echo "<br><a href='add.php'>Kembali Ke Form</a>";
            }
        }else{
            // Jika gambar gagal diupload, Lakukan :
            echo "Maaf, Gambar gagal untuk diupload.";
            echo "<br><a href='add.php'>Kembali Ke Form</a>";
        }
    ?>
</body>
</html>