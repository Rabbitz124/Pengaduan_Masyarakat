<?php
include 'koneksi.php';

    $no              = $_POST['no'];
    $nama            = $_POST['nama'];
    $jenis_kelamin   = $_POST['jenis_kelamin'];
    $kelas           = $_POST['kelas'];
    $jurusan         = $_POST['jurusan'];


	$sql="UPDATE nilai SET no='$no', nama='$nama', jenis_kelamin='$jenis_kelamin', kelas='$kelas', 
jurusan='$jurusan'";
	$query = mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));
	?>

<script language="javascript">
alert('Data Berhasil Diedit');
document.location.href = "view.php";
</script>