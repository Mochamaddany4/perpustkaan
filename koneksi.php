<?php
    //file koneksi ke database
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'perpustakaan';

    $conn = mysqli_connect($host, $user,$pass, $db);

    if($conn){
        //echo"koneksi berhasil";
    }

    mysqli_select_db($conn, $db);

?>