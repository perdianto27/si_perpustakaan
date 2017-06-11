<?php
if ($_GET[ekspor]==unduh){
include'koneksi.php';
$no=1;
$tanggal=date('D d-M-Y');
$unduh=mysql_query("SELECT * FROM deskripsi_buku WHERE kode_buku='$_GET[id]'");
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan_Data_Deskripsi.doc");

?>
 <table border="0" align="center" bgcolor="#FF9933">
  <tr> 
   <td><font size="+2"><strong>Laporan : Data Perpustakaan</strong></font></td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
   <td><hr />
   <h4 align="center"><u>DATA DESKRIPSI DUKU</u></h4>
   <?php while ($u=mysql_fetch_array($unduh)){ ?>
<b>
- Kode Deskripsi : <?php echo"$u[kode_deskripsi]"; ?><br />
- Judul Buku : <?php $buku=mysql_query("SELECT * FROM buku 
				WHERE kode_buku='$u[kode_buku]'"); 
				while ($b=mysql_fetch_array($buku)){
				echo"$b[judul]"; } ?><br />
<hr /></b>
   <table border="0" width="600">
  <tr>
   <td width="120" bgcolor="#FF9933" align="center">Preview</td>
   <td width="470" bgcolor="#99CC33" align="center">Deskripsi</td>
  </tr>
  <tr>
   <td bgcolor="#FF9933" align="center" valign="middle"><img src="http://localhost/si_perpustakaan/pratinjau/<?php echo"$u[gambar]"; ?>" width="86" height="93" /></td>
   <td bgcolor="#99CC33"><?php echo"$u[keterangan]"; ?></td>
  </tr>
  <tr>
   <td colspan="3">Tanggal Cetak : <?php echo"$tanggal"; ?></td>
  </tr>
 </table>
 <hr />
<br /><br />
<?php } }?>
   </td>
  </tr>
 </table>

<?php if ($_GET[ekspor]==cetak){
include'koneksi.php';
$no=1;
$tanggal=date('D d-M-Y');
$cetak=mysql_query("SELECT * FROM deskripsi_buku WHERE kode_buku='$_GET[id]'");?>
                    
 <table border="0" align="center" bgcolor="#FF9933">
  <tr> 
   <td><font size="+2"><strong>Laporan : Data Perpustakaan</strong></font></td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#ffffff">
   <td ><hr />
   <h4 align="center"><u>DATA DESKRIPSI BUKU</u></h4>
   <?php while ($c=mysql_fetch_array($cetak)){ ?>
<b>
- Kode Deskripsi : <?php echo"$c[kode_deskripsi]"; ?><br />
- Judul Buku : <?php $buku=mysql_query("SELECT * FROM buku 
				WHERE kode_buku='$c[kode_buku]'"); 
				while ($b=mysql_fetch_array($buku)){
				echo"$b[judul]"; } ?><br />
<hr /></b>
   <table border="0" width="600">
  <tr>
   <td width="120" bgcolor="#FF9933" align="center">Preview</td>
   <td width="470" bgcolor="#99CC33" align="center">Deskripsi</td>
  </tr>
  <tr>
   <td bgcolor="#FF9933" align="center" valign="middle"><img src="pratinjau/<?php echo"$c[gambar]"; ?>" width="86" height="93" /></td>
   <td bgcolor="#99CC33"><?php echo"$c[keterangan]"; ?></td>
  </tr>
  <tr>
   <td colspan="3">Tanggal Cetak : <?php echo"$tanggal"; ?></td>
  </tr>
 </table>
 <hr />
<br /><br />
  <?php } }?>
   </td>
  </tr>
 </table>