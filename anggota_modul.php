<?php
//menyisipkan koneksi dan skrip
include'koneksi.php';
include'anggota_skrip.php';
?>

<?php
// Menampilkan DATA ANGGOTA
if (empty($_GET[aksi])){ 
  $no=1;
  $lihat=mysql_query("SELECT * FROM anggota Order By kode_anggota");
  $jml_data=mysql_num_rows($lihat);
?>
  <h3 align="center">
  <img class="gambar_menu" src="ikon/anggota.png" align="absmiddle" />
  DATA ANGGOTA</h3>
  <table border="0" class="judul" align="center">
   <tr class="judul" align="center">
    <td class="nomor">No</td>
    <td class="data">Nama anggota</td>
    <td class="data">Tanggal Masuk</td>
    <td class="data">Opsi</td>
    <td width="15">&nbsp;</td>
   </tr>
  </table>

  <div class="data">
  <table border="0" class="data" align="center">
  <?php while ($l=mysql_fetch_array($lihat)){ ?>	
   <tr class="data">
    <td class="nomor"><?php echo"$no";?></td>
    <td class="data"><?php echo"$l[nama_anggota]";?></td>
    <td class="data"><?php echo"$l[tgl_masuk]";	?></td>
    <td class="data" align="center">
    <img src="ikon/ubah.png" width="20" height="20" 
    	 align="absmiddle" />
	<a href="?halaman=anggota&opsi=ubah&id=<?php echo"$l[kode_anggota]"; ?>">
	Ubah</a> | 
	<img src="ikon/hapus.png" width="20" height="20"
    	 align="absmiddle" /> 
	<a href="?halaman=anggota&skrip=hapus&id=<?php echo"$l[kode_anggota]";?>" 
   	   onClick="return hapus();">
	Hapus</a>
	</td>
   </tr>
   <?php $no++; }	?>
  </table>
  </div>

  <table border="0" class="status" align="center">
   <tr>
    <td width="200">Jumlah : <?php echo"$jml_data";?> anggota</td>
    <td align="center" class="data">
    <a href="?halaman=anggota&opsi=tambah">
    <img src="ikon/tambah.png" width="20" height="20" 
    	 align="absmiddle" />
	Tambah</a> | 
	<a href="?halaman=anggota&opsi=ekspor">
	<img src="ikon/ekspor.png" width="20" height="20" 
    	 align="absmiddle" />
	Ekspor</a>
    </td>
   </tr>
  </table>
  <br>
<?php }	?>

<?php
// Form Untuk Menambahkan anggota Baru
if ($_GET[opsi]==tambah){ ?>
 <form action="?halaman=anggota&skrip=tambah" method="post" name="tambah_anggota">
  <table border="0" align="center">
   <tr>
	<td>Nama anggota </td>
	<td><input type="text" name="nama_anggota" placeholder="Nama anggota"></td>
   </tr>
   <tr>
	<td>Alamat</td>
	<td><input type="text" name="alamat" placeholder="Alamat anggota"></td>
   </tr>
   <tr>
     <td>Telepon</td>
     <td><input type="text" name="telepon" placeholder="Telepon anggota" /></td>
   </tr>
   <tr>
	<td>Tanggal Masuk</td>
	<td><input type="text" name="tgl_masuk" id="id_buku" placeholder="Tahun-Bulan-Tanggal"/>
     <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.tambah_anggota.tgl_masuk);return false;" ><img name="popcal" align="absmiddle" style="border:none" src="kalender/kalender.png" width="34" height="29" border="0" alt=""></a></td>
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
  <iframe width=174 height=189 name="gToday:normal:kalender/agenda.js" id="gToday:normal:kalender/agenda.js" src="kalender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
</form>
<?php } ?>

<?php
// Form Untuk Mengubah DATA ANGGOTA
if ($_GET[opsi]==ubah){
 $ubah=mysql_query("SELECT * FROM anggota WHERE kode_anggota='$_GET[id]'");
 while ($u=mysql_fetch_array($ubah)){ ?>
 <form action="?halaman=anggota&skrip=ubah" method="post" name="ubah_anggota">
  <table border="0" align="center">
   <input type="hidden" name="id" value="<?php echo"$u[kode_anggota]"; ?>">
   <tr>
	<td>Nama anggota </td>
	<td><input type="text" name="nama_anggota"  value="<?php echo"$u[nama_anggota]"; ?>" /></td>
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
	<td>Tanggal Masuk</td>
	<td><input type="text" name="tgl_masuk" value="<?php echo"$u[tgl_masuk]"; ?>" id="id_buku" placeholder="Tahun-Bulan-Tanggal"/>
     <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.ubah_anggota.tgl_masuk);return false;" ><img name="popcal" align="absmiddle" style="border:none" src="kalender/kalender.png" width="34" height="29" border="0" alt=""></a></td>
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
  <iframe width=174 height=189 name="gToday:normal:kalender/agenda.js" id="gToday:normal:kalender/agenda.js" src="kalender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
</form>
<?php } } ?>

<?php
// Form Untuk Mengekspor DATA ANGGOTA
if ($_GET[opsi]==ekspor){ ?>
 <form action="anggota_ekspor.php" method="post" target="_blank">
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