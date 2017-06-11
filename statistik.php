<?php
include'koneksi.php';
$_1=mysql_query("SELECT * FROM pengelola");
$_2=mysql_query("SELECT * FROM buku");
$_3=mysql_query("SELECT * FROM anggota");
$_4=mysql_query("SELECT * FROM peminjaman");
$_5=mysql_query("SELECT * FROM penulis");
$_6=mysql_query("SELECT * FROM penerbit");
$a1=mysql_num_rows($_1);
$a2=mysql_num_rows($_2);
$a3=mysql_num_rows($_3);
$a4=mysql_num_rows($_4);
$a5=mysql_num_rows($_5);
$a6=mysql_num_rows($_6);
?>
<table align="center" class="judul_menu">
<tr><td class="judul_menu" style="width:125px; border-radius:5px;">DATA STATISTIK</td></tr>
<tr><td><img src="ikon/ubah.png" width="20" height="20" align="absbottom" /><a href="#" onclick="alert('Terdapat <?php echo"$a1"; ?> Orang Pengelola');">Pengelola (<?php echo"$a1"; ?>)</a></td>
</tr>
<tr><td><img src="ikon/ubah.png" width="20" height="20" align="absbottom" /> <a href="#" onclick="alert('Terdapat <?php echo"$a2"; ?> Buku Tersedia Dalam Perpustakaan');">Buku (<?php echo"$a2"; ?>)</a></td>
</tr>
<tr>
  <td><img src="ikon/ubah.png" width="20" height="20" align="absbottom" /> <a href="#" onclick="alert('Sebanyak <?php echo"$a3"; ?> Orang Anggota Terdaftar');"> Anggota (<?php echo"$a3"; ?>)</a></td>
</tr>
<tr>
  <td><img src="ikon/ubah.png" alt="" width="20" height="20" align="absbottom" /> <a href="#" onclick="alert('Terdapat <?php echo"$a4"; ?> Orang Yang Sedang Meminjam Buku');"> Peminjam (<?php echo"$a4"; ?>)</a></td>
</tr>
<tr>
  <td><img src="ikon/ubah.png" alt="" width="20" height="20" align="absbottom" /><a href="#" onclick="alert('Terdapat <?php echo"$a5"; ?> Penulis Terdaftar');"> Penulis (<?php echo"$a5"; ?>)</a></td>
</tr>
<tr>
  <td><img src="ikon/ubah.png" alt="" width="20" height="20" align="absbottom" /><a href="#" onclick="alert('Terdapat <?php echo"$a6"; ?> Penerbit Terdaftar');"> Penerbit (<?php echo"$a6"; ?>)</a></td>
</tr>
</table>
