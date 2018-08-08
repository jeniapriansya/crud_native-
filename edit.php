<?php
	session_start();
	include "connect.php";

	if (!isset($_GET["id"])) {
		header("location:view.php");
		exit();
	}

	$id = $_GET["id"];

	$getData = $connection->query("SELECT * FROM pro WHERE id =".$id);

	if ($getData->num_rows==0) {
		header("location:view.php");
		exit();
	}

	$getData = $getData->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD - Edit</title>
</head>
<body>
<h2>Edit Data</h2>
<form action="editProses.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?=$_GET["id"]?>">
	<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" value="<?=$getData["nama"]?>"></td>
		</tr>
		<tr>
			<td>Description</td>
			<td>:</td>
			<td><textarea name="description"><?=$getData["description"]?></textarea></td>
		</tr>
		<tr>
			<td>Price</td>
			<td>:</td>
			<td><input type="number" name="price" value="<?=$getData["price"]?>"></td>
		</tr>
		<tr>
			<td>Image</td>
			<td>:</td>
			<td><input type="file" name="image"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><button>Save Data</button></td>
		</tr>
	</table>
</form>
<?php
	if (isset($_SESSION["message"])) {
		echo $_SESSION["message"];
		unset($_SESSION["message"]);
	}
?>
</body>
</html>