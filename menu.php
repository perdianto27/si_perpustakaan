<script type="text/javascript" src="fungsi.js"></script>
<table cellpadding="0" cellspacing="0" style="width:800px;">
	<th>
    <img src="ikon/home.png" width="48" height="48" align="absmiddle"> <a href="./?halaman=deafult">Beranda</a></th>
    <th class="menu"> 
    <img src="ikon/pengguna.png" width="48" height="48" align="absmiddle"> 
    <a href="#" onclick="tampil('pengguna'); this.focus();" >Pengguna</a></th>
    <th class="menu"> 
    <img src="ikon/data.png" align="absmiddle"> 
    <a href="#" onClick="tampil('data'); this.focus();">Data Buku</a></th>
    <th class="menu">
    <img src="ikon/perpustakaan.png" align="absmiddle"> 
    <a href="#" onClick="tampil('perpustakaan'); this.focus();">Perpustakaan</a> 
    </th>
    <th class="menu" width="10"></th>
    <tr>
    	<td></td>
        <td>
        <div id="pengguna" style="position:absolute; visibility:hidden;">
        	<table class="submenu" cellpadding="0" cellspacing="0">
            <tr>
           	
            	<td class="submenu" width="140">
                <img class="gambar_submenu" src="ikon/anggota.png" align="absmiddle" />
                <a href="./?halaman=anggota">Anggota</a></td>
             
            </tr>
            <tr>
           	 
            	<td class="submenu" width="140">
                <img class="gambar_submenu" src="ikon/pengelola.png" align="absmiddle" />
                <a href="./?halaman=pengelola" onclick="sembunyi('pengguna')">Pengelola</a></td>
                </tr>
               
               <tr>
           	 
            	<td class="submenu" width="140">
                <img class="gambar_submenu" src="ikon/keluar.png" align="absmiddle" />
                <a href="akses_keluar.php" onClick="return keluar()">Keluar Aplikasi</a></td>
             
            </tr>
        	
            </table>
        </div>
        </td>
        <td>
        <div id="data" style="position:absolute; visibility:hidden;">
        	<table class="submenu" cellpadding="0" cellspacing="0">
           	  <tr><td class="submenu" width="140">
              <img class="gambar_submenu" src="ikon/jenis_buku.png" align="absmiddle" />
              <a href="./?halaman=jenis_buku">
              Jenis Buku</a></td>
           	  </tr>
              <tr><td class="submenu" width="140">
              <img class="gambar_submenu" src="ikon/penulis.png" align="absmiddle" />
              <a href="./?halaman=penulis">Penulis</a></td>
              </tr>
              <tr><td class="submenu" width="140">
              <img class="gambar_submenu" src="ikon/penerbit.png" align="absmiddle" />
              <a href="./?halaman=penerbit">Penerbit</a></td>
              </tr>
            </table>
        </div>
        </td>
        <td>
        <div id="perpustakaan" style="position:absolute; visibility:hidden;">
        	<table class="submenu" cellpadding="0" cellspacing="0">
           	  <tr><td class="submenu" width="140">
              <img class="gambar_submenu" src="ikon/buku.png" align="absmiddle" />
              <a href="./?halaman=buku">Buku</a></td>
           	  </tr>
               <tr><td class="submenu" width="140">
               <img class="gambar_submenu" src="ikon/peminjaman.png" align="absmiddle" />
              <a href="./?halaman=peminjaman">Peminjaman</a></td>
           	  </tr>
               <tr><td class="submenu" width="140">
               <img class="gambar_submenu" src="ikon/peminjaman.png" align="absmiddle" />
              <a href="./?halaman=pengembalian">Pengembalian</a></td>
           	  </tr>
              <tr><td class="submenu" width="140">
              <img class="gambar_submenu" src="ikon/cari.png" align="absmiddle" />
              <a href="./?halaman=pencarian">Cari Buku</a></td>
              </tr>
            </table>
        </div>
        </td>
    </tr>
</table>