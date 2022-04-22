<?php
include 'koneksi.php';
session_start();

$id_buku = '';
$nama_buku = '';
$nama_penulis = '';


if (isset($_GET['pinjam'])) {
    $id_buku = $_GET['pinjam'];
    $query = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $id_buku = $result['id_buku'];
    $nama_buku = $result['nama_buku'];
    $nama_penulis = $result['nama_penulis'];
    

    
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <title>Crud Jendela 360</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                CRUD JENDELA 360
            </a>
        </div>
    </nav>
    <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_buku; ?>" name="id_buku">
            <div class="mb-3 row">
                <label for="nama_buku" class="col-sm-2 col-form-label">Nama Buku
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="nama_buku" class="form-control" id="nama_buku" placeholder="Masukan nama buku..."
                        value="<?php echo $nama_buku; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama_penulis" class="col-sm-2 col-form-label">Nama Penulis
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="nama_penulis" class="form-control" id="nama_penulis" placeholder="Masukan nama penulis..."
                        value="<?php echo $nama_penulis; ?>">
                </div>
            </div>
           
            </div>

            

            <div class="mb-3 row mt-5">
                <div class="col">

                    <?php
                    if (isset($_GET['pinjam'])) {
                    ?>

                   <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                        <i class="fa fa-cloud" aria-hidden="true"></i>
                        Simpan 
                    </button>

                    <?php
                    } else {
                    ?>

                    <button type="submit" name="aksi" value="add" class="btn btn-primary">
                        <i class="fa fa-cloud" aria-hidden="true"></i>
                        Tambahkan
                    </button>

                    <?php
                    }
                    ?>

                    <a href="index.php" type="button" class="btn btn-danger">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        Batal </a>

                </div>
            </div>
        </form>
    </div>
</body>

</html>