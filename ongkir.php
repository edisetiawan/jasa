<?php
require_once "koneksi.php";
include "fungsi_rupiah.php";	
	$idk = $_GET['k'];
	/*$idk = 10307;*/
	$tampil=mysql_query("SELECT * FROM kota WHERE id_kota='$idk'");
	
	while($r=mysql_fetch_array($tampil)){
		$ongkir = format_rupiah($r['ongkos_kirim']);
		echo "<p>Ongkir : Rp. $ongkir/kg</p>";
	}
?>
