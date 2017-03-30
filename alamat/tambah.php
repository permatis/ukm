<?php
require_once '../lib/koneksi.php';
require_once '../lib/tgl_indo.php';

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
}

$error 	= '';
$pilih 	= $db->query("SELECT nama, tgl_login FROM db_admin");
$nama  	= $pilih->fetch();

$query = $db->prepare("SELECT kd_kecamatan, nama_kecamatan FROM db_kecamatan ORDER BY nama_kecamatan ASC");
$query->execute();
$sql = $query->fetchAll(PDO::FETCH_OBJ);

$query1 = $db->prepare("SELECT DISTINCT kd_produksi, nama_produksi FROM db_produksi ORDER BY nama_produksi ASC");
$query1->execute();
$sql1 = $query1->fetchAll(PDO::FETCH_OBJ);

$kd_kecamatan 	= filter_input(INPUT_POST, 'kecamatan', FILTER_SANITIZE_STRING);
$jenis_usaha	= filter_input(INPUT_POST, 'jenis_usaha', FILTER_SANITIZE_STRING);
$nama_usaha 	= filter_input(INPUT_POST, 'nama_usaha', FILTER_SANITIZE_STRING);
$pemilik 		= filter_input(INPUT_POST, 'pemilik', FILTER_SANITIZE_STRING);
$tenaga 		= filter_input(INPUT_POST, 'tenaga', FILTER_SANITIZE_STRING);
$investasi 		= filter_input(INPUT_POST, 'investasi', FILTER_SANITIZE_STRING);
$alamat 		= filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
$keterangan 	= filter_input(INPUT_POST, 'keterangan', FILTER_SANITIZE_STRING);
$lang 			= filter_input(INPUT_POST, 'lang', FILTER_SANITIZE_STRING);
$lat 			= filter_input(INPUT_POST, 'lat', FILTER_SANITIZE_STRING);

$carikec = $db->prepare("SELECT nama_kecamatan FROM db_kecamatan WHERE kd_kecamatan = :kd_kecamatan");
$carikec->bindParam(":kd_kecamatan", $kd_kecamatan);
$carikec->execute();
$kecamatan = $carikec->fetch();

