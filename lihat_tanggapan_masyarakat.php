<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'head.php';
    include 'koneksi.php';
    session_start();

    //duplikat tambah a
    $id_pengaduan        = mysqli_real_escape_string($koneksi, $_GET['id_pengaduan']);
    $sqla = "SELECT * FROM tanggapan WHERE id_pengaduan='$id_pengaduan'";
    $querya = mysqli_query($koneksi, $sqla) or die(mysqli_error($koneksi));
    if (mysqli_num_rows($querya) > 0) {
        $rowa = mysqli_fetch_array($querya);
    }
    $tanggapan = $rowa['tanggapan'];

    //asli
    $sql = "SELECT * FROM pengaduan WHERE id_pengaduan='$id_pengaduan'";
    $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);
    }
    ?>

</head>

<body class="app">
    <?php
    include 'nav_masyarakat.php';
    ?>
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <h1 class="app-page-title">Tanggapan</h1>
                <hr class="mb-4">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title">laporan</h3>
                        <div class="section-intro"><?php echo $row['isi_laporan']; ?>
                        </div>
                        <br>
                        <h3 class="section-title">Bukti Foto</h3>
                        <img src="img\<?php echo $row['foto']; ?>" height="180" alt="Bukti" />
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">

                            <div class="app-card-body">
                                <form class="settings-form" action="" method="POST" enctype="multipart/form-data">
                                    <div class="col-12 col-md-4">
                                        <h3 class="section-title">Tanggapan</h3>
                                        <div class="section-intro"><?php echo $rowa['tanggapan']; ?>
                                            <br>
                                            <br>
                                            <a class="badge bg-secondary" href="laporan_masyarakat.php">kembali</a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
    </div>
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>