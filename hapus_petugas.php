<?php
include 'koneksi.php';

$id_petugas	 	= $_GET['id_petugas'];
$result = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas = '$id_petugas'");
if ($result){ ?>
<script language="javascript">
alert('Petugas Berhasil Dihapus');
document.location.href = "data_masyarakat.php";
</script>
<?php
}else {
		trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $koneksi->$error, E_USER_ERROR);
}
?>