<?php
//menyisipkan koneksi dan skrip
include'koneksi.php';
include'jenis_buku_skrip.php';
?>

<?php
// Menampilkan DATA JENIS BUKU
if (empty($_GET[aksi])){ 
  $no=1;
  $lihat=mysql_query("SELECT * FROM jenis_buku Order By kode_jenis");
  $jml_data=mysql_num_rows($lihat);
?>
  <h3 align="center">
  <img class="gambar_menu" src="ikon/jenis_buku.png" align="absmiddle" />
  DATA JENIS BUKU</h3>
  <table border="0" class="judul" align="center">
   <tr class="judul" align="center">
    <td class="nomor">No</td>
    <td class="data">Nama Jenis Buku</td>
    <td class="data">Keterangan</td>
    <td class="data">Opsi</td>
    <td width="15">&nbsp;</td>
   </tr>
  </table>

  <div class="data">
  <table border="0" class="data" align="center">
  <?php while ($l=mysql_fetch_array($lihat)){ ?>	
   <tr class="data">
    <td class="nomor"><?php echo"$no";?></td>
    <td class="data"><?php echo"$l[nama_jenis]";?></td>
    <td class="data"><?php echo"$l[keterangan]";	?></td>
    <td class="data" align="center">
    <img src="ikon/ubah.png" width="20" height="20" 
    	 align="absmiddle" />
	<a href="?halaman=jenis_buku&opsi=ubah&id=<?php echo"$l[kode_jenis]"; ?>">
	Ubah</a> | 
	<img src="ikon/hapus.png" width="20" height="20"
    	 align="absmiddle" /> 
	<a href="?halaman=jenis_buku&skrip=hapus&id=<?php echo"$l[kode_jenis]";?>" 
   	   onClick="return hapus();">
	Hapus</a>
	</td>
   </tr>
   <?php $no++; }	?>
  </table>
  </div>

  <table border="0" class="status" align="center">
   <tr>
    <td width="200">Jumlah : <?php echo"$jml_data";?> jenis_buku</td>
    <td align="center" class="data">
    <a href="?halaman=jenis_buku&opsi=tambah">
    <img src="ikon/tambah.png" width="20" height="20" 
    	 align="absmiddle" />
	Tambah</a> | 
	<a href="?halaman=jenis_buku&opsi=ekspor">
	<img src="ikon/ekspor.png" width="20" height="20" 
    	 align="absmiddle" />
	Ekspor</a>
    </td>
   </tr>
  </table>
  <br>
<?php }	?>

<?php
// Form Untuk Menambahkan jenis_buku Baru
if ($_GET[opsi]==tambah){ ?>
 <form action="?halaman=jenis_buku&skrip=tambah" method="post">
  <table border="0" align="center">
   <tr>
	<td>Jenis Buku </td>
	<td><input type="text" name="nama_jenis" placeholder="Jenis Buku"></td>
   </tr>
   <tr>
	<td>Keterangan</td>
	<td><textarea name="keterangan" placeholder="Keterangan"></textarea></td>
   </tr>
   <tr>
	<td colspan="2">
	<input type="submit" value="Buat Baru">
	<input type="button" value="Batal" onclick="self.history.back();">	</td>
   </tr>
  </table>
</form>
<?php } ?>

<?php
// Form Untuk Mengubah DATA JENIS BUKU
if ($_GET[opsi]==ubah){
 $ubah=mysql_query("SELECT * FROM jenis_buku WHERE kode_jenis='$_GET[id]'");
 while ($u=mysql_fetch_array($ubah)){ ?>
 <form action="?halaman=jenis_buku&skrip=ubah" method="post">
  <table border="0" align="center">
   <input type="hidden" name="id" value="<?php echo"$u[kode_jenis]"; ?>">
   <tr>
	<td>Jenis Buku </td>
	<td><input type="text" name="nama_jenis"  value="<?php echo"$u[nama_jenis]"; ?>"></td>
   </tr>
   <tr>
	<td>Keterangan</td>
	<td><textarea name="keterangan"><?php echo"$u[keterangan]"; ?></textarea></td>
   </tr>
   <tr>
	<td colspan="2">
	 <input type="submit" value="Simpan">
	 <input type="button" value="Batal" onclick="self.history.back();"/></td>
   </tr>
  </table>
</form>
<?php } } ?>

<?php
// Form Untuk Mengekspor DATA JENIS BUKU
if ($_GET[opsi]==ekspor){ ?>
 <form action="jenis_buku_ekspor.php" method="post" target="_blank">
  <table align="center">
   <tr>
	<td>
	<select name="ekspor">
		<option value="cetak">Cetak Laporan</option>
		<option value="unduh"><img src="ikon/unduh.png" />Unduh Laporan</option>
	</select>
	</td>
	<td><input type="submit" value="Ekspor Data Laporan" /></td>
   </tr>
  </table>
 </form>
<?php } ?>