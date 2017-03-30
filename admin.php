<?php
require_once 'lib/koneksi.php';
require_once 'lib/tgl_indo.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}

$pilih = $db->query("SELECT nama, tgl_login FROM db_admin");
$nama = $pilih->fetch();

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<style type="text/css">
		.navbar {
			min-height: 60px;
		}
		.navbar-header,
		.header-tambahan {
			padding-top: 5px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">SIG USAHA UKM KUDUS</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".bs-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="header-tambahan">
				<div class="collapse navbar-collapse bs-navbar-collapse" id="collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="bootstrap.html" class="dropdown-toggle" data-toggle="dropdown">Selamat Datang, <?php echo ucfirst($nama['nama']); ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="gantipassword.php">Ganti Password</a></li>
								<li><a href="logout.php">Keluar</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="sidebar">
		<h5>Terakhir login : <br/><?php echo tanggal_format_indonesia($nama['tgl_login']);?></h5>
		<ul>
			<li><a href="kecamatan/index.php"><span class="glyphicon glyphicon-list-alt"></span>Data Kecamatan</a></li>
			<li><a href="kategori/index.php"><span class="glyphicon glyphicon-folder-open"></span>Data Kategori</a></li>
			<li><a href="produksi/index.php"><span class="glyphicon glyphicon-cutlery"></span>Data Produksi</a></li>
			<li><a href="alamat/index.php"><span class="glyphicon glyphicon-home"></span>Data Alamat</a></li>
		</ul>
		<div class="side-footer">@Map Styles for SIG - UKM Kudus</div>
	</div>
	<div id="peta"></div>
	<script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
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
	</script>
</body>
</html>