<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD - Insert</title>
</head>
<body>
<h2>Insert Data</h2>
<form action="insertProses.php" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama"></td>
		</tr>
		<tr>
			<td>Description</td>
			<td>:</td>
			<td><textarea name="description"></textarea></td>
		</tr>
		<tr>
			<td>Price</td>
			<td>:</td>
			<td><input type="number" name="price"></td>
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