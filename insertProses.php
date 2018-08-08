<?php
	session_start();
	include "connect.php";

	if (isset($_POST["nama"])) {
		
		$nama = $_POST["nama"];
		$description = $_POST["description"];
		$price = $_POST["price"];
		$image = $_FILES["image"];

		$message = "";

		if ($nama =="") {
			$message = "Nama harus di isi !!";
		}else if ($description =="") {
			$message ="description harus di isi !!";
		}else if ($price =="") {
			$message ="Price harus di isi !!";
		}else if (!isset($image["tmp_name"]) || $image["tmp_name"]=="") {
			$message = "Image harus di isi !!";
		}else{

			$filePath = "upload/".basename($image["name"]);
			move_uploaded_file($image["tmp_name"], $filePath);

			$connection->query("INSERT INTO pro VALUES (null, '".$nama."', '".$description."', '".$price."', '".$filePath."')");
			$message = "Sukses menambahkan data baru !!";
		}
		$_SESSION["message"] = $message;
	}
	header("location:insert.php");
	exit();

?>