<?php include('server.php'); 

	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($db, "SELECT * FROM departmen WHERE id=$id");
		$record = mysqli_fetch_array($rec);
		$name = $record['name'];
		$id = $record['id'];
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Departmen</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Departmen</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
				<td><?php echo $row['name']; ?></td>
				<td>
					<a href="index.php?edit=<?php echo $row['id']; ?>">Update</a>
				</td>
				<td>
					<a href="server.php?del=<?php echo $row['id']; ?>">Delete</a>
				</td>
			</tr>
			<?php } ?>
			

		</tbody>
	</table>

	<form method="post" action="server.php">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Departmen</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<?php if ($edit_state == false): ?>
				<button type="submit" name="save" class="btn">Save</button>
			<?php else: ?>
				<button type="submit" name="update" class="btn">Update</button>
			<?php endif ?>
			
			
		</div>
	</form>
	<div class="input-group" style="margin-left: 700px" >
		<a href="index2.php" class="btn btn-success">Data Pegawai</a>
		
	</div>
</body>
</html>