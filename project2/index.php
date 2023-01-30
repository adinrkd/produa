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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
    <title>Project CRUD</title>
</head>
<body>
    <div class="container mt-3">
        <a href="add.php" class="btn btn-primary btn-mD mb-3"><i class="fa fa-plus"></i> Tambah Data</a>       

        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <th>No</th>
                <th>Nama</th>
                 <th>No Absen</th>
                <th>Kelas</th>
                <th>Foto</th>
                <th>Aksi</th>
            </thead>

            <?php
                $sqlGet = "SELECT * FROM siswa";
                $query = mysqli_query($conn, $sqlGet);

                while($data = mysqli_fetch_array($query)) {
                    echo "
                        <tbody>
                            <tr>
                                <td>$data[No]</td>
                                <td>$data[Nama]</td>
                                <td>$data[No_Absen]</td>
                                <td>$data[Kelas]</td>
                                <td>$data[Foto]</td>
                                <td>
                                    <div class='row'>
                                        <div class='col d-flex justify-content-center'>
                                        <a href='update.php?No=$data[No]' class='btn btn-sm btn-warning'><i class='fa fa-edit'></i> Edit</a>
                                        </div>
                                        <div class='col d-flex justify-content-center'>
                                        <a href='delete.php?No=$data[No]' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Remove</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    ";
                }
            ?>
         </table>
    </div>
</body>
</html>