<?php
	
	$host = "localhost";
	$admin = "Tim";
	$pass = "12345";
	$db_name = "acceptic";

	$mysqli = new mysqli($host, $admin, $pass, $db_name);
			/* connection test */
	if ($mysqli->connect_errno) {
		print_r("Wrong connection: %s\n", $mysqli->connect_error);
		exit();
	}

