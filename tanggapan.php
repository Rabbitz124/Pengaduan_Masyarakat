<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'head.php';
    include 'koneksi.php';
    session_start();
    $id_petugas = $_SESSION['id_petugas'];

    $id_pengaduan        = mysqli_real_escape_string($koneksi, $_GET['id_pengaduan']);
    $sql = "SELECT * FROM pengaduan WHERE id_pengaduan='$id_pengaduan'";
    $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);
    }

    ?>

</head>

<body class="app">
    <?php
    include 'nav_petugas.php';
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
                                    <div class="mb-3">
                                        <label for="setting-input-1" class="form-label">Isi Tanggapan</label>
                                        <input type="text" name="tanggapan" class="form-control" id="setting-input-1" placeholder="Isikan Tanggapan" required>
                                    </div>
                                    <button type="submit" name="submit" class="btn app-btn-primary">Kirim
                                        Tanggapan</button>
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
    <?php
    if (isset($_POST['submit'])) {
        $tanggapan = $_POST['tanggapan'];
        $tgl_tanggapan = date('y-m-d');
        $sql = "INSERT INTO tanggapan VALUES (NULL,'$id_pengaduan','$tgl_tanggapan','$tanggapan','$id_petugas')";
        $query = mysqli_query($koneksi, $sql);

        if ($query) {
            $sql = "UPDATE `pengaduan` SET `status` = 'selesai' WHERE `pengaduan`.`id_pengaduan` = $id_pengaduan;";
            $query = mysqli_query($koneksi, $sql);
            echo "<script> alert('TANGGAPAN BERHASIL DIKIRIM');window.location.href='laporan_petugas.php';</script>";
        }
    }
    ?>
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>