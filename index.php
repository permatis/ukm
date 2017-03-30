<?php
require_once 'lib/koneksi.php';

$query = $db->prepare("SELECT kd_kecamatan, nama_kecamatan FROM db_kecamatan ORDER BY nama_kecamatan ASC");
$query->execute();
$sql = $query->fetchAll(PDO::FETCH_OBJ);

$query1 = $db->prepare("SELECT kd_kategori, nama_kategori FROM db_kategori ORDER BY nama_kategori ASC");
$query1->execute();
$sql1 = $query1->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>SIG UKM Kudus</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/easydropdown.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<a href="" class="navbar-brand">SIG USAHA UKM KUDUS</a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".bs-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="container">
			<div class="collapse navbar-collapse bs-navbar-collapse" id="collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</div>
		</div>
		<div class="header-tambahan">
			
		</div>
	</nav>
	<div class="sidebar" style="top: 50px;">
		<h2>Map Styles</h2>
		<h4>Kecamatan</h4>
		<select class="dropdown" data-settings='{"cutOff":4}' id="kecamatan" name="kecamatan">
			<option value="">--Kecamatan--</option>
			<?php
				foreach($sql as $hasil):
			?>
				<option value="<?php echo $hasil->kd_kecamatan;?>"><?php echo $hasil->nama_kecamatan;?></option>
			<?php
				endforeach;
			?>
		</select>
		<h4>Jenis Usaha</h4>
		<select class="dropdown" data-settings='{"cutOff":4}' id="kategori" name="kategori">
			<option value="">--Jenis Usaha--</option>
			<?php
				foreach($sql1 as $hasil1):
			?>
				<option value="<?php echo $hasil1->kd_kategori;?>"><?php echo $hasil1->nama_kategori;?></option>
			<?php
				endforeach;
			?>
		</select>
		<img src='legenda.png' alt='gambar'/>
		<div class="side-footer">@Map Styles for SIG - UKM Kudus</div>
	</div>
	<div id="peta" style="margin-top: -8px; min-height: 920px;"></div>

	<div class="modal fade" id="test" role="dialog" aria-labelledby="testLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" typw="button" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="testLabel"></h4>
				</div>
				<div class="modal-body" id="data"></div>
				<div class="modal-footer">
					<button class="btn btn-success" type="button" data-dismiss="modal">Keluar</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="assets/js/easy-dropdown.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script src="http://maps.google.com/maps/api/js?key=AIzaSyCuMaTOkQza78fBlAeyzP-2YLVIbkgiCXg&callback=initMap"></script>	
	<script type="text/javascript">
	//Jika default, posisi center berada di pusat kota Kudus
	var map;
	function initialize() {
		var mapOptions = {
			zoom: 14,
			center: new google.maps.LatLng(-6.804087, 110.838203)
		};
		map = new google.maps.Map(document.getElementById('peta'), mapOptions);
	}
	google.maps.event.addDomListener(window, 'load', initialize);

	function convertToRupiah(angka)
	{
		var rupiah = '';
		var angkarev = angka.toString().split('').reverse().join('');
		for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
			return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
	}


	//Jika sudah memilih kecamatannya, posisi center akan berubah sesuai dengan kecamatan yang dipilih
	$(document).ready(function(){
		$('#kecamatan'). change(function(){
			var kd_kecamatan = $('#kecamatan').val();
			var map;
			var infowindow = new google.maps.InfoWindow();
			var marker, i;
			$.ajax({
				type : "POST",
				url : "lib/kecamatan.php",
				dataType: "json", 
				data : 'kd_kecamatan='+ kd_kecamatan,
				success : function(data){
					var mapOptions = {
						zoom: 14,
						center: new google.maps.LatLng(data[0], data[1])
					};
					map = new google.maps.Map(document.getElementById('peta'), mapOptions);
				}
			}),

			$.ajax({
				type : "POST",
				url : "lib/alamat.php",
				dataType: "json", 
				data : 'kd_kecamatan='+ kd_kecamatan,
				success : function(data){

					var marker, i;
					for (i = 0; i < data.length; i++) {
						
						marker = new google.maps.Marker({
						 	position: new google.maps.LatLng(data[i]['lat'], data[i]['lang']),
						 	map: map,
						 	icon: 'assets/img/'+data[i]['icon']
						});

						google.maps.event.addListener(marker, 'click', (function(marker, i) {
							return function(){
								
								var id = data[i]['id_alamat'];

								$.ajax({
									type : "POST",
									url : "lib/informasi.php",
									dataType: "json", 
									data : "id_alamat="+id,
									success : function(info){

										var content, selengkapnya;

										content = "<table class='table table-bordered'>";
										content	+= "<tr><th>Nama Usaha</th><td>"+info['nama_usaha']+"</td></tr>";
										content	+= "<tr><th>Nama Produksi</th><td>"+info['nama_produksi']+"</td></tr>";
										content	+= "<tr><th>Nama Pemilik</th><td>"+info['pemilik']+"</td></tr>";
										content	+= "<tr><td colspan='2'><a href='#test' data-toggle='modal'>Detail</a></td></tr>";
										content += "</table>";
										infowindow.setContent(content);
										infowindow.open(map, marker);

										selengkapnya 	= "<table class='table table-bordered table-striped'>";
										selengkapnya	+= "<tr><th>Nama Usaha</th><td>"+info['nama_usaha']+"</td></tr>";
										selengkapnya	+= "<tr><th>Produksi</th><td>"+info['nama_produksi']+"</td></tr>";
										selengkapnya	+= "<tr><th>Pemilik</th><td>"+info['pemilik']+"</td></tr>";
										selengkapnya	+= "<tr><th>Tenaga Kerja</th><td>"+info['tng_kerja']+" Orang</td></tr>";
										selengkapnya	+= "<tr><th>Nilai Investasi</th><td>"+convertToRupiah(info['nilai_investasi'])+"</td></tr>";
										selengkapnya	+= "<tr><th>Alamat</th><td>"+info['alamat']+"</td></tr>";
										selengkapnya	+= "<tr><th>Keterangan</th><td>"+info['keterangan']+"</td></tr>";
										selengkapnya	+= "<tr><th>Foto</th><td><img src='assets/upload/"+info['gambar']+"'></td></tr>";
										selengkapnya 	+= "</table>";
										document.getElementById('data').innerHTML = selengkapnya;
										document.getElementById('testLabel').innerHTML = "INFORMASI LENGKAP USAHA "+info['nama_usaha'].toUpperCase();
										
									}
								});
							}
						})(marker, i));
					};
				}
			});
		}),

		$('#kategori'). change(function(){
			var kd_kategori = $('#kategori').val();
			var map;
			var infowindow = new google.maps.InfoWindow();
			var marker, i;
			var mapOptions = {
				zoom: 12,
				center: new google.maps.LatLng(-6.804087, 110.838203)
			};
			
			map = new google.maps.Map(document.getElementById('peta'), mapOptions);

			$.ajax({
				type : "POST",
				url : "lib/usaha.php",
				dataType: "json", 
				data : 'kd_kategori='+ kd_kategori,
				success : function(data){

					var marker, i;
					for (i = 0; i < data.length; i++) {
						
						marker = new google.maps.Marker({
						 	position: new google.maps.LatLng(data[i]['lat'], data[i]['lang']),
						 	map: map,
						 	icon: 'assets/img/'+data[i]['icon']
						});

						google.maps.event.addListener(marker, 'click', (function(marker, i) {
							return function(){
								
								var id = data[i]['id_alamat'];

								$.ajax({
									type : "POST",
									url : "lib/informasi.php",
									dataType: "json", 
									data : "id_alamat="+id,
									success : function(info){

										var content, selengkapnya;

										content = "<table class='table table-bordered'>";
										content	+= "<tr><th>Nama Usaha</th><td>"+info['nama_usaha']+"</td></tr>";
										content	+= "<tr><th>Nama Produksi</th><td>"+info['nama_produksi']+"</td></tr>";
										content	+= "<tr><th>Nama Pemilik</th><td>"+info['pemilik']+"</td></tr>";
										content	+= "<tr><td colspan='2'><a href='#test' data-toggle='modal'>Detail</a></td></tr>";
										content += "</table>";
										infowindow.setContent(content);
										infowindow.open(map, marker);

										selengkapnya 	= "<table class='table table-bordered table-striped'>";
										selengkapnya	+= "<tr><th>Nama Usaha</th><td>"+info['nama_usaha']+"</td></tr>";
										selengkapnya	+= "<tr><th>Produksi</th><td>"+info['nama_produksi']+"</td></tr>";
										selengkapnya	+= "<tr><th>Pemilik</th><td>"+info['pemilik']+"</td></tr>";
										selengkapnya	+= "<tr><th>Tenaga Kerja</th><td>"+info['tng_kerja']+" Orang</td></tr>";
										selengkapnya	+= "<tr><th>Nilai Investasi</th><td>"+convertToRupiah(info['nilai_investasi'])+"</td></tr>";
										selengkapnya	+= "<tr><th>Alamat</th><td>"+info['alamat']+"</td></tr>";
										selengkapnya	+= "<tr><th>Keterangan</th><td>"+info['keterangan']+"</td></tr>";
										selengkapnya	+= "<tr><th>Foto</th><td><img src='assets/upload/"+info['gambar']+"'></td></tr>";
										selengkapnya 	+= "</table>";
										document.getElementById('data').innerHTML = selengkapnya;
										document.getElementById('testLabel').innerHTML = "INFORMASI LENGKAP USAHA "+info['nama_usaha'].toUpperCase();
										
									}
								});
							}
						})(marker, i));

					};
				}
			});
		});
	});
	</script>
</body>
</html>