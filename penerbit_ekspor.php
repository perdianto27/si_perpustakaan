<?php
if ($_POST[ekspor]==unduh){
include'koneksi.php';
$no=1;
$tanggal=date('D d-M-Y');
$unduh=mysql_query("SELECT * FROM penerbit ORDER BY kode_penerbit ASC");
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan_Data_Penerbit.doc");

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
   <h4 align="center"><u>DATA PENERBIT</u></h4>
   <?php while ($u=mysql_fetch_array($unduh)){ ?>
<b>
- Kode Penerbit : <?php echo"$u[kode_penerbit]"; ?><br />
<hr /></b>
   <table border="0" width="600">
  <tr>
   <td width="120" bgcolor="#FF9933">Nama</td>
   <td width="470" bgcolor="#99CC33"><?php echo"$u[nama_penerbit]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#FF9933">Alamat</td>
   <td bgcolor="#99CC33"><?php echo"$u[alamat]"; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FF9933">Telepon</td>
    <td bgcolor="#99CC33"><?php echo"$u[telepon]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#FF9933">Email</td>
   <td bgcolor="#99CC33"><?php echo"$u[email]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#FF9933">Keterangan</td>
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

<?php if ($_POST[ekspor]==cetak){
include'koneksi.php';
$no=1;
$tanggal=date('D d-M-Y');
$cetak=mysql_query("SELECT * FROM penerbit ORDER BY kode_penerbit ASC");?>
                    
 <table border="0" align="center" bgcolor="#FF9933">
  <tr> 
   <td><font size="+2"><strong>Laporan : Data Perpustakaan</strong></font></td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#ffffff">
   <td ><hr />
   <h4 align="center"><u>DATA PENERBIT</u></h4>
   <?php while ($c=mysql_fetch_array($cetak)){ ?>
<b>
- Kode Penerbit : <?php echo"$c[kode_penerbit]"; ?><br />
<hr /></b>
   <table border="0" width="600">
  <tr>
   <td width="120" bgcolor="#FF9933">Nama</td>
   <td width="470" bgcolor="#99CC33"><?php echo"$c[nama_penerbit]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#FF9933">Alamat</td>
   <td bgcolor="#99CC33"><?php echo"$c[alamat]"; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FF9933">Telepon</td>
    <td bgcolor="#99CC33"><?php echo"$c[telepon]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#FF9933">Email</td>
   <td bgcolor="#99CC33"><?php echo"$c[email]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#FF9933">Keterangan</td>
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