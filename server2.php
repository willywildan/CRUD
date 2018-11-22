<?php


	$nama = "";
	$namadpt = "";
	$id = 0;
	$update_state = false;

	$db = mysqli_connect('localhost', 'root', '', 'tugas');

	if (isset($_POST['save'])) {
		$nama = $_POST['nama'];
		$namadpt = $_POST['namadpt'];

		$query = "INSERT INTO pegawai (nama, namadpt) VALUES ('$nama', '$namadpt')";
		mysqli_query($db, $query);
		header('location: index2.php');
	}

	if (isset($_POST['update'])) {
		$nama = mysqli_real_escape_string($db, $_POST['nama']);
		$namadpt = mysqli_real_escape_string($db, $_POST['namadpt']);
		$id = mysqli_real_escape_string($db, $_POST['id']);

		mysqli_query($db, "UPDATE pegawai SET nama='$nama', namadpt='$namadpt' WHERE id=$id");
		header('location: index2.php');
	}

	if(isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM pegawai WHERE id=$id");
		header('location: index2.php');
	}


	$results = mysqli_query($db, "SELECT *FROM pegawai");


	?>