<?php
//include "libs/rb-mysql.php";
$server="127.0.0.1";
$login="root";
$pass="";
$name_db="users";
$link= mysqli_connect($server,$login,$pass,$name_db);
$data=$_POST;
if (isset($data['do_signup']))
 {
    $errors = array();
    if(trim($data['login']) =='')
        {
            $errors[]='login error'; 
        }
    if($data['password'] =='')
        {
            $errors[] ='pasword error'; 
        }
    if($data['password']!=$data['password_2'])
        {
            $errors[] = 'pasword erreis'; 
        }
        $password=password_hash($data['password'],PASSWORD_DEFAULT);
        $login=$data['login'];
        $sql="SELECT * FROM `users` WHERE `login`='$login'";
    $query = mysql_query($link,$sql);
     //$row = mysqli_fetch_array($result);
    if(mysql_result($query, 0) > 0)

    {

        $errors[] = "Пользователь с таким логином уже существует в базе данных";

    }
    $user =mysqli_fetch_assoc($result);
    $query = mysql_query("SELECT * FROM `users` WHERE password=$password");
    if(mysql_result($query, 0) > 0)

    {

        $errors[] = "Пользователь с таким паролем уже существует в базе данных";

    }
    /*if(R::count('users',"login=? ",array ($data['login ']))>0)
        {
            $errors[]='пользователь с подобным логином найден'; 
        }
        if(R::count('users',"email=?",array ($data['email']))>0)
        {
            $errors[]='пользователь с подобным мылом найден'; 
        }*/
    if(empty($errors))
    {
        
        $sql = "INSERT INTO '$name_db' 
        (login, password) VALUES 
        ($login, 
        $password, 
       )";
        echo $sql;
        $result=mysqli_query($link,$sql);
        //R::store ($user);
        echo '<div style="color:green">Вы успешно зарегались </div>';
    }
    else
    {
    
        echo '<div style="color:red">'.array_shift($errors). '</div>';
    }
 }
?>