$cariusaha = $db->query("SELECT nama_produksi FROM db_produksi WHERE kd_produksi IN('$jenis_usaha')");
$usaha = $cariusaha->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($kd_kecamatan))
		$error .= '<li> Kecamatan tidak boleh kosong.</li>';
	if (empty($jenis_usaha))
		$error .= '<li> Jenis usaha tidak boleh kosong.</li>';
	if(empty($pemilik))
		$error .= '<li> Nama pemilik tidak boleh kosong.</li>';
	if(empty($tenaga))
		$error .= '<li> Tenaga kerja tidak boleh kosong.</li>';
	if(empty($investasi))
		$error .= '<li> Investasi tidak boleh kosong.</li>';
	if(empty($alamat))
		$error .= '<li> Alamat tidak boleh kosong.</li>';
	if(empty($keterangan))
		$error .= '<li> Keterangan tidak boleh kosong.</li>';
	if(empty($lat))
		$error .= '<li> Latitude tidak boleh kosong.</li>';
	if(empty($lang))
		$error .= '<li> Longitude tidak boleh kosong.</li>';

	if(!empty($_FILES)){
		$tipedata	= array("jpeg", "jpg", "png");
		$extension 	= explode('.', $_FILES['file']['name']);
		$type 		= array("image/jpeg", "image/jpg", "image/png");

		if (in_array($extension[1], $tipedata) && in_array($_FILES['file']['type'], $type) && $_FILES['file']['size'] < 2000000) {
			$nama = strtotime("now");
			$namafile = $nama.".".$extension[1];
			move_uploaded_file($_FILES['file']['tmp_name'], "../assets/upload/".$namafile);
		}
		else{
			$error .= '<li>File tidak didukung.</li>';
		}
	}

	if (empty($error)) {

		$cariid = $db->query("SELECT kd_alamat FROM db_alamat WHERE kd_produksi IN('$jenis_usaha') ORDER BY kd_alamat DESC");
    	$ids = $cariid->fetch();

    	if(empty($ids)){
    		$kode1 = substr($jenis_usaha, 1, 2);
    		$kode2 = substr($jenis_usaha, 3, 2);
    		$kd_alamat = $kode1.'.'.$kode2.'.001';

    	}
    	else{
    		$tambahid = substr($ids['kd_alamat'], 6,3);
	    	$tambahid++;
	    	$formatid 	= sprintf("%03s",$tambahid);
	    	$kd_alamat	= substr_replace($ids['kd_alamat'], $formatid, 6, 3);
    	}


	    $sql = $db->prepare('INSERT db_alamat SET kd_alamat = :kd_alamat, kd_produksi = :kd_produksi, kd_kecamatan = :kd_kecamatan, 
	    	nama_usaha = :nama_usaha, pemilik = :pemilik, tng_kerja = :tng_kerja, nilai_investasi = :nilai_investasi, alamat = :alamat, keterangan = :keterangan, lang = :lang, lat = :lat, gambar = :gambar');
	    $sql->bindValue(':kd_alamat', $kd_alamat, PDO::PARAM_STR);
	    $sql->bindValue(':kd_produksi', $jenis_usaha, PDO::PARAM_STR);
	    $sql->bindValue(':kd_kecamatan', $kd_kecamatan, PDO::PARAM_STR);
	    $sql->bindValue(':nama_usaha', $nama_usaha, PDO::PARAM_STR);
	    $sql->bindValue(':tng_kerja', $tenaga, PDO::PARAM_INT);
	    $sql->bindValue(':nilai_investasi', $investasi, PDO::PARAM_INT);
	    $sql->bindValue(':pemilik', $pemilik, PDO::PARAM_STR);
	    $sql->bindValue(':alamat', $alamat, PDO::PARAM_STR);
	    $sql->bindValue(':keterangan', $keterangan, PDO::PARAM_STR);
	    $sql->bindValue(':lang', $lang, PDO::PARAM_STR);
	    $sql->bindValue(':lat', $lat, PDO::PARAM_STR);
	    $sql->bindValue(':gambar', $namafile, PDO::PARAM_STR);
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
	<title>Tambah Data Alamat</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
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
		<h5>Terakhir Login: <?php echo tanggal_format_indonesia($nama['tgl_login']);?></h5>
		<ul>
			<li><a href="../kecamatan/index.php"><span class="glyphicon glyphicon-list-alt"></span>Data Kecamatan</a></li>
			<li><a href="../kategori/index.php"><span class="glyphicon glyphicon-folder-open"></span>Data Kategori</a></li>
			<li><a href="../produksi/index.php"><span class="glyphicon glyphicon-cutlery"></span>Data Produksi</a></li>
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Data Alamat</a></li>
		</ul>
		<div class="side-footer">@Map Styles for SIG - UKM Kudus</div>
	</div>

	<div class="content">
		<div id="peta_admin"></div>
		<?php if(!empty($error))
		echo "<div class='alert alert-warning alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<h3>Kesalahan!</h3>
			<ol>".$error."</ol>
		</div>"; ?>
		<form action="tambah.php" method="post" role="form" enctype="multipart/form-data">
			<div class="col-xs-6">
				<div class="control-group">
					<label class="control-label">Pilih Kecataman</label>
					<div class="controls">
						<select class="form-control" id="kecamatan" name="kecamatan">
							<option value="<?php if(isset($kd_kecamatan)) echo $kd_kecamatan; ?>"><?php if(!empty($kd_kecamatan)){echo $kecamatan['nama_kecamatan'];}else{echo "Pilih Kategori ";}?></option>
							<?php
								foreach($sql as $hasil):
							?>
							<option value="<?php echo $hasil->kd_kecamatan;?>"><?php echo $hasil->nama_kecamatan;?></option>
							<?php
								endforeach;
							?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Jenis Usaha</label>
					<div class="controls">
						<select class="form-control" id="jenis_usaha" name="jenis_usaha">
							<option value="<?php if(isset($jenis_usaha)) echo $jenis_usaha; ?>"><?php if(!empty($jenis_usaha)){echo $usaha['nama_produksi'];}else{echo "Pilih Kategori ";}?></option>
							<?php
								foreach($sql1 as $hasil1):
							?>
							<option value="<?php echo $hasil1->kd_produksi;?>"><?php echo $hasil1->nama_produksi;?></option>
							<?php
								endforeach;
							?>
						</select> 
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Nama Usaha</label>
					<div class="controls">
						<input type="text" class="form-control" name="nama_usaha" value="<?php if(isset($nama_usaha)) echo $nama_usaha; ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Pemilik</label>
					<div class="controls">
						<input type="text" class="form-control" name="pemilik" value="<?php if(isset($pemilik)) echo $pemilik; ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Tenaga Kerja</label>
					<div class="controls">
						<input type="text" class="form-control" name="tenaga" value="<?php if(isset($tenaga)) echo $tenaga; ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Investasi</label>
					<div class="controls">
						<input type="text" class="form-control" name="investasi" value="<?php if(isset($investasi)) echo $investasi; ?>">
					</div>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="control-group">
					<label class="control-label">Alamat</label>
					<div class="controls">
						<textarea name="alamat" class="form-control" rows="3" id="alamat"><?php if(isset($alamat)) echo $alamat; ?></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Keterangan</label>
					<div class="controls">
						<textarea name="keterangan" class="form-control " rows="3"><?php if(isset($keterangan)) echo $keterangan; ?></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Latitude</label>
					<div class="controls">
						<input type="text" class="form-control" name="lat" id="latitude" value="<?php if(isset($lat)) echo $lat; ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Longitude</label>
					<div class="controls">
						<input type="text" class="form-control" name="lang" id="longitude" value="<?php if(isset($lang)) echo $lang; ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Gambar</label>
					<div class="controls">
						<input type="file" class="form-control" name="file">
					</div>
				</div>
				<div class="control-group">
					<div class="controls simpandata">
						<input type="submit" class="btn btn-success" value="Simpan">
					</div>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="../assets/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script src="http://maps.google.com/maps/api/js?key=AIzaSyCuMaTOkQza78fBlAeyzP-2YLVIbkgiCXg&callback=initMap"></script>	
	<script type="text/javascript">
	//Jika default, posisi center berada di pusat kota Kudus
	var map;
	function initialize() {
		var mapOptions = {
			zoom: 12,
			center: new google.maps.LatLng(-6.804087, 110.838203)
		};
		map = new google.maps.Map(document.getElementById('peta_admin'), mapOptions);
	}
	google.maps.event.addDomListener(window, 'load', initialize);

	//Jika sudah memilih kecamatannya, posisi center akan berubah sesuai dengan kecamatan yang dipilih
	$(document).ready(function(){
		$('#kecamatan'). change(function(){
			var kd_kecamatan = $('#kecamatan').val();
			$.ajax({
				type : "POST",
				url : "../lib/kecamatan.php",
				dataType: "json", 
				data : 'kd_kecamatan='+ kd_kecamatan,
				success : function(data){
					function mendapatkanLatLang(latLng){
						document.getElementById('latitude').value = [latLng.lat()];
						document.getElementById('longitude').value = [latLng.lng()];
					}
					
					var mapOptions = {
						zoom: 12,
						center: new google.maps.LatLng(data[0], data[1])
					};

					var map = new google.maps.Map(document.getElementById('peta_admin'),mapOptions);
					var latLng = new google.maps.LatLng(data[0], data[1]);

					var marker = new google.maps.Marker({
						position 	: latLng,
						title		: 'Cari Alamat',
						map 		: map,
						draggable	: true
					});

					mendapatkanLatLang(latLng);
					google.maps.event.addListener(marker, 'drag', function(){
						mendapatkanLatLang(marker.getPosition());
					});
				}
			});
		});
	});
	</script>
</body>
</html>