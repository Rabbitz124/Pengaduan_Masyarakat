<?php
    include 'koneksi.php';

        $id_pengaduan		= mysqli_real_escape_string($koneksi,$_GET['id_pengaduan']);
        $sql = "SELECT * FROM pengaduan WHERE id_pengaduan='$id_pengaduan'";
        $query = mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));
		          if(mysqli_num_rows($query) > 0){
			        $row = mysqli_fetch_array($query);
		          }

                  $sql = "UPDATE `pengaduan` SET `status` = 'proses' WHERE `pengaduan`.`id_pengaduan` = $id_pengaduan;";
                  $query = mysqli_query($koneksi, $sql);
              ?>

<script language="javascript">
alert('Data Berhasil Disetujui');
document.location.href = "laporan_petugas.php";
</script>