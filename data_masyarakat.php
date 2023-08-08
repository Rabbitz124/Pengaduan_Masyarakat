<html lang="en">

<head>
    <?php
    include 'head.php';
    include 'koneksi.php';
    ?>
</head>

<body>
    <?php
    include 'nav_admin.php';
    ?>
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">


            <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                <a class="flex-sm-fill text-sm-center nav-link active" id="semua-tab" data-bs-toggle="tab" href="#semua" role="tab" aria-controls="semua" aria-selected="true">Semua</a>
            </nav>


            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="semua" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">ID</th>
                                            <th class="cell">NAMA</th>
                                            <th class="cell">USERNAME</th>
                                            <th class="cell">TELP</th>
                                            <th class="cell">HAPUS</th>
                                            <th class="cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $resulta = mysqli_query($koneksi, "SELECT * FROM petugas WHERE level='admin'");
                                        while ($rowa = mysqli_fetch_assoc($resulta)) {
                                        ?>
                                            <tr>
                                                <td class="cell"><span class="badge bg-danger"><?php echo $rowa['id_petugas']; ?></span>
                                                </td>
                                                <td class="cell"><span class="truncate"><?php echo $rowa['nama_petugas']; ?></span>
                                                </td>
                                                <td class="cell"><?php echo $rowa['username']; ?></td>
                                                <td class="cell"><span><?php echo $rowa['telp']; ?></span></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                            </div>
                            <div class="table-responsive">
                                <tbody>
                                    <?php
                                    $resultb = mysqli_query($koneksi, "SELECT * FROM petugas WHERE level='petugas'");
                                    while ($rowb = mysqli_fetch_assoc($resultb)) {
                                    ?>
                                        <tr>
                                            <td class="cell"><span class="badge bg-warning"><?php echo $rowb['id_petugas']; ?></span>
                                            </td>
                                            <td class="cell"><span class="truncate"><?php echo $rowb['nama_petugas']; ?></span>
                                            </td>
                                            <td class="cell"><?php echo $rowb['username']; ?></td>
                                            <td class="cell"><span><?php echo $rowb['telp']; ?></span></td>
                                            <td><a class="badge bg-danger" href="hapus_petugas.php?id_petugas=<?php echo $rowb['id_petugas'] ?>">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </div>
                            <div class="table-responsive">
                                <tbody>
                                    <?php
                                    $resultc = mysqli_query($koneksi, "SELECT * FROM masyarakat");
                                    while ($rowc = mysqli_fetch_assoc($resultc)) {
                                    ?>
                                        <tr>
                                            <td class="cell"><span class="badge bg-success"><?php echo $rowc['nik']; ?></span>
                                            </td>
                                            <td class="cell"><span class="truncate"><?php echo $rowc['nama']; ?></span>
                                            </td>
                                            <td class="cell"><?php echo $rowc['username']; ?></td>
                                            <td class="cell"><span><?php echo $rowc['telp']; ?></span></td>
                                            <td><a class="badge bg-danger" href="hapus_masyarakat.php?nik=<?php echo $rowc['nik'] ?>">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                </table>
                                <br>
                            </div>
                            <a class="badge bg-primary" href="tambah_petugas.php">Tambah Petugas</a>
                        </div>
                        <!--//app-card-body-->
                    </div>
                    <!--//app-card-->
                    <!--//app-pagination-->

                </div>
                <!--//tab-pane-->

                <!--//tab-pane-->
            </div>
            <!--//tab-content-->
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



    </div>
    <!--//container-fluid-->
    </div>


</body>

</html>