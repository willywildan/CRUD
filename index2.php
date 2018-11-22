<?php include('server2.php'); 

	if(isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update_state = true;
		$rec = mysqli_query($db, "SELECT * FROM pegawai WHERE id=$id");
		$record = mysqli_fetch_array($rec);
		$nama = $record['nama'];
		$namadpt = $record['namadpt'];
		$id = $record['id'];
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Pegawai</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Nama</th>
				<th>Nama Departmen</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo $row['namadpt']; ?></td>
					<td>
						<a href="index2.php?edit=<?php echo $row['id']; ?>">Update</a>
					</td>
					<td>
						<a href="server2.php?del=<?php echo $row['id']; ?>">Delete</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

		<form method="post" action="server2.php">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Nama</label>
			<input type="text" name="nama" value="<?php echo $nama; ?>">
		</div>
		<div class="input-group">
			<label>Nama Departmen</label>
			<input type="text" name="namadpt" value="<?php echo $namadpt; ?>">
		</div>
		<div class="input-group">
			<?php if ($update_state == false): ?>
				<button type="submit" name="save" class="btn">Save</button>
			<?php else: ?>
				<button type="submit" name="update" class="btn">Update</button>
			<?php endif ?>
		</div>
	</form>
	<div class="input-group" style="margin-left: 700px" >
		<a href="index.php" class="btn btn-success">Data Departmen</a>
	</div>

</body>
</html>