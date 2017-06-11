<?php
include'koneksi.php';

//Skrip untuk form tambah
if (!empty($_POST[tgl_kembali]) and
	!empty($_POST[kode_buku]) and
	!empty($_POST[kode_anggota]) and  
	!empty($_POST[denda]) or 
	!empty($_GET[id]))
{
if ($_GET[skrip]==tambah) {
mysql_query("INSERT INTO peminjaman
					(tgl_pinjam,
					kode_buku,
					kode_anggota,
					denda) 
			 VALUES ('$_POST[tgl_kembali]',
					 '$_POST[kode_buku]',
					 '$_POST[kode_anggota]',
					 '$_POST[denda]')");
echo"<div class=tambah>Satu penerbit Baru Telah Ditambahkan!</div>";
}}

//Skrip untuk form status
if ($_GET[skrip]==status) {
mysql_query("UPDATE pengembalian SET 
					denda='$_POST[denda]'
			 WHERE kode_pinjam='$_POST[id]'");
echo"<div class=ubah>Perubahan Telah Disimpan!</div>";
}
//Skrip untuk aksi hapus
if ($_GET[skrip]==hapus) {
mysql_query("DELETE FROM pengembalian WHERE kode_pinjam='$_GET[id]'");
echo"<div class=hapus>Satu pngembali Telah Dihapus!</div>";
}
 
?>