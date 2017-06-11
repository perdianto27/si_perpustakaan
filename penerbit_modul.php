<?php
//menyisipkan koneksi dan skrip
include'koneksi.php';
include'penerbit_skrip.php';
?>

<?php
// Menampilkan DATA PENULIS
if (empty($_GET[aksi])){ 
  $no=1;
  $lihat=mysql_query("SELECT * FROM penerbit Order By kode_penerbit");
  $jml_data=mysql_num_rows($lihat);
?>
  <h3 align="center">
  <img class="gambar_menu" src="ikon/penerbit.png" align="absmiddle" />
  DATA PENERBIT</h3>
  <table border="0" class="judul" align="center">
   <tr class="judul" align="center">
    <td class="nomor">No</td>
    <td class="data">Nama penerbit</td>
    <td class="data">Email</td>
    <td class="data">Opsi</td>
    <td width="15">&nbsp;</td>
   </tr>
  </table>

  <div class="data">
  <table border="0" class="data" align="center">
  <?php while ($l=mysql_fetch_array($lihat)){ ?>	
   <tr class="data">
    <td class="nomor"><?php echo"$no";?></td>
    <td class="data"><?php echo"$l[nama_penerbit]";?></td>
    <td class="data"><?php echo"$l[email]";	?></td>
    <td class="data" align="center">
    <img src="ikon/ubah.png" width="20" height="20" 
    	 align="absmiddle" />
	<a href="?halaman=penerbit&opsi=ubah&id=<?php echo"$l[kode_penerbit]"; ?>">
	Ubah</a> | 
	<img src="ikon/hapus.png" width="20" height="20"
    	 align="absmiddle" /> 
	<a href="?halaman=penerbit&skrip=hapus&id=<?php echo"$l[kode_penerbit]";?>" 
   	   onClick="return hapus();">
	Hapus</a>
	</td>
   </tr>
   <?php $no++; }	?>
  </table>
  </div>

  <table border="0" class="status" align="center">
   <tr>
    <td width="200">Jumlah : <?php echo"$jml_data";?> penerbit</td>
    <td align="center" class="data">
    <a href="?halaman=penerbit&opsi=tambah">
    <img src="ikon/tambah.png" width="20" height="20" 
    	 align="absmiddle" />
	Tambah</a> | 
	<a href="?halaman=penerbit&opsi=ekspor">
	<img src="ikon/ekspor.png" width="20" height="20" 
    	 align="absmiddle" />
	Ekspor</a>
    </td>
   </tr>
  </table>
  <br>
<?php }	?>

<?php
// Form Untuk Menambahkan penerbit Baru
if ($_GET[opsi]==tambah){ ?>
 <form action="?halaman=penerbit&skrip=tambah" method="post">
  <table border="0" align="center">
   <tr>
	<td>Nama penerbit </td>
	<td><input type="text" name="nama_penerbit" placeholder="Nama penerbit"></td>
   </tr>
   <tr>
	<td>Alamat</td>
	<td><input type="text" name="alamat" placeholder="Alamat penerbit"></td>
   </tr>
   <tr>
     <td>Telepon</td>
     <td><input type="text" name="telepon" placeholder="Telepon penerbit" /></td>
   </tr>
   <tr>
	<td>Email</td>
	<td><input type="text" name="email" placeholder="Email" /></td>
   </tr>
   <tr>
	<td>Keterangan</td>
	<td><textarea name="keterangan" placeholder="keterangan"></textarea></td>
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
// Form Untuk Mengubah DATA PENULIS
if ($_GET[opsi]==ubah){
 $ubah=mysql_query("SELECT * FROM penerbit WHERE kode_penerbit='$_GET[id]'");
 while ($u=mysql_fetch_array($ubah)){ ?>
 <form action="?halaman=penerbit&skrip=ubah" method="post">
  <table border="0" align="center">
   <input type="hidden" name="id" value="<?php echo"$u[kode_penerbit]"; ?>">
   <tr>
	<td>Nama penerbit </td>
	<td><input type="text" name="nama_penerbit"  value="<?php echo"$u[nama_penerbit]"; ?>" /></td>
   </tr>
   <tr>
	<td>Alamat </td>
	<td><input type="text" name="alamat" value="<?php echo"$u[alamat]"; ?>" ></td>
   </tr>
   <tr>
     <td>Telepon</td>
     <td><input type="text" name="telepon" value="<?php echo"$u[telepon]"; ?>" /></td>
   </tr>
   <tr>
	<td>Email</td>
	<td><input type="text" name="email" value="<?php echo"$u[email]"; ?>"></td>
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
// Form Untuk Mengekspor DATA PENULIS
if ($_GET[opsi]==ekspor){ ?>
 <form action="penerbit_ekspor.php" method="post" target="_blank">
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