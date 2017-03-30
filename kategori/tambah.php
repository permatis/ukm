<?php
require_once '../lib/koneksi.php';
require_once '../lib/tgl_indo.php';

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
}

$pilih 	= $db->query("SELECT nama, tgl_login FROM db_admin");
$nama  	= $pilih->fetch();
$error	= '';

$nama_kategori	= filter_input(INPUT_POST, 'nama_kategori', FILTER_SANITIZE_STRING);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(empty($nama_kategori))
		$error .= "<li> Nama kategori tidak boleh kosong.</li>";
	
	$query  = $db->query("SELECT nama_kategori FROM db_kategori WHERE nama_kategori IN('$nama_kategori');");
	$sql 	= $query->fetch();

	if (!empty($sql))
		$error .= "<li> Kategori ".$nama_kategori." sudah ada.</li>"; 

	if(!empty($_FILES)){
		$tipedata	= "png";
		$extension 	= explode('.', $_FILES['file']['name']);
		$type 		= "image/png";

		if (in_array($extension[1], $tipedata) && in_array($_FILES['file']['type'], $type) && $_FILES['file']['size'] < 200000) {
			move_uploaded_file($_FILES['file']['tmp_name'], "../assets/img/".$_FILES['file']['name']);
		}
		else{
			$error .= '<li>File tidak didukung.</li>';
		}
	}

    if (empty($error)){
    	$cariid =$db->query("SELECT kd_kategori FROM db_kategori ORDER BY kd_kategori DESC");
    	$id = $cariid->fetch();

    	$tambahid = substr($id['kd_kategori'], 1,2);
    	$tambahid++;
    	$formatid = sprintf("%02s",$tambahid);
    	$kd_kategori = 'K'.$formatid;

    	$data = $db->prepare('INSERT db_kategori SET kd_kategori = :kd_kategori, nama_kategori = :nama_kategori, icon = :icon');
	    $data->bindValue(':kd_kategori', $kd_kategori, PDO::PARAM_STR);
	    $data->bindValue(':nama_kategori', $nama_kategori, PDO::PARAM_STR);
	    $data->bindValue(':icon', $_FILES['file']['name'], PDO::PARAM_STR);
	    $data->execute();
	    header('Location: index.php');
	    exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/hmtl; charset=utf-8;">
	<title>Tambah Data Kategori</title>
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
		<h5>Terakhir Login: <?php echo tanggal_format_indonesia($nama['tgl_login']);?></h5>
		<ul>
			<li><a href="../kecamatan/index.php"><span class="glyphicon glyphicon-list-alt"></span>Data Kecamatan</a></li>
			<li><a href="index.php"><span class="glyphicon glyphicon-folder-open"></span>Data Kategori</a></li>
			<li><a href="../produksi/index.php"><span class="glyphicon glyphicon-cutlery"></span>Data Produksi</a></li>
			<li><a href="../alamat/index.php"><span class="glyphicon glyphicon-home"></span>Data Alamat</a></li>
		</ul>
		<div class="side-footer">@Map Styles by Ulil Albab</div>
	</div>
	
	<div class="content">
		<?php if(!empty($error))
		echo "<div class='alert alert-warning alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<h3>Kesalahan!</h3>
			<ol>".$error."</ol>
		</div>"; ?>
		<form action="tambah.php" method="post" role="form" class="well form-inline" enctype="multipart/form-data">
			<div class="control-group">
				<label class="control-label">Nama Kategori</label>
				<div class="controls">
					<input type="text" class="form-control" name="nama_kategori" value="<?php if(isset($nama_kategori)) echo $nama_kategori;?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Icon</label>
				<div class="controls">
					<input type="file" class="form-control" name="file">
				</div>
			</div>
			<div class="control-group">
				<div class="controls simpandata">
					<input type="submit" class="btn btn-success" value="Simpan">
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="../assets/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
</body>
</html>