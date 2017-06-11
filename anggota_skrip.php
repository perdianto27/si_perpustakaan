<?php
include'koneksi.php';
if (!empty($_POST[nama_anggota]) and
	!empty($_POST[alamat]) and
	!empty($_POST[telepon]) and  
	!empty($_POST[tgl_masuk]) or 
	!empty($_GET[id]))
{
//Skrip untuk form tambah
if ($_GET[skrip]==tambah) {
mysql_query("INSERT INTO anggota(nama_anggota,alamat,telepon,tgl_masuk,keterangan) 
			 VALUES ('$_POST[nama_anggota]','$_POST[alamat]','$_POST[telepon]','$_POST[tgl_masuk]','$_POST[keterangan]')");
echo"<div class=tambah>Satu anggota Baru Telah Ditambahkan!</div>";
}
//Skrip untuk form ubah
if ($_GET[skrip]==ubah) {
mysql_query("UPDATE anggota SET nama_anggota='$_POST[nama_anggota]',alamat='$_POST[alamat]',telepon='$_POST[telepon]',tgl_masuk='$_POST[tgl_masuk]',keterangan='$_POST[keterangan]' 
			 WHERE kode_anggota='$_POST[id]'");
echo"<div class=ubah>Perubahan Telah Disimpan!</div>";
}
//Skrip untuk aksi hapus
if ($_GET[skrip]==hapus) {
mysql_query("DELETE FROM anggota WHERE kode_anggota='$_GET[id]'");
echo"<div class=hapus>Satu anggota Baru Telah Dikeluarkan!</div>";
}

} else {
echo"<div class=pesan>Melakukan Perubahan Data, ";
echo"Harap masukkan data dengan teliti!</div>";
}
?>