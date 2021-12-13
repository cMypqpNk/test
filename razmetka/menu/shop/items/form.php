<?php
//include "server/server.php";
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$server="127.0.0.1";
$login="root";
$pass="";
$name_db="users";
$name_server="server";
//$name_db1="server";
if (!empty($_SESSION['loged_user']))
{
$link1= mysqli_connect($server,$login,$pass,$name_db);
$link= mysqli_connect($server,$login,$pass,$name_server);
//$kek=$_SESSION['item_id'];
$id_item=$_SESSION['item_id'];
//echo $_SESSION['item_id'];
$result_server= mysqli_query($link,"SELECT * FROM `items` WHERE id=$id_item");
$id_user=$_SESSION['loged_user']['id'];



$result_user= mysqli_query($link1,"SELECT * FROM `users` WHERE `id`=$id_user");

$user = mysqli_fetch_assoc ($result_user);
$items = mysqli_fetch_assoc($result_server);
$data=$_POST;
 if (isset($data['do_buy']))
 {

        $_balance=$items['price']*$data['x'];
        $kek = $user['balance']-$_balance;
        //if(trim($data['user_login']) !== "")   { $update_columns[] = "login = :login"; }
        //if(trim($data['user_email']) !== "")  { $update_columns[] = "email = :email"; }
        //if(trim($user_password) !== "")   { $update_columns[] = "password = :password"; }
        //if(trim($data['filename']) !== ""){ $update_columns[] = "avatar = :avatar"; }
        //if(trim($user_balance) !== "")  { $update_columns[] = "balance = :balance"; }
        //if(trim($user_voice) !== "")  { $update_columns[] = "voice = :voice"; }
        //if(trim($user_score) !== "")  { $update_columns[] = "score = :score"; }
        //if(trim($user_license) !== "")  { $update_columns[] = "license = :license"; }
        // Запрос на создание записи в таблице
        //$sql = 'UPDATE "users" SET "avatar" = "$kek" WHERE "users"."id" = 1';
        $sql = "UPDATE `users` SET `balance` = $kek WHERE `users`.`id` = $id_user";

        // Перед тем как выполнять запрос предлагаю убедится, что он составлен без ошибок.
         $result_user=mysqli_query($link1,$sql);
         $sql = "UPDATE `users` SET `_balance` = $_balance WHERE `users`.`id` = $id_user";

        // Перед тем как выполнять запрос предлагаю убедится, что он составлен без ошибок.
         $result_user=mysqli_query($link1,$sql);

        // Например, если в форме заполнены поля: название, автор книги и номер Id=1,
        // то запрос должен выглядеть следующим образом:
        // "UPDATE books SET title = :title, author = :author WHERE id=:id"
        
        // Подготовка запроса.
        //$statement = $link->prepare($sql);
 
        // Привязываем к псевдо переменным реальные данные,
        // если они существуют (пользователь заполнил поле в форме).        
       // $statement->bindParam(":id", $user_id);
            //$statement->bindParam(":avatar", $_FILES['filename']['name']);
        
        
        // Выполняем запрос.
        //$statement->execute();
    
        //echo "Запись c ID: " . $user_id . " успешно обновлена!";
        // $sql =  UPDATE 'users' SET 'avatar' = "$_FILES['filename']['name']" WHERE 'users'.'id' ="$_SESSION['loged_user']['id']";
         //$sql = "UPDATE users SET " . implode("avatar", $_FILES['filename']['name']) . " WHERE id=:$_SESSION['loged_user']['id']";
        // Перед тем как выполнять запрос предлагаю убедится, что он составлен без ошибок.
        // echo $sql;
        // Например, если в форме заполнены поля: название, автор книги и номер Id=1,
        // то запрос должен выглядеть следующим образом:
        // "UPDATE books SET title = :title, author = :author WHERE id=:id"
        
        // Подготовка запроса.
        //$statement = $link->prepare($sql);
 
        // Привязываем к псевдо переменным реальные данные,
        // если они существуют (пользователь заполнил поле в форме).       
        
        // Выполняем запрос.
        //$statement->execute();
    
  
} ;
}
?>