<?php
if ($_POST[ekspor]==unduh){
include'koneksi.php';
$no=1;
$tanggal=date('D d-M-Y');
$unduh=mysql_query("SELECT * FROM pengembalian,buku,anggota 
					 WHERE pengembalian.kode_buku=buku.kode_buku 
					 AND pengembalian.kode_anggota=anggota.kode_anggota");
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan_Data_Pengembalian.doc");

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
   <h4 align="center"><u>DATA PENGEMBALIAN</u></h4>
   <table border="0" align="center" bordercolor="#FF6600" >
  <tr bgcolor="#FF9933">
   <th>No</th>
   <th>Kode Pinjam</th>
   <th>Tanggal Kembali</th>
   <th>Nama Anggota</th>
   <th>Buku</th>
   <th>Denda</th>
  </tr>
  <?php while ($u=mysql_fetch_array($unduh)){ ?>
  <tr bgcolor="#99CC33">
   <td align="center"><?php echo"$no"; ?></td>
   <td align="center"><?php echo"$u[kode_pinjam]"; ?></td>
   <td align="center"><?php echo"$u[tgl_kembali]"; ?></td>
   <td align="center"><?php echo"$u[nama_anggota]"; ?></td>
   <td align="center"><?php echo"$u[nama_buku]"; ?></td>
   <td align="center"><?php echo"$u[denda]"; ?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
   <td colspan="3">Tanggal Cetak : <?php echo"$tanggal"; ?></td>
  </tr>
 </table>

 <hr />
<br /><br />
<?php }?>
   </td>
  </tr>
 </table>

<?php if ($_POST[ekspor]==cetak){
include'koneksi.php';
$no=1;
$tanggal=date('D d-M-Y');
$cetak=mysql_query("SELECT * FROM pengembalian,buku,anggota 
					 WHERE pengembalian.kode_buku=buku.kode_buku 
					 AND pengembalian.kode_anggota=anggota.kode_anggota");?>
                    
 <table border="0" align="center" bgcolor="#FF9933">
  <tr> 
   <td><font size="+2"><strong>Laporan : Data Perpustakaan</strong></font></td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#ffffff">
   <td ><hr />
   <h4 align="center"><u>DATA PENGEMBALIAN</u></h4>
   <table border="0" align="center" bordercolor="#FF6600" >
  <tr bgcolor="#FF9933">
   <th>No</th>
   <th>Kode Pinjam</th>
   <th>Tanggal Kembali</th>
   <th>Nama Anggota</th>
   <th>Buku</th>
   <th>Denda</th>
  </tr>
  <?php while ($u=mysql_fetch_array($cetak)){ ?>
  <tr bgcolor="#99CC33">
   <td align="center"><?php echo"$no"; ?></td>
   <td align="center"><?php echo"$u[kode_pinjam]"; ?></td>
   <td align="center"><?php echo"$u[tgl_kembali]"; ?></td>
   <td align="center"><?php echo"$u[nama_anggota]"; ?></td>
   <td align="center"><?php echo"$u[judul]"; ?></td>
   <td align="center"><?php echo"$u[denda]"; ?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
   <td colspan="3">Tanggal Cetak : <?php echo"$tanggal"; ?></td>
  </tr>
 </table>

 <hr />
<br /><br />
  <?php }?>
   </td>
  </tr>
 </table>