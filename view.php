<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD - View</title>
</head>
<body>
<h2>Tampilan Data</h2>
<?php
	include "connect.php";

	$getData = $connection->query("SELECT * FROM pro");
	while ($fetchData = $getData->fetch_assoc()) {
?>
	<table style="display: inline-table;">
		<tr>
			<td><img style="width: 300px;" src="<?=$fetchData["image"]?>"></td>
		</tr>
		<tr align="center">
			<td>
				<strong><?=$fetchData["nama"]?></strong><br /><br />
				IDR <?= number_format($fetchData["price"])?> <br />
				<?=$fetchData["description"]?>
			</td>
		</tr>
		<tr align="center">
			<td>
				<a href="edit.php?id=<?=$fetchData["id"]?>"><button>Edit</button></a>
				<a href="delete.php?id=<?=$fetchData["id"]?>"><button>Delete</button></a>
			</td>
		</tr>
	</table>

<?php
	}

?>
</body>
</html>