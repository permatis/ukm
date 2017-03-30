<?php
require_once '../lib/koneksi.php';
require_once '../lib/tgl_indo.php';

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
}

$pilih 	= $db->query("SELECT nama, tgl_login FROM db_admin");
$nama  	= $pilih->fetch();
$error	= '';

$carikategori 	= $db->query("SELECT kd_kategori, nama_kategori FROM db_kategori ORDER BY nama_kategori");
$dbkategori 	= $carikategori->fetchAll();	

$kd_kategori	= filter_input(INPUT_POST, 'kd_kategori', FILTER_SANITIZE_STRING);
$nama_produksi	= filter_input(INPUT_POST, 'nama_produksi', FILTER_SANITIZE_STRING);

$tmp 			= $db->prepare("SELECT nama_kategori FROM db_kategori WHERE kd_kategori = :kd_kategori");
$tmp->bindParam(":kd_kategori", $kd_kategori);
$tmp->execute();
$tmp_kategori 	= $tmp->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(empty($kd_kategori))
		$error .= "<li> Kode kategori tidak boleh kosong.</li>";
	if(empty($nama_produksi))
		$error .= "<li> Produksi tidak boleh kosong.</li>";

    if (empty($error)){
    	$cariid = $db->prepare("SELECT kd_produksi FROM db_produksi WHERE kd_kategori = :kd_kategori ORDER BY kd_produksi DESC");
    	$cariid->bindParam(":kd_kategori", $kd_kategori);
    	$cariid->execute();
    	$id = $cariid->fetch();

    	$tambahid = substr($id['kd_produksi'], 3,2);
    	if (empty($tambahid)) {
    		$kd_produksi = $kd_kategori.'01';
    	}
    	else{
    		$tambahid++;
    		$formatid 		= sprintf("%02s",$tambahid);
    		$kd_produksi 	= substr_replace($id['kd_produksi'], $formatid, 3, 2);
    	}

    	$data = $db->prepare('INSERT db_produksi SET kd_produksi = :kd_produksi, kd_kategori = :kd_kategori, nama_produksi = :nama_produksi');
	    $data->bindValue(':kd_produksi', $kd_produksi, PDO::PARAM_STR);
	    $data->bindValue(':kd_kategori', $kd_kategori, PDO::PARAM_STR);
	    $data->bindValue(':nama_produksi', $nama_produksi, PDO::PARAM_STR);
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
	<title>Tambah Data Produksi</title>
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
			<li><a href="../kategori/index.php"><span class="glyphicon glyphicon-folder-open"></span>Data Kategori</a></li>
			<li><a href="index.php"><span class="glyphicon glyphicon-cutlery"></span>Data Produksi</a></li>
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
		<form action="tambah.php" method="post" role="form" class="well">
			<div class="control-group">
				<label for="kd_kategori" class="control-label">Pilih Kategori</label>
				<div class="controls">
					<select name="kd_kategori" class="form-control">
						<option value="<?php if(isset($kd_kategori)) echo $kd_kategori; ?>"><?php if(!empty($kd_kategori)){echo $tmp_kategori['nama_kategori'];}else{echo "Pilih Kategori ";}?></option>
						<?php
						foreach($dbkategori as $kategori):
						?>
						<option value="<?php echo $kategori['kd_kategori'];?>"><?php echo $kategori['nama_kategori'];?></option>
						<?php
						endforeach;
						?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Nama Produksi</label>
				<div class="controls">
					<input type="text" class="form-control" name="nama_produksi" value="<?php if(isset($nama_produksi)) echo $nama_produksi;?>">
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