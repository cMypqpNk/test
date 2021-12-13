<?php
 require "db.php";

 $data = $_POST;
 if (isset($data['do_login']))
 {
  $errors = array();
  $user = R::findOne('users','login=?',array ($data['login']));
  if($user )
    {
      if(password_verify($data['password'],$user->password))
      {
             
      }else
      {
        $errors[]='Неверно введён пароль'; 
      }
    }else 
    {
      $errors[]='Неверно введён логин'; 
    }
    
  if(empty($errors))
  {
        $_SESSION['loged_user']=$user;
                
  }
  else
  {
    //echo '<div style="color:red">'.array_shift($errors). '</div>';
  }
  
 }
 
 ?>