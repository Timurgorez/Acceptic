<?
class SIGN {




    public function signIn(){
        $mysqli = new mysqli("localhost", "Tim", "12345", "acceptic");
        /* connection test */
        if ($mysqli->connect_errno) {
            print_r("Wrong connection: %s\n", $mysqli->connect_error);
            exit();
        }

        $name = 'tim';
        $password = '240190tim';
        // if(count($_POST) > 0){
        //             $name = mysqli_real_escape_string($mysqli, trim($_POST["name"]));
        //             $password = mysqli_real_escape_string($mysqli, trim($_POST["password"]));
        // }else{return print_r('No varibel POST sign');}

        $result = $mysqli->query("SELECT * FROM users WHERE name='$name' AND password='$password'");
        
        $row = $result->fetch_assoc();
        print_r($row);
        print_r("<br>".$row['name']);
        if ($name == $row['name'] || $password == $row['password']) {

            
            print_r("Your name is " .$row['name']. "<br>Your email is " .$row['mail']. "<br>Your password is " .$row['password']. "<br><h3>If you want to change:</h3 <br>
                ");
            
        }else{
            print_r("Variables are empty Sign");
        }
        $mysqli->close();
    }

    

}


$mysqli = SIGN::signIn();
//print_r($mysqli);
 // $mysqli = DB::signIn();







// function sign (){

//     if (isset($_POST['name'])) {$name = $_POST['name'];}
//     if (isset($_POST['password'])) {$password = $_POST['password'];}
//         //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
//         session_start();

//     if (empty($name) or empty($password)){ //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
//         exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
//         }
//         //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
//         $name = stripslashes($name);
//         $name = htmlspecialchars($name);
//     	$password = stripslashes($password);
//         $password = htmlspecialchars($password);

//     //удаляем лишние пробелы

//         $name = trim($name);
//         $password = trim($password);

//         $db = new mysqli("localhost", "Tim", "12345", "acceptic");

//     	$result = mysql_query("SELECT * FROM `users` WHERE `name` = '$name'",$db); //извлекаем из базы все данные о пользователе с введенным логином

//         $myrow = mysql_fetch_array($result);

//         if (empty($myrow['password']))

//         {

//         //если пользователя с введенным логином не существует

//         exit ("Извините, введённый вами login или пароль неверный.");

//         }

//         else {

//         //если существует, то сверяем пароли

//         if ($myrow['password']==$password) {

//         //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!

//         $_SESSION['name']=$myrow['name'];

//         $_SESSION['id']=$myrow['id'];

//         echo "Вы успешно вошли на сайт!";

//         }

//      else {

//         //если пароли не сошлись

     

//         exit ("Извините, введённый вами login или пароль неверный.");

//         }

//         }



// }




// $sign = sign();