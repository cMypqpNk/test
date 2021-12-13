<?php
//include "server/server.php";
$server="127.0.0.1";
$login="root";
$pass="";
$name_db="users";
$link= mysqli_connect($server,$login,$pass,$name_db);
$data=$_POST;
 if (isset($data['do_image']))
 {
$errors_image = array();
if (move_uploaded_file($_FILES['filename']['tmp_name'], '../../avatar/'.$_FILES['filename']['name'])){
	
	if ($_FILES['filename']['size']>6*1024*1024)
	{
		 
	}else $errors_image[]='картинка больше допустимого значения'; 
}else 
{
	$errors_image[]='произошла ошибка'; 
}
 if(empty($errors)){


        $kek = $_FILES['filename']['name'];
        $kik =  $_SESSION['loged_user']['id'];
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
        $sql = "UPDATE `users` SET `avatar` = '$kek' WHERE `users`.`id` = '$kik'";

        // Перед тем как выполнять запрос предлагаю убедится, что он составлен без ошибок.
         echo $sql;
         $result=mysqli_query($link,$sql);
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
    
  }
  
}
?>