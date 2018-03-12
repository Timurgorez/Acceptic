<?php

include 'db.php';



	function changeUser($mysqli){
		
		if(count($_POST) > 0){
					$nameCh = mysqli_real_escape_string($mysqli, trim($_POST["nameCh"]));
			 		$mailCh = mysqli_real_escape_string($mysqli, trim($_POST["mailCh"]));
			 		$passwordCh = mysqli_real_escape_string($mysqli, trim($_POST["passwordCh"]));
			 		$checkMail = mysqli_real_escape_string($mysqli, trim($_POST["checkMail"]));
		}else{return print_r('No variable POST');}


		$result = $mysqli->query("SELECT * FROM users WHERE name = '$nameCh' OR mail = '$mailCh'");
		while($row = $result->fetch_assoc()){
			if($row['name'] == $nameCh){
				return print_r('This name ' .$nameCh. ' already exists in the database.');
			}
			if($row['mail'] == $mailCh){
				return print_r('This email ' .$mailCh.' already exists in the database.');
			}
		}


		/*  */
		if (!empty($nameCh) && !empty($mailCh) && !empty($passwordCh) && !empty($checkMail)) {
		    $result = $mysqli->query("UPDATE users SET name = '$nameCh', mail = '$mailCh', password = '$passwordCh' WHERE mail = '$checkMail'");
		    print_r("<h4>All changed!!!</h4><br><p>Your name is " .$nameCh. "</p><br><p value='".$checkMail."'>Your email is <span id='checkMail'>".$mailCh."</span></p><br><p>Your password is " .$passwordCh. "</p><br><h3>If you want to change:</h3 <br>
                ");
		}else{
			print_r("Variables are empty");
		}





		$mysqli->close();
	}





changeUser($mysqli);



















