<?php
//menyisipkan koneksi dan skrip
include'koneksi.php';
include'buku_skrip.php';
?>

<?php
// Menampilkan DATA BUKU
if (empty($_GET[aksi])){ 
  $no=1;
  $lihat=mysql_query("SELECT * FROM buku Order By kode_buku");
  $jml_data=mysql_num_rows($lihat);
?>
  <h3 align="center">
  <img class="gambar_menu" src="ikon/buku.png" align="absmiddle" />
  DATA BUKU</h3>
  <table border="0" class="ISBN" align="center">
   <tr class="ISBN" align="center">
    <td class="nomor">No</td>
    <td class="data">ISBN</td>
    <td class="data">Judul Buku</td>
    <td class="data">Opsi</td>
    <td width="15">&nbsp;</td>
   </tr>
  </table>

  <div class="data">
  <table border="0" class="data" align="center">
  <?php while ($l=mysql_fetch_array($lihat)){ ?>	
   <tr class="data">
    <td class="nomor"><?php echo"$no";?></td>
    <td class="data"><?php echo"$l[ISBN]";?> 
    <img src="ikon/detail_kosong.png" width="20" height="20" 
    	 align="absmiddle" />
	<a href="?halaman=buku&opsi=deskripsi&id=<?php echo"$l[kode_buku]"; ?>">Desk</a>
    </td>
    <td class="data">
	<?php echo"$l[judul]";	?></td>
    <td class="data" align="center">
    
    <img src="ikon/ubah.png" width="20" height="20" 
    	 align="absmiddle" />
	<a href="?halaman=buku&opsi=ubah&id=<?php echo"$l[kode_buku]"; ?>">
	Ubah</a> | 
	<img src="ikon/hapus.png" width="20" height="20"
    	 align="absmiddle" /> 
	<a href="?halaman=buku&skrip=hapus&id=<?php echo"$l[kode_buku]";?>" 
   	   onClick="return hapus();">
	Hapus</a>
	</td>
   </tr>
   <?php $no++; }	?>
  </table>
  </div>

  <table border="0" class="status" align="center">
   <tr>
    <td width="200">Jumlah : <?php echo"$jml_data";?> buku</td>
    <td align="center" class="data">
    <a href="?halaman=buku&opsi=tambah">
    <img src="ikon/tambah.png" width="20" height="20" 
    	 align="absmiddle" />
	Tambah</a> | 
	<a href="?halaman=buku&opsi=ekspor">
	<img src="ikon/ekspor.png" width="20" height="20" 
    	 align="absmiddle" />
	Ekspor</a>
    </td>
   </tr>
  </table>
  <br>
<?php }	?>

