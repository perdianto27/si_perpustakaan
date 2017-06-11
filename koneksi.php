<?php
//membuat koneksi ke server
mysql_connect("localhost","root","")
or die("tidak dapat menyambung ke server");

//memilih basis data
mysql_select_db("db_perpustakaan_perdianto")
or die ("basis data tidak ditemukan");
?>