<?php
include 'koneksi.php';

$id_pengaduan	 	= $_GET['id_pengaduan'];
$result = mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'");
if ($result){ ?>
<script language="javascript">
alert('Pengaduan Berhasil Dibatalkan');
document.location.href = "laporan_masyarakat.php";
</script>
<?php
}else {
		trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $koneksi->$error, E_USER_ERROR);
}
?>