<?php

class CHANGE {



	public function changeUser(){
		$mysqli = new mysqli("localhost", "Tim", "12345", "acceptic");
		/* connection test */
		if ($mysqli->connect_errno) {
		    print_r("Wrong connection: %s\n", $mysqli->connect_error);
		    exit();
		}
		// if(count($_POST) > 0){
					$nameCh = mysqli_real_escape_string($mysqli, trim($_POST["nameCh"]));
			 		$mailCh = mysqli_real_escape_string($mysqli, trim($_POST["mailCh"]));
			 		$passwordCh = mysqli_real_escape_string($mysqli, trim($_POST["passwordCh"]));
		// }else{return print_r('No variable POST');}

		$result = $mysqli->query("SELECT * FROM users");
		$row = $result->fetch_assoc();

		if($row['name'] == $nameCh){
			return print_r('This name ' .$nameCh. ' already exists in the database.');
		}
		if($row['mail'] == $mailCh){
			return print_r('This email ' .$mailCh.' already exists in the database.');
		}
		/*  */
		if ($nameCh && $mailCh && $passwordCh) {
		    $result = $mysqli->query("UPDATE users SET name='$nameCh', mail='$mailCh', password='$passwordCh'");
		    print_r("Change ".$nameCh." in DB");
		}else{
			print_r("Variables are empty");
		}
		$mysqli->close();
	}


}


$mysqli = CHANGE::changeUser();



















