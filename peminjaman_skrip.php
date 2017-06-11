<?php
include'koneksi.php';

//Skrip untuk form tambah
if (!empty($_POST[tgl_pinjam]) and
	!empty($_POST[kode_buku]) and
	!empty($_POST[kode_anggota]) and  
	!empty($_POST[pengembalian]) or 
	!empty($_GET[id]))
{
if ($_GET[skrip]==tambah) {
mysql_query("INSERT INTO peminjaman
					(tgl_pinjam,
					kode_buku,
					kode_anggota,
					pengembalian) 
			 VALUES ('$_POST[tgl_pinjam]',
					 '$_POST[kode_buku]',
					 '$_POST[kode_anggota]',
					 '$_POST[pengembalian]')");
echo"<div class=tambah>Satu penerbit Baru Telah Ditambahkan!</div>";
}}

//Skrip untuk form status
if ($_GET[skrip]==status) {
mysql_query("UPDATE peminjaman SET 
					pengembalian='$_POST[pengembalian]'
			 WHERE kode_pinjam='$_POST[id]'");
echo"<div class=ubah>Perubahan Telah Disimpan!</div>";
}
//Skrip untuk aksi hapus
if ($_GET[skrip]==hapus) {
mysql_query("DELETE FROM peminjaman WHERE kode_pinjam='$_GET[id]'");
echo"<div class=hapus>Satu peminjam Telah Dihapus!</div>";
}
 
?>