<?php
include 'koneksi.php';

$nik	 	= $_GET['nik'];
$result = mysqli_query($koneksi, "DELETE FROM masyarakat WHERE nik = '$nik'");
if ($result){ ?>
<script language="javascript">
alert('Masyarakat Berhasil Dihapus');
document.location.href = "data_masyarakat.php";
</script>
<?php
}else {
		trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $koneksi->$error, E_USER_ERROR);
}
?>