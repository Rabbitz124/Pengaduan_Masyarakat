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
                <a class="flex-sm-fill text-sm-center nav-link active" id="semua-tab" data-bs-toggle="tab" href="#semua"
                    role="tab" aria-controls="semua" aria-selected="true">Semua</a>
            </nav>
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="semua" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <form action="" method="POST" name="myform">
                                    <div class="email mb-3">
                                        <label class="sr-only" for="signup-email">Nama</label>
                                        <input id="signup-name" name="nama_petugas" type="text"
                                            class="form-control signup-name" placeholder="Nama" required="required">
                                    </div>
                                    <div class="email mb-3">
                                        <label class="sr-only" for="signup-email">Username</label>
                                        <input id="signup-name" name="username" type="text"
                                            class="form-control signup-name" placeholder="Username" required="required">
                                    </div>
                                    <div class="password mb-3">
                                        <label class="sr-only" for="signup-password">Password</label>
                                        <input id="signup-password" name="password" type="password"
                                            class="form-control signup-password" placeholder="Buat password"
                                            required="required">
                                    </div>
                                    <div class="email mb-3">
                                        <label class="sr-only" for="signup-email">No Telp</label>
                                        <input id="signup-name" name="telp" type="text" class="form-control signup-name"
                                            placeholder="No Telp" required="required">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value='admin' name="level"
                                            id="level">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Admin
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value='petugas' name="level"
                                            id="level" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Petugas
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="submit" value="kirim"
                                            class="btn app-btn-primary w-100 theme-btn mx-auto">Sign
                                            Up</button>
                                    </div>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include 'footer.php';
            ?>
        </div>
        <script src="assets/plugins/popper.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>


        <!-- Page Specific JS -->
        <script src="assets/js/app.js"></script>
    </div>
    </div>
    <?php
    include "koneksi.php";
    if (isset($_POST['submit'])) {
        $nama_petugas = $_POST['nama_petugas'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $telp = $_POST['telp'];
        $level = $_POST['level'];

        $sql = "INSERT INTO petugas VALUES (NULL,'$nama_petugas','$username','$password','$telp','$level')";
        $query = mysqli_query($koneksi, $sql);

    ?><script language="javascript">
    alert('Data Berhasil Disimpan');
    document.location.href = "data_masyarakat.php";
    </script>
    <?php };
    ?>

</body>

</html>