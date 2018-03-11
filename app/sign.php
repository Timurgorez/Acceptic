<?

include 'db.php';



    function signIn($mysqli){

        if(count($_POST) > 0){
                    $name = mysqli_real_escape_string($mysqli, trim($_POST["name"]));
                    $password = mysqli_real_escape_string($mysqli, trim($_POST["password"]));
        }else{return print_r('No varibel POST sign');}

        $result = $mysqli->query("SELECT * FROM users WHERE name = '$name' AND password = '$password'");

        while($row = $result->fetch_assoc()){
            if ($name == $row['name'] || $password == $row['password']) {

            print_r(" <p>Your name is " .$row['name']. "</p><br><p value='".$row['mail']."'>Your email is <span id='checkMail'>".$row['mail']."</span></p><br><p>Your password is " .$row['password']. "</p><br><h3>If you want to change:</h3 <br>
                ");
            
            }else{
                print_r("Variables are empty Sign");
            }
        };
        
        $mysqli->close();
    }

    




signIn($mysqli);
