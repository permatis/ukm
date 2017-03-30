<?php
require_once 'lib/koneksi.php';
require_once 'lib/kriptografi.php';

if (isset($_SESSION['admin'])) {
	header("Location: admin.php");
}

$namauser 	= '';
$error		= array();

$nama 		= filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
$kode 		= filter_input(INPUT_POST, 'kode', FILTER_SANITIZE_STRING);
$password 	= filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$key = hash('sha256', $kode . $password, true);
	$test = new mcrypt();
	$encrypted = $test->encryptIt($password);
	$sql = $db->prepare("SELECT nama, salt, password FROM db_admin WHERE nama = :nama");
	$sql->bindValue(':nama', $nama, PDO::PARAM_STR);
	$sql->execute();
	$query = $sql->fetch();

    if ($nama != $query['nama']){
        $error['nama'] = TRUE;
    }
    else if ($kode != $query['salt']){
        $error['kode'] = TRUE;
    }
    else if ($encrypted != $query['password']){
        $error['password'] = TRUE;
    }

    if (empty($error)) {
        $sql = $db->prepare("SELECT nama FROM db_admin WHERE nama = :nama");

        $sql->bindValue(':nama', $nama, PDO::PARAM_STR);
        $sql->execute();
        $hasil = $sql->fetch();

        unset($encrypted);
        unset($query->salt);
        unset($query->password);

        $_SESSION['admin'] = $hasil;

        header("Location: admin.php");
    }
    else {
        $namauser = htmlentities($_POST['nama'], ENT_QUOTES, 'UTF-8');
        $kodeuser = htmlentities($_POST['kode'], ENT_QUOTES, 'UTF-8');
    }
}
?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">SIG USAHA UKM KUDUS</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".bs-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="container">
				<div class="collapse navbar-collapse bs-navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="home.php">Tentang Kudus</a></li>
						<li><a href="industri.php">Industri</a></li>
						<li><a href="index.php">Lokasi</a></li>
						<li class="active"><a href="login.php">Login</a></li>
					</ul>
				</div>
			</div>
		</div>
		<form action="" method="post" class="form-signin" role="form">
			<?php if (isset($error['nama'])): ?>
				<label class="alert alert-dismissable alert-danger kesalahan" for="nama"><p>Namanya salah!!</p></label>
			<?php endif; ?>
			<?php if (isset($error['kode'])): ?>
				<label class="alert alert-dismissable alert-danger kesalahan" for="kode"><p>Kode salah!!</p></label>
			<?php endif; ?>
			<?php if (isset($error['password'])): ?>
				<label class="alert alert-dismissable alert-danger kesalahan" for="password"><p>Password salah!!</p></label>
			<?php endif; ?>
			<h2 class="form-signin-heading">LOGIN SIG</h2>
			<input type="text" name="nama" class="form-control" placeholder="<?php if(!empty($namauser)){echo $namauser;}else{echo 'Nama';}?>" required="" autofocus="" value="<?php if(!empty($namauser)){echo $namauser;}?>">
			<input type="text" name="kode" class="form-control" placeholder="<?php if(!empty($kodeuser)){echo $kodeuser;}else{echo 'Kode';}?>" required="" autofocus="" value="<?php if(!empty($kodeuser)){echo $kodeuser;}?>">
			<input type="password" name="password"  class="form-control" placeholder="Password" required="" autofocus="">
			<input type="submit" value="Login" class="btn btn-lg btn-success btn-block">
		</form>
	</div>
	<script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>

</body>
</html>
