<?php
require_once '../lib/koneksi.php';
require_once '../lib/tgl_indo.php';

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
}

$pilih 	= $db->query("SELECT nama, tgl_login FROM db_admin");
$nama  	= $pilih->fetch();

$tabel 	= $db->prepare("SELECT * FROM db_alamat ORDER BY kd_alamat ASC");
$tabel->execute();
$hasil	= $tabel->fetchAll(PDO::FETCH_OBJ);

?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data Alamat</title>
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
		<h5>Terakhir Login: <br /><?php echo tanggal_format_indonesia($nama['tgl_login']);?></h5>
		<ul>
			<li><a href="../kecamatan/index.php"><span class="glyphicon glyphicon-list-alt"></span>Data Kecamatan</a></li>
			<li><a href="../kategori/index.php"><span class="glyphicon glyphicon-folder-open"></span>Data Kategori</a></li>
			<li><a href="../produksi/index.php"><span class="glyphicon glyphicon-cutlery"></span>Data Produksi</a></li>
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Data Alamat</a></li>
		</ul>
		<div class="side-footer">@Map Styles by Ulil Albab</div>
	</div>
	<div class="content">
		<h3>DATA ALAMAT</h3>
		<hr>
		<table class="table table-hover table-bordered table-striped" id="example">
			<thead>
				<tr>
					<th>Nama Usaha</th>
					<th>Pemilik</th>
					<th>Tenaga</th>
					<th>Investasi</th>
					<th>Alamat</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($hasil as $sql):
			?>
				<tr>
					<td><?php echo $sql->nama_usaha;?></td>
					<td><?php echo $sql->pemilik;?></td>
					<td><?php echo $sql->tng_kerja.' org';?></td>
					<td><?php echo 'Rp.'.number_format($sql->nilai_investasi,2,',','.');?></td>
					<td><?php echo $sql->alamat;?></td>
					<td>
						<div class="aksi">
							<a href="edit.php?id=<?php echo $sql->id_alamat; ?>"><span class="glyphicon glyphicon-edit"></span></a>
							<a href="hapus.php?id=<?php echo $sql->id_alamat; ?>"><span class="glyphicon glyphicon-trash"></span></a>
						</div>
					</td>
				</tr>			
			<?php
			endforeach;
			?>
			</tbody>
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