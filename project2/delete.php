<?php
    include 'koneksi.php';

    $No = $_GET['No'];
    $sqlDelete = "DELETE FROM siswa WHERE No='$No' ";
    mysqli_query($conn, $sqlDelete);

    header("location: index.php");
?>