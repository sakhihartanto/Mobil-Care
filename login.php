<?php

session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$koneksi = new mysqli("localhost", "root", "", "inventori");

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sistem Inventaris Barang</title>

	<!-- Bootstrap -->

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style>
		body {
			background: url(img/grey.jpg) no-repeat fixed;
			-webkit-background-size: 100% 100%;
			-moz-background-size: 100% 100%;
			-o-background-size: 100% 100%;
			background-size: 100% 100%;
		}

		.row {
			margin: 100px auto;
			width: 300px;
			text-align: center;
		}

		.login {
			background-color: #FFFFFF;
			padding: 20px;
			margin-top: 20px;
		}
	</style>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

	<div class="container">
		<div class="row">
			<div class="center">
				<div class="login">



					<form role="form" action="" method="post">
						<img src="img/logo1.png" width="234" height="75"></img>
						<br>
						<br>
						<div class="form-group">


							<input type="text" name="username" class="form-control" placeholder="Masukan Username" required autofocus />
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Masukan Password" required autofocus />
						</div>
						<div class="form-group">
							<select name="jabatan" class="form-control" required>
								<option value="">Pilih Jabatan </option>
								<option value="pimpinan">Pimpinan Divisi</option>
								<option value="staf">Staf Umum</option>
								<option value="mekanik">Mekanik</option>

							</select>
						</div>
						<div class="form-group">
							<input type="submit" name="login" class="btn btn-primary btn-block" value="Masuk" />

						</div>
						<br>

					</form>

				</div>

			</div>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
</body>

</html>

<?php

$username = $_POST['username'];
$password = md5($_POST['password']);
$login = $_POST['login'];
$jabatan = $_POST['jabatan'];

if ($login) {
	$sql = $koneksi->query("select * from users where username='$username' and password='$password'");
	$ketemu = $sql->num_rows;
	$data = $sql->fetch_assoc();

	if ($ketemu >= 1) {
		session_start();

		if ($data['jabatan'] == pimpinan && $jabatan == pimpinan) {
			$_SESSION['pimpinan'] = $data[id];

			header("location:index3.php");
		} else if ($data['jabatan'] == staf && $jabatan == staf) {
			$_SESSION['staf'] = $data[id];

			header("location:index.php");
		} else if ($data['jabatan'] == mekanik && $jabatan == mekanik) {
			$_SESSION['mekanik'] = $data[id];

			header("location:index2.php?page=pemeliharaan");
		}
	} else {
		echo '<center><div class="alert alert-danger">Upss...!!! Login gagal. Silakan Coba Kembali</div></center>';
	}
}

?>