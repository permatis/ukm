<?php
require_once '../lib/koneksi.php';
require_once '../lib/tgl_indo.php';

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
}

$pilih 	= $db->query("SELECT nama, tgl_login FROM db_admin");
$nama  	= $pilih->fetch();
$error	= '';


$id 			= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$nama_kecamatan	= filter_input(INPUT_POST, 'nama_kecamatan', FILTER_SANITIZE_STRING);
$lat 			= filter_input(INPUT_POST, 'lat', FILTER_SANITIZE_STRING);
$lang 			= filter_input(INPUT_POST, 'lang', FILTER_SANITIZE_STRING);

$sql = $db->prepare("SELECT nama_kecamatan, kd_kecamatan, lat, lang FROM db_kecamatan WHERE id_kecamatan = :id_kecamatan");
$sql->bindValue(':id_kecamatan', $id);
$sql->execute();
$query = $sql->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(empty($nama_kecamatan))
		$error .= "<li> Nama kecamatan tidak boleh kosong.</li>";
	if(empty($lang))
		$error .= "<li> Longitude tidak boleh kosong.</li>";
	if (empty($lat))
		$error .= "<li> Latitude tidak boleh kosong.</li>";

	$check  	= $db->query("SELECT kd_kecamatan, nama_kecamatan FROM db_kecamatan WHERE nama_kecamatan IN('$nama_kecamatan');");
	$validasi 	= $check->fetch();

	if($nama_kecamatan != $query['nama_kecamatan'] && !empty($validasi)){
		$error .= "<li> Kecamatan ".$nama_kecamatan." sudah ada.</li>"; 
	}

    if (empty($error)){
		$sql = $db->prepare('UPDATE db_kecamatan SET kd_kecamatan = :kd_kecamatan, nama_kecamatan = :nama_kecamatan, lang = :lang, lat = :lat WHERE id_kecamatan = :id');
	    $sql->bindValue(':id', $id, PDO::PARAM_INT);
	    $sql->bindValue(':kd_kecamatan', $query['kd_kecamatan'], PDO::PARAM_STR);
	    $sql->bindValue(':nama_kecamatan', $nama_kecamatan, PDO::PARAM_STR);
	    $sql->bindValue(':lang', $lang, PDO::PARAM_STR);
	    $sql->bindValue(':lat', $lat, PDO::PARAM_STR);

	    $sql->execute();
	    header('Location: index.php');
	    exit();
	}
}

	
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/hmtl; charset=utf-8;">
	<title>Edit Data Kecamatan</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-header">
				<a href="../index.php" class="navbar-brand">SIG USAHA UKM KUDUS</a>
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
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Selamat Datang, <?php echo ucfirst($nama['nama']); ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="../gantipassword.php">Ganti Password</a></li>
								<li><a href="../logout.php">Keluar</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="sidebar">
		<h5>Terakhir Login: <br/><?php echo tanggal_format_indonesia($nama['tgl_login']);?></h5>
		<ul>
			<li><a href="index.php"><span class="glyphicon glyphicon-list-alt"></span>Data Kecamatan</a></li>
			<li><a href="../kategori/index.php"><span class="glyphicon glyphicon-folder-open"></span>Data Kategori</a></li>
			<li><a href="../produksi/index.php"><span class="glyphicon glyphicon-cutlery"></span>Data Produksi</a></li>
			<li><a href="../alamat/index.php"><span class="glyphicon glyphicon-home"></span>Data Alamat</a></li>
		</ul>
		<div class="side-footer">@Map Styles by Ulil Albab</div>
	</div>
	
	<div class="content">
		<div id="peta_admin"></div>
		<?php if(!empty($error))
		echo "<div class='alert alert-warning alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<h3>Kesalahan!</h3>
			<ol>".$error."</ol>
		</div>"; ?>
		<form action="edit.php?id=<?php echo $id; ?>" method="post" role="form" class="well form-inline">
			<div class="control-group">
				<label class="control-label">Nama Kecamatan</label>
				<div class="controls">
					<input type="text" class="form-control" name="nama_kecamatan" value="<?php if(isset($nama_kecamatan) && $query['nama_kecamatan']){echo $nama_kecamatan;}else{echo $query['nama_kecamatan'];}?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Latitude</label>
				<div class="controls">
					<input type="text" class="form-control" name="lat" id="latitude" value="<?php if(isset($lat) && $query['lat']){echo $lat;}else{echo $query['lat'];}?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Longitude</label>
				<div class="controls">
					<input type="text" class="form-control" name="lang" id="longitude" value="<?php if(isset($lang) && $query['lang']){echo $lang;}else{echo $query['lang'];}?>">
				</div>
			</div>
			<div class="control-group">
				<div class="controls simpandata">
					<input type="submit" class="btn btn-success" value="Update">
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="../assets/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript">
		function mendapatkanLatLang(latLng){
			document.getElementById('latitude').value = [latLng.lat()];
			document.getElementById('longitude').value = [latLng.lng()];
		}

		var mapOptions = {
			zoom 		: 12,
			center		: new google.maps.LatLng(<?php echo $query['lat'];?>, <?php echo $query['lang'];?>),
			mapTypeId	: google.maps.MapTypeId.ROADMAP
		};

		var map = new google.maps.Map(document.getElementById('peta_admin'),mapOptions);

		var latLng = new google.maps.LatLng(<?php echo $query['lat'];?>, <?php echo $query['lang'];?>);

		var marker = new google.maps.Marker({
			position 	: latLng,
			title		: 'Cari Kecamatan',
			map 		: map,
			draggable	: true
		});

		mendapatkanLatLang(latLng);
		google.maps.event.addListener(marker, 'drag', function(){
			mendapatkanLatLang(marker.getPosition());
		});
	</script>
</body>
</html>