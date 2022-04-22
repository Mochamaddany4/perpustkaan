<?php
include 'koneksi.php';
session_start();

function tambah_data($data)
{
    $id_buku = $data['id_buku'];
    $no_buku = $data['no_buku'];
    $nama_buku = $data['nama_buku'];
    $nama_penulis = $data['nama_penulis'];

    $query = "INSERT INTO buku VALUES ('$id_buku','$no_buku','$nama_buku', '$nama_penulis')";

    $sql = mysqli_query($GLOBALS['conn'], $query);


}


function ubah_data($data)
{
    $id_buku = $data['id_buku'];
    $no_buku = $data['no_buku'];
    $nama_buku = $data['nama_buku'];
    $nama_penulis = $data['nama_penulis'];
    

    $queryShow = "SELECT * FROM buku WHERE id_buku = '$id_buku';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

 

    $query = "UPDATE buku SET nama_buku='$nama_buku', nama_penulis='$nama_penulis' WHERE id_buku='$id_buku';";


    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function pinjam($data)
{
    $id_buku = $data['id_buku'];
    $no_buku = $data['no_buku'];
    $nama_buku = $data['nama_buku'];
    $nama_penulis = $data['nama_penulis'];
    

    $queryShow = "SELECT * FROM buku WHERE id_buku = '$id_buku';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

 

    $query = "UPDATE buku SET nama_buku='$nama_buku', nama_penulis='$nama_penulis' WHERE id_buku='$id_buku';";


    //proses query diatas dengan mysqli
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function hapus_data($data)
{
    $id_buku = $data['hapus'];

    $queryShow = "SELECT * FROM buku WHERE id_buku = '$id_buku';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);


    $query = "DELETE FROM buku WHERE id_buku = '$id_buku';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}
?>
