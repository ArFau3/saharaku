<?php
include '../app/Controllers/koneksi.php';

$data = $_POST['data'];
$id = $_POST['id'];

$n = strlen($id);
$m = ($n == 2 ? 5 : ($n == 5 ? 8 : 13));
?>
<?php
if ($data == "kabupaten") {
?>
	Kabupaten/Kota
	<select id="form_kab">
		<option value="">Pilih Kabupaten/Kota</option>
		<?php
		$daerah = mysqli_query($koneksi, "SELECT kode,nama FROM wilayah_2022 WHERE LEFT(kode,'$n')='$id' AND CHAR_LENGTH(kode)=$m ORDER BY nama");

		while ($d = mysqli_fetch_array($daerah)) {
		?>
			<option value="<?php echo $d['nama']; ?>"><?php echo $d['nama']; ?></option>
		<?php
		}
		?>
	</select>

<?php
}
?>