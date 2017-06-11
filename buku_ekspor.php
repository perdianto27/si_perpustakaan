<?php
if ($_POST[ekspor]==unduh){
include'koneksi.php';
$no=1;
$tanggal=date('D d-M-Y');
$unduh=mysql_query("SELECT * FROM buku,jenis_buku,penulis,penerbit 
					 WHERE buku.kode_jenis=jenis_buku.kode_jenis 
					 AND buku.kode_penulis=penulis.kode_penulis
					 AND buku.kode_penerbit=penerbit.kode_penerbit");
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan_Data_Buku.doc");

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
   <h4 align="center"><u>DATA BUKU</u></h4>
   <?php while ($u=mysql_fetch_array($unduh)){ ?>
<b>
- Kode Buku: <?php echo"$u[kode_buku]"; ?><br />
- Tanggal Entri : <?php echo"$u[tgl_entri]"; ?> 
<hr /></b>
   <table border="0" width="600">
  <tr>
   <td width="120" bgcolor="#FF9933">ISBN</td>
   <td width="470" bgcolor="#99CC33"><?php echo"$u[ISBN]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#FF9933">Judul</td>
   <td bgcolor="#99CC33"><?php echo"$u[judul]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#FF9933">Jenis Buku</td>
   <td bgcolor="#99CC33"><?php echo"$u[nama_jenis]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#FF9933">Penulis</td>
   <td bgcolor="#99CC33"><?php echo"$u[nama_penulis]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#FF9933">Penerbit</td>
   <td bgcolor="#99CC33"><?php echo"$u[nama_penerbit]"; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FF9933">Tahun Terbit</td>
    <td bgcolor="#99CC33"><?php echo"$u[tahun_terbit]"; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FF9933">Jumlah Buku</td>
    <td bgcolor="#99CC33"><?php echo"$u[jumlah_buku]"; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FF9933">Nomor Rak</td>
    <td bgcolor="#99CC33"><?php echo"$u[nomor_rak]"; ?></td>
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
$cetak=mysql_query("SELECT * FROM buku,jenis_buku,penulis,penerbit 
					 WHERE buku.kode_jenis=jenis_buku.kode_jenis 
					 AND buku.kode_penulis=penulis.kode_penulis
					 AND buku.kode_penerbit=penerbit.kode_penerbit");?>
                    
 <table border="0" align="center" bgcolor="#FF9933">
  <tr> 
   <td><font size="+2"><strong>Laporan : Data Perpustakaan</strong></font></td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#ffffff">
   <td ><hr />
   <h4 align="center"><u>DATA BUKU</u></h4>
   <?php while ($c=mysql_fetch_array($cetak)){ ?>
<b>
- Kode Buku : <?php echo"$c[kode_buku]"; ?><br />
- Tanggal Entri : <?php echo"$c[tgl_entri]"; ?> 
<hr /></b>
   <table border="0" width="600">
  <tr>
   <td width="120" bgcolor="#FF9933">ISBN</td>
   <td width="470" bgcolor="#99CC33"><?php echo"$c[ISBN]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#FF9933">Judul</td>
   <td bgcolor="#99CC33"><?php echo"$c[judul]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#FF9933">Jenis Buku</td>
   <td bgcolor="#99CC33"><?php echo"$c[nama_jenis]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#FF9933">Penulis</td>
   <td bgcolor="#99CC33"><?php echo"$c[nama_penulis]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#FF9933">Penerbit</td>
   <td bgcolor="#99CC33"><?php echo"$c[nama_penerbit]"; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FF9933">Tahun Terbit</td>
    <td bgcolor="#99CC33"><?php echo"$c[tahun_terbit]"; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FF9933">Jumlah Buku</td>
    <td bgcolor="#99CC33"><?php echo"$c[jumlah_buku]"; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FF9933">Nomor Rak</td>
    <td bgcolor="#99CC33"><?php echo"$c[nomor_rak]"; ?></td>
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