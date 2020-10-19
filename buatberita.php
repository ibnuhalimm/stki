<?php
include 'index.php';
include 'koneksi.php';
?>

<form method='POST'>
	<table>
		<tr>
			<td><b>Judul Berita: </b></td>
			<td><input type='text' name='judul' style='width:500px' /></td>
		</tr>
		<tr>
			<td><b>Isi berita: </b> </td>
			<td><textarea name='isi' cols='100' rows='10' tabindex='4'></textarea></td>
		<tr>
		<tr>
			<td><b>URL: </b></td>
			<td><input type='text' name='url' style='width:300px' /></td>
		</tr>
	</table>
	<input type="submit" value="Tambah!" name="BtnAdd"></td>
</form>

<?php
if (isset($_POST['BtnAdd'])) { // jika tombol 'BtnAdd' di klik, lakukan proses:
	$judul = $_POST['judul'];
	$isi = $_POST['isi'];
	$url = $_POST['url'];

	// masukkan ke database
	try {
		$query = "INSERT INTO berita (`judul`, `isi`, `url`) VALUES ('$judul', '$isi', '$url')";
		mysqli_query($koneksi, $query);

		echo "Data Tersimpan";

	} catch (\Throwable $th) {
		echo $th->getMessage();

	}
}
?>

<?php include 'footer.php' ?>