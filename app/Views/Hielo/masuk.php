<?php
/*
	session_start();
	if (isset($_SESSION['masuk'])) {
		header('Location: admin.php');
	} */
require "functions.php";
if (isset($_POST['submit'])) {
	$username = strtolower($_POST["name"]);
	// masuk($username);
}
?>
<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>

<head>
	<title>Hielo by TEMPLATED</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/screen.css" />
	<style>
		input {
			width: 100%;
		}

		label {
			font-size: 17px;
		}
	</style>
</head>

<body class="subpage">

	<!-- Header -->
	<header id="header">
		<div class="logo"><a href="index.html">Hielo <span>by TEMPLATED</span></a></div>
		<a href="#menu">Menu</a>
	</header>

	<!-- Nav -->
	<nav id="menu">
		<ul class="links">
			<li><a href="index.html">Home</a></li>
			<li><a href="jkk.php">Jurnal Pengeluaran Kas</a></li>
			<li><a href="jkm.php">Jurnal Penerimaan Kas</a></li>
			<li><a href="jb.php">Jurnal Pembelian</a></li>
			<li><a href="jj.php">Jurnal Penjualan</a></li>
			<li><a href="ju.php">Jurnal Umum</a></li>
			<li><a href="lk.php">Laporan Keuangan</a></li>
			<li><a href="masuk.php">Masuk sebagai Admin</a></li>
		</ul>
	</nav>
	<!-- One -->
	<section id="One" class="wrapper style3">
		<div class="inner">
			<header class="align-center">
				<p>Halaman Login</p>
				<h2>Azalec</h2>
			</header>
		</div>
	</section>

	<!-- Two -->
	<section id="two" class="wrapper style2">
		<div class="inner">
			<div class="box">
				<div class="content">
					<header class="align-center">
						<h2>Halaman Login</h2>
					</header>
					<form action="" method="post">
						<label for="name">Username : </label>
						<input type="text" name="name" id="name">
						<br>
						<br>
						<label for="pass">Password : </label>
						<input type="password" name="pass" id="pass">
						<br>
						<br>
						<button type="submit" name="submit">Login</button>
					</form>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer id="footer">
		<div class="container">
			<ul class="icons">
				<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
			</ul>
		</div>
		<div class="copyright">
			&copy; Untitled. All rights reserved.
		</div>
	</footer>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>