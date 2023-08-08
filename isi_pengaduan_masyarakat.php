<html lang="en">

<head>
    <?php
    include 'head.php';
    include 'koneksi.php';
    session_start();
    $nik = $_SESSION['nik'];
    $result = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE nik ='$nik'");
    $row = mysqli_fetch_array($result);
    $nik = $row['nik'];
    ?>
</head>

<body class="app">
    <?php
    include 'nav_masyarakat.php';
    ?>

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <h1 class="app-page-title">Pengaduan</h1>
                <hr class="mb-4">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title">Isi Pengaduan</h3>
                        <div class="section-intro">Pastikan Pengaduan/laporan yang Anda Buat Bisa
                            Dipertanggungjawabkan</div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">

                            <div class="app-card-body">
                                <form class="settings-form" action="" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="setting-input-1" class="form-label">Isi Laporan<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                                                    <circle cx="8" cy="4.5" r="1" />
                                                </svg></span></label>
                                        <input type="text" name="isi" class="form-control" id="setting-input-1" placeholder="Isikan Laporan Foto" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="setting-input-2" class="form-label">Bukti</label>
                                        <br> <input type="file" name="filea" /> </br>
                                    </div>

                                    <button type="submit" name="submit" class="btn app-btn-primary">Kirim
                                        Laporan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
            </div>
        </div>
        <?php
        include 'koneksi.php';


        if (isset($_POST['submit'])) {

            $isi_laporan = $_POST['isi'];
            $ekstensi_diperbolehkan    = array('png', 'jpg');
            $nama = $_FILES['filea']['name'];
            $x = explode('.', $nama);
            $ekstensi = strtolower(end($x));
            $ukuran    = $_FILES['filea']['size'];
            $file_tmp = $_FILES['filea']['tmp_name'];

            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 9999999999) {
                    move_uploaded_file($file_tmp, 'img/' . $nama);
                }
            }

            $tgl_pengaduan = date('y-m-d');

            $sql = "INSERT INTO pengaduan VALUES (NULL,'$tgl_pengaduan','$nik','$isi_laporan','$nama','0')";
            $query = mysqli_query($koneksi, $sql);

            if ($query) {
                echo "<script> alert('LAPORAN BERHASIL DIKIRIM');window.location.href='tampilan_masyarakat.php';</script>";
            }
        }
        ?>
    </div>
    <!--//app-card-body-->

    </div>
    <!--//app-card-->
    </div>
    </div>
    <!--//row-->



    </div>
    <!--//app-wrapper-->


    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

</body>

</html>