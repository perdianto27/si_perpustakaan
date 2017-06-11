<?php
//Membatasi Akses Pengelola (Ini Muncul Jika Telah Login)
session_start();
if (!empty($_SESSION['username']) and !empty($_SESSION['password']))
{
?>
<head>

<link href="desain.css" rel="stylesheet" type="text/css">
<link href="ikon/logo.png" rel="shortcut icon" type="image/x-icon">
<title>APLIKASI KREDIT ANGGOTA</title></head>
<body>
<div id="atas">
    <div id="header"></div>
  <div id="basemenu"><?php include"menu.php"; ?></div>
</div>
   <div id="bawah">
    <div id="kiri" onClick="sembunyi('pengguna');sembunyi('data');sembunyi('perpustakaan')"><?php include'halaman.php'; ?></div>
    <div id="kanan"><?php include'statistik.php';?></div>
    <div id="clear"></div>
    <div id="footer"><?php include'footer.php'; ?></div>
   </div>
</body>
<?php 
} else {
//ini muncul jika belum login
echo"<link href=desain.css type=text/css rel=stylesheet>"; 
include'akses_modul.php'; 
}
?>