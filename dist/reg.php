<?php

class DB {



	public function regUser(){
		$mysqli = new mysqli("localhost", "Tim", "12345", "acceptic");
		/* connection test */
		if ($mysqli->connect_errno) {
		    print_r("Wrong connection: %s\n", $mysqli->connect_error);
		    exit();
		}
		if(count($_POST) > 0){
					$name = mysqli_real_escape_string($mysqli, trim($_POST["name"]));
			 		$mail = mysqli_real_escape_string($mysqli, trim($_POST["mail"]));
			 		$password = mysqli_real_escape_string($mysqli, trim($_POST["password"]));
		}else{return print_r('No variable POST');}

		$result = $mysqli->query("SELECT * FROM users");
		$row = $result->fetch_assoc();

		if($row['name'] == $name){
			return print_r('This name ' .$name. ' already exists in the database.');
		}
		if($row['mail'] == $mail){
			return print_r('This email ' .$mail.' already exists in the database.');
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


}


$mysqli = DB::regUser();
 // $mysqli = DB::signIn();





























