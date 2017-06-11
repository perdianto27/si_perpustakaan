<?php
//menyisipkan koneksi dan skrip
include'koneksi.php';
?>

<?php
// Menampilkan DATA PENULIS
if (empty($_GET[aksi])){ ?>

<form action="?halaman=pencarian&opsi=pencarian" method="post">
  <h3 align="center">
  <img class="gambar_menu" src="ikon/cari.png" align="absmiddle" />
  FORM PENCARIAN BUKU</h3>
  <table border="0" align="center">
   <tr>
     <td><input type="text" name="kata_kunci" placeholder="Masukkan Kata Kunci"/></td>
   </tr>
   <tr>
	<td>
	<input type="submit" value="Pencarian">
	<div class="batal"><a href="?halaman=default">Batal</a></div>	</td>
   </tr>
  </table>
 
</form>
  
<?php }	?>

<?php
// Form Untuk Menampilkan Hasil Pencarian
if ($_GET[opsi]==pencarian){ 
$no=1;
  $lihat=mysql_query("SELECT * FROM buku where judul like '%$_POST[kata_kunci]%' or ISBN like '%$_POST[kata_kunci]%' ");
  $jml_data=mysql_num_rows($lihat);
?>
  
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
    <td class="data"><?php echo"$l[ISBN]";?></td>
    <td class="data"><?php echo"$l[judul]";	?></td>
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
    <td width="200">Ditemukan <?php echo"$jml_data";?> Buku Terkait pencarian</td>
    <td align="center" class="data">&nbsp;</td>
   </tr>
  </table>
  <br>
<?php } ?>

