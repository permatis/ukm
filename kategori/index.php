<?php
require_once '../lib/koneksi.php';
require_once '../lib/tgl_indo.php';

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
}

$pilih 	= $db->query("SELECT nama, tgl_login FROM db_admin");
$nama  	= $pilih->fetch();

$tabel 	= $db->prepare("SELECT * FROM db_kategori ORDER BY kd_kategori ASC");
$tabel->execute();
$hasil	= $tabel->fetchAll(PDO::FETCH_OBJ);

?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data Kategori</title>
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
		<h3>DATA KATEGORI</h3>
		<hr>
		<table class="table table-hover table-bordered table-striped" id="example">
			<thead>
				<th>Kode Kategori</th>
				<th>Nama Kategori</th>
				<th>Nama Icon</th>
				<th>Actions</th>
			</thead>
			<?php
			foreach($hasil as $sql):
			?>
			<tr>
				<td><?php echo $sql->kd_kategori;?></td>
				<td><?php echo $sql->nama_kategori;?></td>
				<td><?php echo $sql->icon;?></td>
				<td>
					<div class="aksi">
						<a href="edit.php?id=<?php echo $sql->id_kategori; ?>"><span class="glyphicon glyphicon-edit"></span></a>
						<a href="hapus.php?id=<?php echo $sql->id_kategori; ?>"><span class="glyphicon glyphicon-trash"></span></a>
					</div>
				</td>
			</tr>
			<?php
			endforeach;
			?>
		</table>
		<div class="tambah">
			<a href="tambah.php" class="btn btn-success">Tambah Data</a>
		</div>
	</div>
	<script type="text/javascript" src="../assets/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../assets/js/datatables.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
</body>
</html>