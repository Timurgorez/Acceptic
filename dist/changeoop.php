<?php
spl_autoload_register(function ($class_name) {   //Автоматическая подгрузка всех файлов.
    include $class_name . '.php';
});

class ChangeUser extends DB {

    public function updateUser(){
        $pdo = $this->pdo;

        if(count($_POST) > 0){
            $nameCh = $this->Validation($_POST["nameCh"]);
            $mailCh = $this->Validation($_POST["mailCh"]);
            $passwordCh = $this->Validation($_POST["passwordCh"]);
            $checkMail = $this->Validation($_POST["checkMail"]);
        }else{
            return print_r('No variable POST');
        }

        $result = $pdo->prepare("SELECT * FROM users WHERE mail != ?");
        $result->execute([$checkMail]);

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            if($row['name'] == $nameCh){
                return print_r('This name ' .$nameCh. ' already exists in the database.');
            }
            if($row['mail'] == $mailCh){
                return print_r('This email ' .$mailCh.' already exists in the database.');
            }
        };

        if (!empty($nameCh) && !empty($mailCh) && !empty($passwordCh)) {
            $result = $pdo->prepare("UPDATE users SET name = ?, mail = ?, password = ? WHERE mail = ?");
            $result->execute([$nameCh, $mailCh, $passwordCh, $checkMail]);
            print_r("
                <h4>All changed!!!</h4><br>
                <p>Your name is ". $nameCh ."</p><br>
                <p>Your email is <span id='checkMail'>".$mailCh."</span></p><br>
                <p>Your password is ". $passwordCh . "</p><br>
                <h3>If you want to change:</h3><br>
            ");
        }else{
            return print_r("Variables are empty");
        }
    }
}

$var = new ChangeUser();
$var->updateUser();