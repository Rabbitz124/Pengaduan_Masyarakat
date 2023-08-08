<!DOCTYPE html>
<html lang="en">

<head>
    <?php
include 'head.php';
?>
</head>

<body class="app app-signup p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="easter_egg.php"><img
                                class="logo-icon me-2" src="assets/images/logo-app.png" alt="logo"></a></div>
                    <h2 class="auth-heading text-center mb-4">Sign up to COCO</h2>
                    <form action="" method="POST" name="myform">
                        <div class="auth-form-container text-start mx-auto">
                            <form class="auth-form auth-signup-form">
                                <div class="email mb-3">
                                    <label class="sr-only" for="signup-email">NIK</label>
                                    <input id="signup-name" name="nik" type="text" class="form-control signup-name"
                                        placeholder="NIK" required="required">
                                </div>
                                <div class="email mb-3">
                                    <label class="sr-only" for="signup-email">Nama</label>
                                    <input id="signup-name" name="nama" type="text" class="form-control signup-name"
                                        placeholder="Nama" required="required">
                                </div>
                                <div class="email mb-3">
                                    <label class="sr-only" for="signup-email">Username</label>
                                    <input id="signup-name" name="username" type="text" class="form-control signup-name"
                                        placeholder="Username" required="required">
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
                                <div class="extra mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="RememberPassword">
                                        <label class="form-check-label" for="RememberPassword">
                                            I agree to Portal's <a href="#" class="app-link">Terms of Service</a> and <a
                                                href="#" class="app-link">Privacy Policy</a>.
                                        </label>
                                    </div>
                                </div>
                                <!--//extra-->

                                <div class="text-center">
                                    <button type="submit" name="submit" value="kirim"
                                        class="btn app-btn-primary w-100 theme-btn mx-auto">Sign
                                        Up</button>
                                </div>
                            </form>
                            <!--//auth-form-->

                            <div class="auth-option text-center pt-5">Already have an account? <a class="text-link"
                                    href="login.php">Log in</a></div>
                        </div>
                        <!--//auth-form-container-->



                </div>
                <!--//auth-body-->

                <?php
include 'footer.php';
?>
                <!--//app-auth-footer-->
            </div>
            <!--//flex-column-->
        </div>
        <!--//auth-main-col-->
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder">
            </div>
            <div class="auth-background-mask"></div>
            <div class="auth-background-overlay p-3 p-lg-5">
                <div class="d-flex flex-column align-content-end h-100">
                    <div class="h-100"></div>
                </div>
            </div>
            <!--//auth-background-overlay-->
        </div>
        <!--//auth-background-col-->

    </div>
    <!--//row-->

    <?php

    include "koneksi.php";
    
    if (isset($_POST['submit'])) {
        $nik = $_POST['nik'];

		$ceknik = mysqli_query($koneksi,"SELECT * FROM masyarakat where nik=$nik");
		$ceknik1 = mysqli_fetch_assoc($ceknik);
		if ($ceknik1>0){
			echo "<script> alert('NIK SUDAH DIGUNAKAN');window.location.href='signup.php';</script>";
		}
		else {

    if (isset($_POST['submit'])) {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $telp = $_POST['telp'];

        $sql = "INSERT INTO masyarakat VALUES ('$nik', '$nama', '$username','$password','$telp')";
        $query = mysqli_query($koneksi, $sql);

?><script language="javascript">
    alert('Data Berhasil Disimpan');
    document.location.href = "login.php";
    </script>
    <?php }}}
;   
?>

</body>

</html>