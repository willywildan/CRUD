<?php

	$name = "";
	$id = 0;
	$edit_state = false;

	$db = mysqli_connect('localhost', 'root', '', 'tugas');


	if (isset($_POST['save'])) {
		$name = $_POST['name'];

		$query = "INSERT INTO departmen (name) VALUES ('$name')";
		mysqli_query($db, $query);
		header('location: index.php');
	}

	if (isset($_POST['update'])) {
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$id = mysqli_real_escape_string($db, $_POST['id']);

		mysqli_query($db, "UPDATE departmen SET name='$name' WHERE id=$id");
		header('location: index.php');
	}

	if(isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM departmen WHERE id=$id");
		header('location: index.php');
	}

	$results = mysqli_query($db, "SELECT * FROM departmen");






?>