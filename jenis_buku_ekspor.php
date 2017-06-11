<?php
if ($_POST[ekspor]==unduh){
include'koneksi.php';
$no=1;
$tanggal=date('D d-M-Y');
$unduh=mysql_query("SELECT * FROM jenis_buku Order By kode_jenis ASC");
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan_Data_Jenis_Buku.doc");

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
   <h4 align="center"><u>DATA JENIS BUKU</u></h4>
   <table border="0" align="center" bordercolor="#FF6600" >
  <tr bgcolor="#FF9933">
   <th>No</th>
   <th>Kode Jenis</th>
   <th>Nama Jenis</th>
   <th>Keterangan</th>
  </tr>
  <?php while ($u=mysql_fetch_array($unduh)){ ?>
  <tr bgcolor="#99CC33">
   <td align="center"><?php echo"$no"; ?></td>
   <td align="center"><?php echo"$u[kode_jenis]"; ?></td>
   <td align="center"><?php echo"$u[nama_jenis]"; ?></td>
   <td align="center"><?php echo"$u[keterangan]"; ?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
   <td colspan="3">Tanggal Cetak : <?php echo"$tanggal"; ?></td>
  </tr>
 </table>
<?php } ?>
   </td>
  </tr>
 </table>

<?php if ($_POST[ekspor]==cetak){
include'koneksi.php';
$no=1;
$tanggal=date('D d-M-Y');
$cetak=mysql_query("SELECT * FROM jenis_buku 
					ORDER BY kode_jenis ASC");?>
                    
 <table border="0" align="center" bgcolor="#FF9933">
  <tr> 
   <td><font size="+2"><strong>Laporan : Data Perpustakaan</strong></font></td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#ffffff">
   <td ><hr />
   <h4 align="center"><u>DATA JENIS BUKU</u></h4>
   <table border="0" align="center" bordercolor="#FF6600">
  <tr bgcolor="#FF9933">
   <th>No</th>
   <th>Kode Jenis</th>
   <th>Nama Jenis</th>
   <th>Keterangan</th>
  </tr>
  <?php while ($c=mysql_fetch_array($cetak)){ ?>
  <tr bgcolor="#99CC33">
   <td align="center"><?php echo"$no"; ?></td>
   <td align="center"><?php echo"$c[kode_jenis]"; ?></td>
   <td align="center"><?php echo"$c[nama_jenis]"; ?></td>
   <td align="center"><?php echo"$c[keterangan]"; ?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
   <td colspan="3"><u>Tanggal Cetak : <?php echo"$tanggal"; ?></u></td>
  </tr>
 </table>
  <?php } ?>
   </td>
  </tr>
 </table>