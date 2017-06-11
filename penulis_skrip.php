<?php
include'koneksi.php';
if (!empty($_POST[nama_penulis]) and
	!empty($_POST[alamat]) and 
	!empty($_POST[email]) or 
	!empty($_GET[id]))
{
//Skrip untuk form tambah
if ($_GET[skrip]==tambah) {
mysql_query("INSERT INTO penulis(nama_penulis,alamat,email,keterangan) 
			 VALUES ('$_POST[nama_penulis]','$_POST[alamat]','$_POST[email]','$_POST[keterangan]')");
echo"<div class=tambah>Satu penulis Baru Telah Ditambahkan!</div>";
}
//Skrip untuk form ubah
if ($_GET[skrip]==ubah) {
mysql_query("UPDATE penulis SET nama_penulis='$_POST[nama_penulis]',alamat='$_POST[alamat]',email='$_POST[email]',keterangan='$_POST[keterangan]' 
			 WHERE kode_penulis='$_POST[id]'");
echo"<div class=ubah>Perubahan Telah Disimpan!</div>";
}
//Skrip untuk aksi hapus
if ($_GET[skrip]==hapus) {
mysql_query("DELETE FROM penulis WHERE kode_penulis='$_GET[id]'");
echo"<div class=hapus>Satu penulis Baru Telah Dikeluarkan!</div>";
}

} else {
echo"<div class=pesan>Melakukan Perubahan Data, ";
echo"Harap masukkan data dengan teliti!</div>";
}
?>