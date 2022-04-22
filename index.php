<?php
include 'koneksi.php';
session_start();

$query = "SELECT * FROM buku;";
$sql = mysqli_query($conn, $query);
$id_buku = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- datatables -->
    <!-- css -->
    <link rel="stylesheet" href="datatables/datatables.css">
    <!-- js -->
    <script src="datatables/datatables.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity=" sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <title>CRUD JENDELA 360
    </title>
</head>

<script>
$(document).ready(function() {
    $('#dt').DataTable();
});
</script>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                CRUD JENDELA 360
            </a>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-5">Data Buku Perpustakaan</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Data yang telah tersimpan di database</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                CRUD <cite title="Source Title">Create Read Update Delete </cite>
            </figcaption>
        </figure>
        <!-- Button -->
        <a href="kelola.php" type="button" class="btn btn-primary mb-4">
            <i class="fa fa-plus"></i>
            Tambah Data
        </a>
        <a href="kelola.php" type="button" class="btn btn-primary mb-4">
            <i class="fa fa-plus"></i>
            Pinjam Buku
        </a>
        <?php
        if (isset($_SESSION['eksekusi'])) :
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>
                <?php
                    echo $_SESSION['eksekusi'];
                    ?>
            </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            session_destroy();
        endif;
        ?>

        <!-- Table -->
        <div class="table-responsive">
            <table id="dt" class="table align-middle table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            <center>No</center>
                        </th>                        
                        <th>No Buku</th>
                        <th>Nama Buku</th>
                        <th>Nama Penulis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($result = mysqli_fetch_assoc($sql)) {
                    ?>
                    <tr>
                        <td>
                            <center>
                                <?php
                                    echo ++$id_buku;
                                    ?>.
                            </center>
                        </td>
                        <td><?php
                                echo $result['no_buku'];
                                ?></td>
                        <td><?php
                                echo $result['nama_buku'];
                                ?></td>
                        <td><?php
                                echo $result['nama_penulis'];
                                ?></td>
                        
                        <td>
                            <a href="kelola.php?ubah=<?php echo $result['id_buku']; ?>" type="button"
                                class="btn btn-success btn-sm">
                                <i class="fa fa-pencil-alt">edit</i>
                            </a>
                            <a href="proses.php?hapus=<?php echo $result['id_buku']; ?>" type="button"
                                class="btn btn-danger btn-sm"
                                onClick="return confirm('Apakah Anda yakin ingin menghapus data tersebut???')">
                                <i class="fa fa-trash">hapus</i>
                            </a>
                            <a href="kelola.php?ubah=<?php echo $result['id_buku']; ?>" type="button"
                                class="btn btn-success btn-sm">
                                <i class="fa fa-pencil-alt">Pinjam</i>
                            </a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr class="align-bottom">
                    </tr>

                </tbody>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>