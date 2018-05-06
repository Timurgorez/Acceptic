<?php
spl_autoload_register(function ($class_name) {   //Автоматическая подгрузка всех файлов.
    include $class_name . '.php';
});


class Registration extends DB {

    public function regUsers(){
        $pdo = $this->pdo;

        if(count($_POST) > 0){
            $name = $this->Validation($_POST["name"]);
            $mail = $this->Validation($_POST["mail"]);
            $password = $this->Validation($_POST["password"]);
        }else{
            return print_r('No variable POST');
        }

        $result = $pdo->prepare("SELECT * FROM users WHERE name = ? OR mail = ?");
        $result->execute([$name, $mail]);
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            if($row['name'] == $name){
                return print_r('Пользователь c именем ' .$name. ' уже зарегестрирован, выберете другое имя');
            }
            if($row['mail'] == $mail){
                return print_r('Пользователь с EMAIL ' .$mail.' уже зарегестрирован.');
            }
        }

        if ($name && $mail && $password) {
            $result = $pdo->prepare("INSERT INTO users (name, mail, password)
							VALUES(?, ?, ?)");
            $result->execute([$name, $mail, $password]);
            return print_r("Add ".$name." to DB");
        }else{
            return print_r("Variables are empty");
        }
    }

}


$var = new Registration();
$var->regUsers();








