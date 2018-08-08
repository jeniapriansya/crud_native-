<?php

	$connection = new mysqli("localhost","root","","crud_pro");
	if (!isset($connection)) {
		echo "Koneksi database gagal !!";
	}