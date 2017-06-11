<?php 
$halaman=(isset($_GET['halaman']))?$_GET['halaman']:"default";
switch($halaman){
	case'akses':include"akses_modul.php";break;
	case'pengelola':include"pengelola_modul.php";break;
	case'penulis':include"penulis_modul.php";break;
	case'penerbit':include"penerbit_modul.php";break;
	case'jenis_buku':include"jenis_buku_modul.php";break;
	case'buku':include"buku_modul.php";break;
	case'anggota':include"anggota_modul.php";break;
	case'peminjaman':include"peminjaman_modul.php";break;
	case'pengembalian':include"pengembalian_modul.php";break;
	case'pencarian':include"pencarian_modul.php";break;
	case'default':default:include'standar.php';
	
	}
?>