<?php
//menyisipkan koneksi dan skrip
include'koneksi.php';
include'peminjaman_skrip.php';
?>

<?php
// Menampilkan DATA PENULIS
if (empty($_GET[aksi])){ 
  $no=1;
  $lihat=mysql_query("SELECT * FROM peminjaman Order By kode_pinjam");
  $jml_data=mysql_num_rows($lihat);
?>
  <h3 align="center">
  <img class="gambar_menu" src="ikon/peminjaman.png" align="absmiddle" />
  DATA PEMINJAMAN BUKU</h3>
  <table border="0" class="ISBN" align="center">
   <tr class="ISBN" align="center">
    <td class="nomor">No</td>
    <td class="data">Nama Peminjam</td>
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
    <td class="data">
	<?php $anggota=mysql_query("SELECT * FROM anggota WHERE kode_anggota=$l[kode_anggota]");
	      while ($ag=mysql_fetch_array($anggota)){
		  echo"$ag[nama_anggota]"; }?>
          </td>
    <td class="data">
	<?php $buku=mysql_query("SELECT * FROM buku WHERE kode_buku=$l[kode_buku]");
	      while ($b=mysql_fetch_array($buku)){
		  echo"$b[judul]"; }?>
    </td>
    <td class="data" align="center">
    <img src="ikon/
	<?php if ($l[pengembalian]=="Ya"){
			echo"detail_isi.png"; }
		  else { echo"detail_kosong.png"; } ?>" width="20" height="20" 
    	 align="absmiddle" />
	<a href="?halaman=peminjaman&opsi=status&id=<?php echo"$l[kode_pinjam]"; ?>">
	Status</a> | 
	<img src="ikon/hapus.png" width="20" height="20"
    	 align="absmiddle" /> 
	<a href="?halaman=peminjaman&skrip=hapus&id=<?php echo"$l[kode_pinjam]";?>" 
   	   onClick="return hapus();">
	Hapus</a>
	</td>
   </tr>
   <?php $no++; }	?>
  </table>
  </div>

  <table border="0" class="status" align="center">
   <tr>
    <td width="200">Jumlah : <?php echo"$jml_data";?> peminjaman</td>
    <td align="center" class="data">
    <a href="?halaman=peminjaman&opsi=tambah">
    <img src="ikon/tambah.png" width="20" height="20" 
    	 align="absmiddle" />
	Tambah</a> | 
	<a href="?halaman=peminjaman&opsi=ekspor">
	<img src="ikon/ekspor.png" width="20" height="20" 
    	 align="absmiddle" />
	Ekspor</a>
    </td>
   </tr>
  </table>
  <br>
<?php }	?>

<?php
// Form Untuk Menambahkan peminjaman Baru
if ($_GET[opsi]==tambah){ ?>
<form action="?halaman=peminjaman&skrip=tambah" method="post" name="tambah_peminjaman">
  <input type="hidden" name="pengembalian" value="Tidak" />
  <table border="0" align="center">
   <tr>
     <td>Tanggal Pinjam</td>
     <td><input type="text" name="tgl_pinjam" id="id_peminjaman" placeholder="Tahun-Bulan-Tanggal"/>
     <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.tambah_peminjaman.tgl_pinjam);return false;" ><img name="popcal" align="absmiddle" style="border:none" src="kalender/kalender.png" width="34" height="29" border="0" alt=""></a></td>
   </tr>
   <tr>
	<td>Nama Anggota</td>
	<td><select name="kode_anggota" id="kode_anggota">
      <?php
	   include"koneksi.php";
       $anggota=mysql_query("SELECT * FROM anggota Order By nama_anggota ASC");
	   while ($ag=mysql_fetch_array($anggota)){
	   ?>
      <option value="<?php echo"$ag[kode_anggota]"; ?>"><?php echo"$ag[nama_anggota]"; ?></option>
      <?php } ?>
    </select></td>
   </tr>
   <tr>
     <td>Judul Buku</td>
     <td><select name="kode_buku" id="kode_buku">
       <?php
	   include"koneksi.php";
       $buku=mysql_query("SELECT * FROM buku Order By judul ASC");
	   while ($b=mysql_fetch_array($buku)){
	   ?>
       <option value="<?php echo"$b[kode_buku]"; ?>"><?php echo"$b[judul]"; ?></option>
       <?php } ?>
     </select></td>
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
// Form Untuk Mengubah DATA PENULIS
if ($_GET[opsi]==status){
 $status=mysql_query("SELECT * FROM peminjaman WHERE kode_pinjam='$_GET[id]'");
 while ($sts=mysql_fetch_array($status)){ ?>
 <form action="?halaman=peminjaman&skrip=status" method="post">
  <table border="0" align="center">
   <input type="hidden" name="id" value="<?php echo"$sts[kode_pinjam]"; ?>">
   <tr>
     <td>Buku telah dikembalikan ke perpustakaan</td>
     <td><select name="pengembalian">
     <option value="<?php echo"$sts[pengembalian]"; ?>">Status : <?php echo"$sts[pengembalian]"; ?></option>
       <option value="Ya">Ya</option>
       <option value="Tidak">Tidak</option>
         </select></td>
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
 <form action="peminjaman_ekspor.php" method="post" target="_blank">
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