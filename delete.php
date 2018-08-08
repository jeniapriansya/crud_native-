<?php
	session_start();
	include "connect.php";

	if (isset($_GET["id"])) {

		$connection->query("DELETE FROM pro WHERE id =".$_GET["id"]);
	}
	header("location:view.php");
	exit();
?>