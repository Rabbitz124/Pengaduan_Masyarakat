<html lang="en">

<head>
    <?php
    include 'head.php';
    ?>
</head>

<body class="app">
    <?php
    include 'nav_petugas.php';
    include 'koneksi.php';

    $get = mysqli_query($koneksi, "SELECT * FROM `pengaduan`");
    $total = mysqli_num_rows($get);
    $getb = mysqli_query($koneksi, "SELECT * FROM `pengaduan` WHERE status='0'");
    $belum = mysqli_num_rows($getb);
    $getp = mysqli_query($koneksi, "SELECT * FROM `pengaduan` WHERE status='proses'");
    $proses = mysqli_num_rows($getp);
    $gets = mysqli_query($koneksi, "SELECT * FROM `pengaduan` WHERE status='selesai'");
    $selesai = mysqli_num_rows($gets);

    ?>

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">



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
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <!--//col-->
                        </div>
                        <!--//row-->
                    </div>
                    <!--//table-utilities-->
                </div>
                <!--//col-auto-->
            </div>
            <!--//row-->


            <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                <a class="flex-sm-fill text-sm-center nav-link active" id="semua-tab" data-bs-toggle="tab" href="#semua" role="tab" aria-controls="semua" aria-selected="true">Semua</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="belum-tab" data-bs-toggle="tab" href="#belum" role="tab" aria-controls="belum" aria-selected="false">belum</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="proses-tab" data-bs-toggle="tab" href="#proses" role="tab" aria-controls="proses" aria-selected="false">Proses</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="selesai-tab" data-bs-toggle="tab" href="#selesai" role="tab" aria-controls="selesai" aria-selected="false">Selesai</a>
            </nav>


            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="semua" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">STATUS</th>
                                            <th class="cell">TGL</th>
                                            <th class="cell">LAPORAN</th>
                                            <th class="cell">NIK</th>
                                            <th class="cell">BUKTI</th>
                                            <th class="cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $semua = mysqli_query($koneksi, "SELECT * FROM pengaduan");
                                        while ($row1 = mysqli_fetch_assoc($semua)) {
                                        ?>
                                            <tr>
                                                <td class="cell">
                                                    <?php $status = $row1['status'];
                                                    if ($status == 0) { ?>
                                                        <a class="badge bg-primary" href="setuju.php?id_pengaduan=<?php echo $row1['id_pengaduan'] ?>">Setuju</a>
                                                        <a class="badge bg-danger" href="tolak.php?id_pengaduan=<?php echo $row1['id_pengaduan'] ?>">Tolak</a>
                                                    <?php } else if ($status == 'proses') { ?>
                                                        <a class="badge bg-warning" href="tanggapan.php?id_pengaduan=<?php echo $row1['id_pengaduan'] ?>">Tanggapan</a>
                                                    <?php } else { ?>
                                                        <a class="badge bg-success" href="lihat_tanggapan_petugas.php?id_pengaduan=<?php echo $row1['id_pengaduan'] ?>">Lihat
                                                            Tanggapan</a>
                                                    <?php } ?>
                                                </td>
                                                <td class="cell"><span class="truncate"><?php echo $row1['tgl_pengaduan']; ?></span></td>
                                                <td class="cell"><?php echo $row1['isi_laporan']; ?></td>
                                                <td class="cell"><span><?php echo $row1['nik']; ?></span></td>
                                                <td class="cell"><img src="img\<?php echo $row1['foto']; ?>" height="100" alt="Bukti" /></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--//table-responsive-->

                        </div>
                        <!--//app-card-body-->
                    </div>
                </div>
                <!--//tab-pane-->

                <div class="tab-pane fade" id="belum" role="tabpanel" aria-labelledby="belum-tab">
                    <div class="app-card app-card-orders-table mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">

                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">STATUS</th>
                                            <th class="cell">TGL</th>
                                            <th class="cell">LAPORAN</th>
                                            <th class="cell">NIK</th>
                                            <th class="cell">BUKTI</th>
                                            <th class="cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $belum = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='0'");
                                        while ($row2 = mysqli_fetch_assoc($belum)) {
                                        ?>
                                            <tr>
                                                <td class="cell">
                                                    <?php $status = $row2['status'];
                                                    if ($status == 0) { ?>
                                                        <a class="badge bg-primary" href="setuju.php?id_pengaduan=<?php echo $row2['id_pengaduan'] ?>">Setuju</a>
                                                        <a class="badge bg-danger" href="tolak.php?id_pengaduan=<?php echo $row2['id_pengaduan'] ?>">Tolak</a>
                                                    <?php } else if ($status == 'proses') { ?>
                                                        <a class="badge bg-warning" href="tanggapan.php?id_pengaduan=<?php echo $row2['id_pengaduan'] ?>">Tanggapan</a>
                                                    <?php } else { ?>
                                                        <a class="badge bg-success" href="lihat_tanggapan_petugas.php?id_pengaduan=<?php echo $row2['id_pengaduan'] ?>">Lihat
                                                            Tanggapan</a>
                                                    <?php } ?>
                                                </td>
                                                <td class="cell"><span class="truncate"><?php echo $row2['tgl_pengaduan']; ?></span></td>
                                                <td class="cell"><?php echo $row2['isi_laporan']; ?></td>
                                                <td class="cell"><span><?php echo $row2['nik']; ?></span></td>
                                                <td class="cell"><img src="img\<?php echo $row2['foto']; ?>" height="100" alt="Bukti" /></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--//table-responsive-->
                        </div>
                        <!--//app-card-body-->
                    </div>
                    <!--//app-card-->
                </div>
                <!--//tab-pane-->

                <div class="tab-pane fade" id="proses" role="tabpanel" aria-labelledby="proses-tab">
                    <div class="app-card app-card-orders-table mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">STATUS</th>
                                            <th class="cell">TGL</th>
                                            <th class="cell">LAPORAN</th>
                                            <th class="cell">NIK</th>
                                            <th class="cell">BUKTI</th>
                                            <th class="cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $proses = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='proses'");
                                        while ($row3 = mysqli_fetch_assoc($proses)) {
                                        ?>
                                            <tr>
                                                <td class="cell">
                                                    <?php $status = $row3['status'];
                                                    if ($status == 0) { ?>
                                                        <a class="badge bg-primary" href="setuju.php?id_pengaduan=<?php echo $row3['id_pengaduan'] ?>">Setuju</a>
                                                        <a class="badge bg-danger" href="tolak.php?id_pengaduan=<?php echo $row3['id_pengaduan'] ?>">Tolak</a>
                                                    <?php } else if ($status == 'proses') { ?>
                                                        <a class="badge bg-warning" href="tanggapan.php?id_pengaduan=<?php echo $row3['id_pengaduan'] ?>">Tanggapan</a>
                                                    <?php } else { ?>
                                                        <a class="badge bg-success" href="lihat_tanggapan_petugas.php?id_pengaduan=<?php echo $row3['id_pengaduan'] ?>">Lihat
                                                            Tanggapan</a>
                                                    <?php } ?>
                                                </td>
                                                <td class="cell"><span class="truncate"><?php echo $row3['tgl_pengaduan']; ?></span></td>
                                                <td class="cell"><?php echo $row3['isi_laporan']; ?></td>
                                                <td class="cell"><span><?php echo $row3['nik']; ?></span></td>
                                                <td class="cell"><img src="img\<?php echo $row3['foto']; ?>" height="100" alt="Bukti" /></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--//table-responsive-->
                        </div>
                        <!--//app-card-body-->
                    </div>
                    <!--//app-card-->
                </div>
                <!--//tab-pane-->
                <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="selesai-tab">
                    <div class="app-card app-card-orders-table mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">STATUS</th>
                                            <th class="cell">TGL</th>
                                            <th class="cell">LAPORAN</th>
                                            <th class="cell">NIK</th>
                                            <th class="cell">BUKTI</th>
                                            <th class="cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $selesai = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='selesai'");
                                        while ($row4 = mysqli_fetch_assoc($selesai)) {
                                        ?>
                                            <tr>
                                                <td class="cell">
                                                    <?php $status = $row4['status'];
                                                    if ($status == 0) { ?>
                                                        <a class="badge bg-primary" href="setuju.php?id_pengaduan=<?php echo $row4['id_pengaduan'] ?>">Setuju</a>
                                                        <a class="badge bg-danger" href="tolak.php?id_pengaduan=<?php echo $row4['id_pengaduan'] ?>">Tolak</a>
                                                    <?php } else if ($status == 'proses') { ?>
                                                        <a class="badge bg-warning" href="tanggapan.php?id_pengaduan=<?php echo $row4['id_pengaduan'] ?>">Tanggapan</a>
                                                    <?php } else { ?>
                                                        <a class="badge bg-success" href="lihat_tanggapan_petugas.php?id_pengaduan=<?php echo $row4['id_pengaduan'] ?>">Lihat
                                                            Tanggapan</a>
                                                    <?php } ?>
                                                </td>
                                                <td class="cell"><span class="truncate"><?php echo $row4['tgl_pengaduan']; ?></span></td>
                                                <td class="cell"><?php echo $row4['isi_laporan']; ?></td>
                                                <td class="cell"><span><?php echo $row4['nik']; ?></span></td>
                                                <td class="cell"><img src="img\<?php echo $row4['foto']; ?>" height="100" alt="Bukti" /></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--//table-responsive-->
                        </div>
                        <!--//app-card-body-->
                    </div>
                    <!--//app-card-->
                </div>
                <!--//tab-pane-->
            </div>
            <!--//tab-content-->



        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->

    <?php
    include 'footer.php';
    ?>
    <!--//app-footer-->

    </div>
    <!--//app-wrapper-->


    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>


    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

</body>

</html>