<?php
// Form Untuk Menambahkan buku Baru
if ($_GET[opsi]==tambah){ ?>
<form action="?halaman=buku&skrip=tambah" method="post" name="tambah_buku">
  <table border="0" align="center">
   <tr>
	<td>ISBN</td>
	<td><input type="text" name="ISBN" placeholder="ISBN"></td>
   </tr>
   <tr>
	<td>Judul Buku</td>
	<td><input type="text" name="judul" placeholder="Judul buku"></td>
   </tr>
   <tr>
     <td>Tanggal Entri</td>
     <td><input type="text" name="tgl_entri" id="id_buku" placeholder="Tahun-Bulan-Tanggal"/>
     <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.tambah_buku.tgl_entri);return false;" ><img name="popcal" align="absmiddle" style="border:none" src="kalender/kalender.png" width="34" height="29" border="0" alt=""></a></td>
   </tr>
   <tr>
	<td>Jenis Buku</td>
	<td><select name="kode_jenis">
      <?php
	   include"koneksi.php";
       $jenis=mysql_query("SELECT * FROM jenis_buku Order By nama_jenis ASC");
	   while ($j=mysql_fetch_array($jenis)){
	   ?>
      <option value="<?php echo"$j[kode_jenis]"; ?>"><?php echo"$j[nama_jenis]"; ?></option>
      <?php } ?>
    </select></td>
   </tr>
   <tr>
     <td>Penulis</td>
     <td><select name="kode_penulis">
       <?php
	   include"koneksi.php";
       $penulis=mysql_query("SELECT * FROM penulis Order By nama_penulis ASC");
	   while ($ps=mysql_fetch_array($penulis)){
	   ?>
       <option value="<?php echo"$ps[kode_penulis]"; ?>"><?php echo"$ps[nama_penulis]"; ?></option>
       <?php } ?>
     </select></td>
   </tr>
   <tr>
     <td>Penerbit</td>
     <td><select name="kode_penerbit">
       <?php
	   include"koneksi.php";
       $penerbit=mysql_query("SELECT * FROM penerbit Order By nama_penerbit ASC");
	   while ($pb=mysql_fetch_array($penerbit)){
	   ?>
       <option value="<?php echo"$pb[kode_penerbit]"; ?>"><?php echo"$pb[nama_penerbit]"; ?></option>
       <?php } ?>
     </select></td>
   </tr>
   <tr>
     <td>Tahun Terbit</td>
     <td><input name="tahun_terbit" type="text" size="4" maxlength="4" placeholder="Tahun" /></td>
   </tr>
   <tr>
     <td>Jumlah Buku</td>
     <td><input name="jumlah_buku" type="text" size="4" maxlength="3" placeholder="Jumlah" /></td>
   </tr>
   <tr>
	<td>Nomor Rak</td>
	<td><input name="nomor_rak" type="text" size="4" maxlength="3" placeholder="Rak" /></td>
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
// Form Untuk Mengubah DATA BUKU
if ($_GET[opsi]==ubah){
 $ubah=mysql_query("SELECT * FROM buku WHERE kode_buku='$_GET[id]'");
 while ($u=mysql_fetch_array($ubah)){ ?>
 <form action="?halaman=buku&skrip=ubah" method="post" name="ubah_buku">
  <table border="0" align="center">
   <input type="hidden" name="id" value="<?php echo"$u[kode_buku]"; ?>">
   <tr>
     <td>ISBN</td>
     <td><input type="text" name="ISBN" value="<?php echo"$u[ISBN]"; ?>" placeholder="ISBN" /></td>
   </tr>
   <tr>
     <td>Judul Buku</td>
     <td><input type="text" name="judul" value="<?php echo"$u[judul]"; ?>" placeholder="Judul buku" /></td>
   </tr>
   <tr>
     <td>Tanggal Entri</td>
     <td><input type="text" name="tgl_entri" value="<?php echo"$u[tgl_entri]"; ?>" id="id_buku" placeholder="Tahun-Bulan-Tanggal"/>
       <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.ubah_buku.tgl_entri);return false;" ><img src="kalender/kalender.png" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" style="border:none" /></a></td>
   </tr>
   <tr>
     <td>Jenis Buku</td>
     <td><select name="kode_jenis">
         <?php
	   include"koneksi.php";
       $jenis=mysql_query("SELECT * FROM jenis_buku Order By nama_jenis ASC");
	   while ($j=mysql_fetch_array($jenis)){
	   ?>
         <option value="<?php echo"$j[kode_jenis]"; ?>"><?php echo"$j[nama_jenis]"; ?></option>
         <?php } ?>
     </select></td>
   </tr>
   <tr>
     <td>Penulis</td>
     <td><select name="kode_penulis">
         <?php
	   include"koneksi.php";
       $penulis=mysql_query("SELECT * FROM penulis Order By nama_penulis ASC");
	   while ($ps=mysql_fetch_array($penulis)){
	   ?>
         <option value="<?php echo"$ps[kode_penulis]"; ?>"><?php echo"$ps[nama_penulis]"; ?></option>
         <?php } ?>
     </select></td>
   </tr>
   <tr>
     <td>Penerbit</td>
     <td><select name="kode_penerbit">
         <?php
	   include"koneksi.php";
       $penerbit=mysql_query("SELECT * FROM penerbit Order By nama_penerbit ASC");
	   while ($pb=mysql_fetch_array($penerbit)){
	   ?>
         <option value="<?php echo"$pb[kode_penerbit]"; ?>"><?php echo"$pb[nama_penerbit]"; ?></option>
         <?php } ?>
     </select></td>
   </tr>
   <tr>
     <td>Tahun Terbit</td>
     <td><input name="tahun_terbit" type="text" value="<?php echo"$u[tahun_terbit]"; ?>" size="4" maxlength="4" placeholder="Tahun" /></td>
   </tr>
   <tr>
     <td>Jumlah Buku</td>
     <td><input name="jumlah_buku" type="text" value="<?php echo"$u[jumlah_buku]"; ?>" size="4" maxlength="3" placeholder="Jumlah" /></td>
   </tr>
   <tr>
     <td>Nomor Rak</td>
     <td><input name="nomor_rak" type="text" value="<?php echo"$u[nomor_rak]"; ?>" size="4" maxlength="3" placeholder="Rak" /></td>
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
// Form Untuk Menambahkan deskripsi buku Baru
if ($_GET[opsi]==deskripsi){ ?>
<form action="?halaman=buku&skrip=deskripsi" method="post" name="deskripsi_buku" enctype="multipart/form-data">
<h3 align="center">DESKRIPSI BUKU</h3>
  <table border="0" align="center">
   <tr>
     <th colspan="3" align="left">
     <a href="buku_deskripsi_ekspor.php?ekspor=cetak&id=<?php echo"$_GET[id]"; ?>" 
      target="_blank">
      <img src="ikon/cetak.png" width="32" height="32" 
      	   align="absmiddle" />Cetak</a> | 
   <a href="buku_deskripsi_ekspor.php?ekspor=unduh&id=<?php echo"$_GET[id]"; ?>"
   	  target="_blank">
      <img src="ikon/unduh.png" width="32" height="32" 
      	   align="absmiddle" />Unduh</a>
     <hr /></th>
    </tr>
   <tr>
	<th>Preview</th>
	<th>Deskripsi</th>
	<th>Opsi</th>
   </tr>
   <?php $deskripsi=mysql_query("SELECT * FROM deskripsi_buku WHERE kode_buku='$_GET[id]'");
   		 while ($d=mysql_fetch_array($deskripsi)){ ?>
   <tr>
	<td align="center" valign="middle"><img src="pratinjau/<?php echo"$d[gambar]"; ?>" width="86" height="93" /></td>
	<td><textarea name="textarea" cols="40" rows="4" readonly="readonly" placeholder="Deskripsi tentang buku"><?php echo"$d[keterangan]"; ?></textarea></td>
	<td><img src="ikon/hapus.png" width="20" height="20"
    	 align="absmiddle" /> 
	<a href="?halaman=buku&skrip=hapus_deskripsi&id=<?php echo"$d[kode_deskripsi]";?>" 
   	   onClick="return hapus();">
	Hapus</a></td>
   </tr>
   <?php } ?>
   
   <tr>
    <input type="hidden" name="kode_buku" value="<?php echo"$_GET[id]"; ?>"/>
	<td><input name="gambar" type="file" size="3" placeholder="Gambar" /></td>
	<td><textarea name="keterangan" cols="40" rows="4" placeholder="Deskripsi tentang buku"></textarea></td>
	<td>&nbsp;</td>
   </tr>
   <tr>
	<td colspan="3">
	<input type="submit" value="Tambahkan Deskripsi">
	<input type="button" value="Batal" onclick="self.history.back();">	</td>
   </tr>
  </table>
  <iframe width=174 height=189 name="gToday:normal:kalender/agenda.js" id="gToday:normal:kalender/agenda.js" src="kalender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
</form>
<?php } ?>


<?php
// Form Untuk Mengekspor DATA BUKU
if ($_GET[opsi]==ekspor){ ?>
 <form action="buku_ekspor.php" method="post" target="_blank">
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