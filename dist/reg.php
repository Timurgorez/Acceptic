<?php
include 'db.php';

	function regUser($mysqli){
		
		if(count($_POST) > 0){
					$name = mysqli_real_escape_string($mysqli, trim($_POST["name"]));
			 		$mail = mysqli_real_escape_string($mysqli, trim($_POST["mail"]));
			 		$password = mysqli_real_escape_string($mysqli, trim($_POST["password"]));
		}else{return print_r('No variable POST');}

		$result = $mysqli->query("SELECT * FROM users WHERE name = '$name' OR mail = '$mail'");
		while($row = $result->fetch_assoc()){
			if($row['name'] == $name){
				return print_r('This name ' .$name. ' already exists in the database.');
			}
			if($row['mail'] == $mail){
				return print_r('This email ' .$mail.' already exists in the database.');
			}
		}
		

		
		/*  */
		if ($name && $mail && $password) {
		    $result = $mysqli->query("INSERT INTO users (name, mail, password)
							VALUES('$name', '$mail', '$password')");
		    print_r("Add ".$name." to DB");
		}else{
			print_r("Variables are empty");
		}
		$mysqli->close();
	}




regUser($mysqli);






























