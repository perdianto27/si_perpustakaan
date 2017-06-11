<?php
include'koneksi.php';
if(empty($_GET['opsi'])){$_GET['opsi']="";}else{}
if (!empty($_POST['nama_penerbit']) and
	!empty($_POST['alamat']) and
	!empty($_POST['telepon']) and  
	!empty($_POST['email']) or 
	!empty($_GET['skrip']))
{
//Skrip untuk form tambah
if ($_GET['skrip']=='tambah') {
mysql_query("INSERT INTO penerbit(nama_penerbit,alamat,telepon,email,keterangan) 
			 VALUES ('$_POST[nama_penerbit]','$_POST[alamat]','$_POST[telepon]','$_POST[email]','$_POST[keterangan]')");
echo"<div class=tambah>Satu penerbit Baru Telah Ditambahkan!</div>";
}
//Skrip untuk form ubah
if ($_GET['skrip']=='ubah') {
mysql_query("UPDATE penerbit SET nama_penerbit='$_POST[nama_penerbit]',alamat='$_POST[alamat]',telepon='$_POST[telepon]',email='$_POST[email]',keterangan='$_POST[keterangan]' 
			 WHERE kode_penerbit='$_POST[id]'");
echo"<div class=ubah>Perubahan Telah Disimpan!</div>";
}
//Skrip untuk aksi hapus
if ($_GET['skrip']=='hapus') {
mysql_query("DELETE FROM penerbit WHERE kode_penerbit='$_GET[id]'");
echo"<div class=hapus>Satu penerbit Baru Telah Dikeluarkan!</div>";
}

} else {
echo"<div class=pesan>Melakukan Perubahan Data, ";
echo"Harap masukkan data dengan teliti!</div>";
}
?>