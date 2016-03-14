 <script type="text/javascript" src="jquery.js"></script> 
<script>
$(document).ready(function() {
	$('#propinsi').change(function() { 
		var propinsi = $('#propinsi').val();
		var kurir = $('#jasa').val();
		$.ajax({
			type: 'GET',
			url: 'kota.php',
			data: 'prop=' + propinsi+'&kur='+kurir,
			dataType: 'html',
			beforeSend: function() {
				$('#dakota').html('<img src="loader.gif" />');	
			},
			success: function(response) {
				$('#dakota').html(response);
			}
		});
    });
	$('#jasa').change(function() { 
		var propinsi = $('#propinsi').val();
		var kurir = $('#jasa').val();
		$.ajax({
			type: 'GET',
			url: 'kota.php',
			data: 'prop=' + propinsi+'&kur='+kurir,
			dataType: 'php',
			beforeSend: function() {
				$('#dakota').html('<img src="loader.gif" />');	
			},
			success: function(response) {
				$('#dakota').html(response);
			}
		});
    });
    
   	$('#dakota').change(function() { 
		var k = $('#kota').val();
		$.ajax({
			type: 'GET',
			url: 'ongkir.php',
			data: 'k=' + k,
			dataType: 'html',
			beforeSend: function() {
				$('#ongkir').html('<img src="loader.gif" />');	
			},
			success: function(response) {
				$('#ongkir').html(response);
			}
		});
    });

});
</script>
<?php
include('koneksi.php');

		echo "<div class='features_items' style='margin: 0px 20px 30px 20px;'><div class='col-sm-12'>
			<h2 class='title text-center' style='margin-top: 30px;'>Data Pembeli</h2>";
		echo "<p class=' _capitalize'>pastikan anda mengisi data berikut dengan benar.</p>";
		//form data pembeli
		echo "<form name=form action='prosesTrans' method='POST' onSubmit=\"return validasi(this)\">
		<table width=550>
		  <tr>
			<td>Nama Lengkap </td>
			<td><input type=text name=nama size=30 /></td>
		  </tr>
		  <tr>
			<td valign='top'> Alamat Lengkap </td>
			<td>  <input type='text' name='alamat' style='width: 210px; height: 50px;'/></td>
		  </tr>
		  <tr>
			<td>Telpon/HP</td>
			<td>  <input type='text' name='telpon' /></td>
		  </tr>
		  <tr>
			<td> Email</td>
			<td>  <input type='text' name='email' /></td>
		  </tr>
		  <tr>
			  <td class='vmid'>Propinsi Tujuan</td>
			  <td>
				<select id='propinsi' name='propinsi'>";
				$tampil=mysql_query("SELECT * FROM propinsi ORDER BY propinsi");
		        echo "<option value='0' selected>- Lokasi Pengiriman -</option>";
		        while($k=mysql_fetch_array($tampil))
		        {
					echo "<option value='$k[id]'>$k[propinsi]</option>";
				}
				echo "</select>
			  </td>
		  </tr>
		  <tr>
		  <td class='vmid'><span class='table4'>Jasa Pengiriman</td>
		  <td>  
			  <select name='jasa' id='jasa'>
			  <option value='0' selected>- Pilih Jenis Jasa Pengiriman -</option>";
			  
			  $tampil=mysql_query("SELECT * FROM mod_kurir ORDER BY nama_kurir");
			  while($r=mysql_fetch_array($tampil)){
				 echo "<option value='$r[id_kurir]'>$r[nama_kurir]</option>";
			  }
		  echo "</select></td></tr>
		  <tr>
			  <td class='vmid'></td>
			  <td>
					<div id='dakota'></div>
			  </td>
		  
		  </tr>
			<tr><td colspan='2' height='10px'></td></tr>
		  <tr>
			<td></td>
			<td>
			<input class='butt' type='submit' value='proses'></td></tr>
		</table></div></div>";
	
?>