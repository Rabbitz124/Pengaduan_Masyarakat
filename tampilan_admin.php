<html lang="en">

<head>
    <?php
    include 'head.php';
    include 'koneksi.php';

    session_start();
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $id_petugas = $_SESSION['id_petugas'];
        $result = mysqli_query($koneksi, "select * from petugas WHERE 'id_petugas' = $id_petugas");
        $row = mysqli_fetch_assoc($result);
        $get = mysqli_query($koneksi, "SELECT * FROM `pengaduan`");
        $total = mysqli_num_rows($get);
        $getb = mysqli_query($koneksi, "SELECT * FROM `pengaduan` WHERE status='0'");
        $belum = mysqli_num_rows($getb);
        $getp = mysqli_query($koneksi, "SELECT * FROM `pengaduan` WHERE status='proses'");
        $proses = mysqli_num_rows($getp);
        $gets = mysqli_query($koneksi, "SELECT * FROM `pengaduan` WHERE status='selesai'");
        $selesai = mysqli_num_rows($gets);
    ?>
</head>

<body>
    <?php
        include 'nav_admin.php';
    ?>
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Home</h1>

                <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                    <div class="inner">
                        <div class="app-card-body p-3 p-lg-4">
                            <h3 class="mb-3">Selamat datang, Admin <?= $username ?>!</h3>
                            <div class="row gx-5 gy-3">
                                <div class="col-12 col-lg-9">

                                    <div>Coco adalah website pengaduan masyarakat, masyarakat yang ingin mengadu harap
                                        memberikan aduannya di kolom <b>isi pengaduan</b></div>
                                </div>
                            </div>
                            <!--//row-->
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!--//app-card-body-->

                    </div>
                    <!--//inner-->
                </div>
                <!--//app-card-->

                <div class="row g-4 mb-4">
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Total Pengaduan</h4>
                                <div class="stats-figure"><?= $total ?></div>
                                <div class="stats-meta text-success">
                                </div>
                            </div>
                            <!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//col-->

                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Belum Diverifikasi</h4>
                                <div class="stats-figure"><?= $belum ?></div>
                                <div class="stats-meta text-success">
                                </div>
                            </div>
                            <!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//col-->
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Sudah Diverifikasi</h4>
                                <div class="stats-figure"><?= $proses ?></div>
                                <div class="stats-meta">
                                </div>
                            </div>
                            <!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//col-->
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Sudah ditanggapi</h4>
                                <div class="stats-figure"><?= $selesai ?></div>
                                <div class="stats-meta"></div>
                            </div>
                            <!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//col-->
                </div>
                <!--//row-->
                <!--//col-auto-->
            </div>
            <!--//col-->
        </div>
        <!--//row-->

    </div>
    <!--//container-fluid-->
    </div>
    <!--//app-content-->

<?php
    }
    include 'footer.php';
?>
<!--//app-footer-->

</div>
<!--//app-wrapper-->


<!-- Javascript -->
<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Charts JS -->
<script src="assets/plugins/chart.js/chart.min.js"></script>
<script src="assets/js/index-charts.js"></script>

<!-- Page Specific JS -->
<script src="assets/js/app.js"></script>


</body>

</html>