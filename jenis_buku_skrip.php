<?php
include'koneksi.php';
if (!empty($_POST[nama_jenis]) or
	!empty($_POST[keterangan]) or 
	!empty($_GET[id]))
{
//Skrip untuk form tambah
if ($_GET[skrip]==tambah) {
mysql_query("INSERT INTO jenis_buku(nama_jenis,keterangan) 
			 VALUES ('$_POST[nama_jenis]','$_POST[keterangan]')");
echo"<div class=tambah>Satu Jenis Buku Baru Telah Ditambahkan!</div>";
}
//Skrip untuk form ubah
if ($_GET[skrip]==ubah) {
mysql_query("UPDATE jenis_buku SET nama_jenis='$_POST[nama_jenis]',keterangan='$_POST[keterangan]' 
			 WHERE kode_jenis='$_POST[id]'");
echo"<div class=ubah>Perubahan Telah Disimpan!</div>";
}
//Skrip untuk aksi hapus
if ($_GET[skrip]==hapus) {
mysql_query("DELETE FROM jenis_buku WHERE kode_jenis='$_GET[id]'");
echo"<div class=hapus>Satu Jenis Buku Baru Telah Dikeluarkan!</div>";
}

} else {
echo"<div class=pesan>Melakukan Perubahan Data, ";
echo"Harap masukkan data dengan teliti!</div>";
}
?>