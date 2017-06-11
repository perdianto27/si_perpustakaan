<?php
date_default_timezone_set('Asia/Jakarta');

function cekdenda($tgl){
	$tp=explode("-",$tgl);
	
	$tgl_pinjam=gregoriantojd($tp[1],$tp[2],$tp[0]);
	
	$sekarang=date("Y-m-d");
	
	$tk=explode("-",$sekarang);
	
	$tgl_kembali=gregoriantojd($tk[1],$tk[2],$tk[0]);
	
	$batas_pinjam=7;//batas peminjaman buku 7 hari
	
	$denda_telat=500; // denda perhari jika telah melewati batas pengembalian
	$selisih=$tgl_kembali-$tgl_pinjam;
	if($selisih>0){
	$uang_denda=($selisih)*500;
	
	$uang_denda="Rp.".number_format($uang_denda,0,',','.').",-";
	}else{
		$uang_denda="Belum kena denda";
	}
	return $uang_denda;
}	
?>