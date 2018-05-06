<?php
spl_autoload_register(function ($class_name) {   //Автоматическая подгрузка всех файлов.
    include $class_name . '.php';
});

class Login extends DB {

    public function signIn(){
        $pdo = $this->pdo;

        if(count($_POST) > 0){
            $name = $this->Validation($_POST["name"]);
            $password = $this->Validation($_POST["password"]);
        }else{
            return print_r('No varibel POST sign');
        }

//        $result = $mysqli->query("SELECT * FROM users WHERE name = '$name' AND password = '$password'");
        $result = $pdo->prepare("SELECT * FROM users WHERE name = ? AND password = ?");
        $result->execute([$name, $password]);

        if($result->rowCount() == 0){
            return print_r("Такого юзера в базе нет");
        }

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            if ($name == $row['name'] && $password == $row['password']) {

                print_r(" <p>Your name is " .$row['name']. "</p><br>
                        <p>Your email is <span id='checkMail'>".$row['mail']."</span></p><br>
                        <p>Your password is " .$row['password']. "</p><br>
                        <h3>If you want to change:</h3><br>
                ");

            }
        };

    }
}

$login = new Login();
$login->signIn();