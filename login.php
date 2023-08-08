<?php
include "koneksi.php";

session_start();
if (isset($_SESSION['username'])) {
    header("Location: tampilan_masyarakat.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM masyarakat WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['nik'] = $row['nik'];
        header("Location: tampilan_masyarakat.php");
    } else {
        $sql = "SELECT * FROM petugas WHERE username='$username' AND password='$password' AND level='admin'";
        $result = mysqli_query($koneksi, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['id_petugas'] = $row['id_petugas'];
            header("Location: tampilan_admin.php");
        } else {
            $sql = "SELECT * FROM petugas WHERE username='$username' AND password='$password' AND level='petugas'";
            $result = mysqli_query($koneksi, $sql);
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['username'] = $row['username'];
                $_SESSION['id_petugas'] = $row['id_petugas'];
                header("Location: tampilan_petugas.php");
            } else {
                echo "Username Tidak Ditemukan";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'head.php';
    ?>
</head>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="easter_egg.php"><img class="logo-icon me-2" src="assets/images/logo-app.png" alt="logo"></a></div>
                    <h2 class="auth-heading text-center mb-5">Log in to Portal</h2>
                    <div class="auth-form-container text-start">
                        <form action="" method="POST" name="myform">
                            <form class="auth-form login-form">
                                <div class="email mb-3">
                                    <label class="sr-only" for="signup-email">Username</label>
                                    <input id="signup-name" name="username" type="text" class="form-control signup-name" placeholder="Username" required="required">
                                </div>
                                <!--//form-group-->
                                <div class="password mb-3">
                                    <label class="sr-only" for="signin-password">Password</label>
                                    <input id="signin-password" name="password" type="password" class="form-control signin-password" placeholder="Password" required="required">
                                    <div class="extra mt-3 row justify-content-between">
                                        <div class="col-6">
                                        </div>
                                        <!--//col-6-->
                                        <div class="col-6">
                                        </div>
                                        <!--//col-6-->
                                    </div>
                                    <!--//extra-->
                                </div>
                                <!--//form-group-->
                                <div class="text-center">
                                    <button type="submit" name="submit" value="kirim" class="btn app-btn-primary w-100 theme-btn mx-auto">Log
                                        In</button>
                                </div>
                            </form>

                            <div class="auth-option text-center pt-5">No Account? Sign up <a class="text-link" href="signup.php">here</a>.</div>
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


</body>

</html>