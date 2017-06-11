<?php
include'koneksi.php';
/*if (!empty($_POST[ISBN]) and
	!empty($_POST[judul]) and
	!empty($_POST[tgl_entri]) and  
	!empty($_POST[kode_jenis]) and
	!empty($_POST[kode_penulis]) and
	!empty($_POST[kode_penerbit]) 
	!empty($_POST[tahun_terbit]) and
	!empty($_POST[jumlah_buku]) and
	!empty($_POST[nomor_rak]) or 
	!empty($_GET[id]))
{and*/
//Skrip untuk form tambah
if ($_GET[skrip]==tambah) {
mysql_query("INSERT INTO buku
					(ISBN,
					judul,
					tgl_entri,
					kode_jenis,
					kode_penulis,
					kode_penerbit,
					tahun_terbit,
					jumlah_buku,
					nomor_rak) 
			 VALUES ('$_POST[ISBN]',
					 '$_POST[judul]',
					 '$_POST[tgl_entri]',
					 '$_POST[kode_jenis]',
					 '$_POST[kode_penulis]',
					 '$_POST[kode_penerbit]',
					 '$_POST[tahun_terbit]',
					 '$_POST[jumlah_buku]',
					 '$_POST[nomor_rak]')");
echo"<div class=tambah>Satu Buku Baru Telah Ditambahkan!</div>";
}
//Skrip untuk form ubah
if ($_GET[skrip]==ubah) {
mysql_query("UPDATE buku SET 
					ISBN='$_POST[ISBN]',
					judul='$_POST[judul]',
					tgl_entri='$_POST[tgl_entri]',
					kode_jenis='$_POST[kode_jenis]',
					kode_penulis='$_POST[kode_penulis]',
					kode_penerbit='$_POST[kode_penerbit]',
					tahun_terbit='$_POST[tahun_terbit]',
					jumlah_buku='$_POST[jumlah_buku]',
					nomor_rak='$_POST[nomor_rak]' 
			 WHERE kode_buku='$_POST[id]'");
echo"<div class=ubah>Perubahan Telah Disimpan!</div>";
}
//Skrip untuk aksi hapus
if ($_GET[skrip]==hapus) {
mysql_query("DELETE FROM buku WHERE kode_buku='$_GET[id]'");
echo"<div class=hapus>Satu Buku Baru Telah Dikeluarkan!</div>";
}

//Skrip untuk form deskripsi
if ($_GET[skrip]==deskripsi) {
$lokasi_file=$_FILES['gambar']['tmp_name'];
$nama_file=$_FILES['gambar']['name'];
move_uploaded_file($lokasi_file,"pratinjau/$nama_file");
mysql_query("INSERT INTO deskripsi_buku
					(kode_buku,
					gambar,
					keterangan) 
			 VALUES ('$_POST[kode_buku]',
					 '$nama_file',
					 '$_POST[keterangan]')");
echo"<div class=tambah>Satu Deskripsi Baru Telah Ditambahkan!</div>";
}
if ($_GET[skrip]==hapus_deskripsi) {
mysql_query("DELETE FROM deskripsi_buku WHERE kode_deskripsi='$_GET[id]'");
echo"<div class=hapus>Satu deskripsi Baru Telah Dikeluarkan!</div>";
}

/*} else {
echo"<div class=pesan>Melakukan Perubahan Data, ";
echo"Harap masukkan data dengan teliti!</div>";
}*/
?>