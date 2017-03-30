<?php
require_once 'lib/koneksi.php';
require_once 'lib/kriptografi.php';
require_once 'lib/tgl_indo.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}

$pilih = $db->query("SELECT nama, tgl_login FROM db_admin");
$namaadmin = $pilih->fetch();

$nama 		= filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
$kode 		= filter_input(INPUT_POST, 'kode', FILTER_SANITIZE_STRING);
$pwd_lama 	= filter_input(INPUT_POST, 'pwd_lama', FILTER_SANITIZE_STRING);
$pwd_baru	= filter_input(INPUT_POST, 'pwd_baru', FILTER_SANITIZE_STRING);

$key = hash('sha256', $kode . $pwd_lama, true);
$test = new mcrypt();
$encrypted = $test->encryptIt($pwd_lama);


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$sql = $db->prepare("SELECT nama, salt, password FROM db_admin");
	$sql->execute();
	$query = $sql->fetch();

	if ($encrypted  != $query['password']){
        $error['pwd_lama'] = TRUE;
    }

    if (empty($pwd_baru)) {
    	$error['pwd_baru'] = TRUE;
    }

    if (empty($error)) {
    	$key = hash('sha256', $kode . $pwd_baru, true);
    	$test = new mcrypt();
    	$encrypted = $test->encryptIt($pwd_baru);
        $sql = $db->prepare("UPDATE db_admin SET nama = :nama, salt = :salt, password = :password");
        $sql->bindValue(':nama', $nama, PDO::PARAM_STR);
        $sql->bindValue(':salt', $kode, PDO::PARAM_STR);
        $sql->bindValue(':password', $encrypted, PDO::PARAM_STR);
        $sql->execute();

        header("Location: admin.php");
        exit();
    }
}
else{
	$sql = $db->query('SELECT  nama, salt, password FROM db_admin');
	$sql->execute();
	$query = $sql->fetch();
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
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
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Selamat Datang,  <?php echo ucfirst($namaadmin['nama']); ?> <b class="caret"></b></a>
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
		<h5>Terakhir login : <br/><?php echo tanggal_format_indonesia($namaadmin['tgl_login']);?></h5>
		<ul>
			<li><a href="kecamatan/index.php"><span class="glyphicon glyphicon-list-alt"></span>Data Kecamatan</a></li>
			<li><a href="kategori/index.php"><span class="glyphicon glyphicon-folder-open"></span>Data Kategori</a></li>
			<li><a href="produksi/index.php"><span class="glyphicon glyphicon-cutlery"></span>Data Produksi</a></li>
			<li><a href="alamat/index.php"><span class="glyphicon glyphicon-home"></span>Data Alamat</a></li>
		</ul>
		<div class="side-footer">@Map Styles by Ulil Albab</div>
	</div>

	<div class="content">
		<form action="" method="post" role="form" class="well form-inline">	
			<?php if (isset($error['pwd_lama'])): ?>
				<label class="alert alert-dismissable alert-danger kesalahan" for="pwd_lama"><p>Password salah!!</p></label>
			<?php endif; ?>
			<?php if (isset($error['pwd_baru'])): ?>
				<label class="alert alert-dismissable alert-danger kesalahan" for="pwd_baru"><p>Password tidak boleh kosong!!</p></label>
			<?php endif; ?>			
			<div class="control-group">
				<label class="control-label">Nama</label>
				<div class="controls">
					<input type="text" class="form-control" name="nama" value="<?php echo $query['nama'];?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Kode</label>
				<div class="controls">
					<input type="text" class="form-control" name="kode" value="<?php echo $query['salt'];?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Password Lama</label>
				<div class="controls">
					<input type="password" class="form-control" name="pwd_lama">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Password Baru</label>
				<div class="controls">
					<input type="password" class="form-control" name="pwd_baru">
				</div>
			</div>
			<div class="control-group">
				<div class="controls simpandata">
					<input type="submit" class="btn btn-success" value="Update">
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html>