<?php
	session_start();
	include "connect.php";

	if (isset($_POST["nama"])) {
		
		$id = $_POST["id"];
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
		}else{
			if (isset($image["tmp_name"]) && $image["tmp_name"]!="") {
				$filePath = "upload/".basename($image["name"]);
				move_uploaded_file($image["tmp_name"], $filePath);

				$connection->query("UPDATE pro SET image='".$filePath."' WHERE id =".$id);
			}
			$connection->query("UPDATE pro SET nama='".$nama."', description='".$description."', price='".$price."' WHERE id =".$id);
			$message = "Sukses mengedit data !!";
		}
		$_SESSION["message"] = $message;
		header("location:edit.php?id=".$id);
		exit();
	}
	header("location:insert.php");
	exit();

?>