<?php
require 'functions.php';
$datatampil = 10;
// $jumlahdata = count(tabel("SELECT * FROM ju"));
$datamuncul = ceil($jumlahdata / $datatampil);
if (isset($_GET['page'])) {
	$halamanaktif = $_GET['page'];
} else {
	$halamanaktif = 1;
}
$awaldata = $datatampil * $halamanaktif - $datatampil;
// $tampil = tabel("SELECT * FROM ju LIMIT $awaldata, $datatampil");

if (isset($_GET["submit"])) {
	if ($_GET['tgl'] >= 1 && $_GET['tgl'] <= 31) {
		$tgl = $_GET['tgl'];
		// $tampil = tabel("SELECT * FROM ju WHERE Tanggal = $tgl");
	} else {
		echo "<script>
				alert('Tanggal yang Anda masukkan salah!');
				document.location.href = 'ju.php';
			</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Jurnal Umum</title>
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/screen.css" />
	<style>
		#isi {
			width: auto;
			background-color: white;
			margin: 10px;
			padding: 15px;
		}

		table {
			width: 100%;
		}

		th {
			height: 25px;
			line-height: 25px;
		}

		td {
			text-align: center;
		}

		#keterangan {
			text-align: left
		}

		h2,
		h3,
		h4 {
			color: black;
		}

		.kiri {
			float: left;
			width: 50%;
		}

		.kanan {
			float: right;
			width: 50%;
		}
	</style>
</head>

<body>
	<!-- Header -->
	<header id="header" class="alt">
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

	<!-- Banner -->
	<section class="banner full">
		<article>
			<img src="images/slide01.jpg" alt="" />
			<div class="inner">
				<header>
					<p>A free responsive website template by <a href="https://templated.co">TEMPLATED</a></p>
					<h2>Azalec</h2>
				</header>
			</div>
		</article>
		<article>
			<img src="images/slide02.jpg" alt="" />
			<div class="inner">
				<header>
					<p>Semua makhluk hebat dalam satu hal, tapi tidak dalam segala hal</p>
					<h2>-Spongebob Squarepants-</h2>
				</header>
			</div>
		</article>
		<article>
			<img src="images/slide03.jpg" alt="" />
			<div class="inner">
				<header>
					<p>Terkadang apa yang tidak kau bicarakan lebih bernilai daripada yang kau bicarakan</p>
					<h2>-Eugene Crab-</h2>
				</header>
			</div>
		</article>
		<article>
			<img src="images/slide04.jpg" alt="" />
			<div class="inner">
				<header>
					<p>Tidak ada yang memikirkan nasib buruk selama mereka mendapatkan yang mereka mau</p>
					<h2>-Squidward Tentacles-</h2>
				</header>
			</div>
		</article>
		<article>
			<img src="images/slide05.jpg" alt="" />
			<div class="inner">
				<header>
					<p>Pemujaan yang berlebihan itu tidak sehat</p>
					<h2>-Patrick Star-</h2>
				</header>
			</div>
		</article>
	</section>

	<!-- One -->
	<section id='isi'>
		<center>
			<h2>Azalec .co,</h2>
			<h2>Jurnal Umum</h2>
			<h3>Per 31 Desember 2019</h3>
			<h4>
				<1=Rp1.000>
			</h4>
		</center>
		<form action="" method="get">
			<input type="text" name="tgl" size="40" placeholder="Masukkan tanggal transaksi!">
			<button class="button special icon fa-search" type="submit" name="submit">Cari!</button>
		</form>
		<div class='kiri'>
			<p style='Text-align:left;'>
				<?php if ($halamanaktif > 1) : ?>
					<a href="?page=<?= $halamanaktif - 1 ?>">&lt</a>
				<?php endif; ?>
				<?php for ($i = 1; $i <= $datamuncul; $i++) : ?>
					<?php if ($i == $halamanaktif) : ?>
						<a href="?page=<?= $i ?>" style="font-weight:bold;color:blue;font-family:arial;">
							<?= $i ?>
						</a>
					<?php else : ?>
						<a href="?page=<?= $i ?>"><?= $i ?></a>
					<?php endif; ?>
				<?php endfor; ?>
				<?php if ($halamanaktif < $datamuncul) : ?>
					<a href="?page=<?= $halamanaktif + 1 ?>">&gt</a>
				<?php endif; ?>
			</p>
		</div>
		<p class='kanan' style='Text-align:right;'>Hal : 0<?= $halamanaktif; ?></p>
		<table border="3">
			<tr>
				<th>Tgl</th>
				<th>Keterangan</th>
				<th>Ref</th>
				<th>Debit</th>
				<th>Kredit</th>
			</tr>
			<!-- isinya -->
			<?php foreach ($tampil as $ju) : ?>
				<tr>
					<td><?= $ju["Tanggal"]; ?></td>
					<?php if ((int)$ju["Kredit"] > 0 && $ju["Debit"] == 0) : ?>
						<td><?= $ju["Keterangan"]; ?></td>
						<td><?= $ju["Ref"]; ?></td>
						<td>-</td>
						<td><?= $ju["Kredit"]; ?></td>
					<?php endif;
					if ((int)$ju["Kredit"] == 0 && $ju["Debit"] > 0) : ?>
						<td id='keterangan'><?= $ju["Keterangan"]; ?></td>
						<td><?= $ju["Ref"]; ?></td>
						<td><?= $ju["Debit"]; ?></td>
						<td>-</td>
					<?php endif; ?>
				</tr>
			<?php endforeach; ?>
		</table>
	</section>

	<!-- Two -->
	<section id="two" class="wrapper style3">
		<div class="inner">
			<header class="align-center">
				<p>Satu-satunya hal yang kuketahui adalah bahwa aku tidak tahu apa-apa</p>
				<h2>--Socrates--</h2>
			</header>
		</div>
	</section>

	<!-- Three -->
	<section id="three" class="wrapper style2">
		<div class="inner">
			<header class="align-center">
				<p class="special">Kami tidak pernah menkhianati pelanggan meskipun permintaannya aneh-aneh</p>
				<h2>Azalec .co,</h2>
			</header>
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