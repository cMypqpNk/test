<html>
 <head>
 <title>Заголовок документа</title> 
 <link rel="stylesheet" type="text/css" href="style/style.css">
 <?php
 require "db/db1.php";
 require "form.php";
 ?>
 <?php
 include "server/server.php";
 $result= mysqli_query($link,"SELECT * FROM `mesage`");
 //$mesage= mysqli_fetch_assoc($result);
 //print_r($mesage);
 //echo "<br>";
 //echo $mesage['title'];
 ?>
 </head> 
   
<body > 

    <div id="header">
      <!--<div id="content-header"><div id="anim">минимальная высота только в пикселях.</div> -->
 <div id="logo_head"> Site Mine</div>
  <ul class="top-menu">
    <li class="top"><a class="top" href="../../index.php">Главная</a></li>
    <li class="top"><a class="top" href="#carier">Начать играть</a></li>
    <li class="top"><a class="top" href="../shop/index.php">Донат</a>
      <ul class="submenu">
        <li><a class="top" href="">Сервер 1</a></li>
        <li><a class="top" href="">Сервер 2</a></li>
        <li><a class="top" href="">Сервер 3</a></li>
        
      </ul>
    </li>
    <li class="top"><a class="top" href="#ach">Группа ВК</a></li>
    <li class="down"><a class="top" href="#rus">Информация</a>
    <ul class="submenu">
        <li><a class="top" href="">Сервера</a></li>
        <li><a class="top" href="">Правила</a></li>
        <li><a class="top" href="">Контакты</a></li>
        
      </ul>
    </li>
    <?php if (isset($_SESSION['loged_user'])):  ?>
 
    <li class="top"><a class="top" href="menu/profile/index.php">Профиль</a></li><?php else : ?><?php endif; ?>
    <li class="top"><a class="top" href="#rus">Бан лист</a></li>
  </ul>
    </div>

    <div id="container">
      <div id="content">
        <div id="content-header"><div class="content-header-text">Панель управления </div>
          
        </div>
        <div id="content-content-1">
       <table class="profile">
        <tr >
          <td class="first">Логин </td>
          <td><?php echo$_SESSION['loged_user']->login ?></td>
        </tr>
        <tr>
          <td>Дата регистрации</td>
          <td><?php echo$_SESSION['loged_user']->date  ?></td>
        </tr>
        <tr>
          <td>Баланс</td>
          <td><?php echo$_SESSION['loged_user']->balance  ?></td>
        </tr>
        <tr>
          <td>Баллы</td>
          <td><?php echo$_SESSION['loged_user']->score  ?></td>
        </tr>
        <tr>
          <td>Голоса</td>
          <td><?php echo$_SESSION['loged_user']->voice  ?></td>
        </tr>
        <tr>
          <td>Потрачено доната</td>
          <td><?php echo$_SESSION['loged_user']->_balance ?></td>
        </tr>
        <tr>
          <td>Почта</td>
          <td><?php echo$_SESSION['loged_user']->email  ?></td>
        </tr>
        <tr>
          <td>Ваш пароль</td>
          <td><?php echo$_SESSION['loged_user']->balance  ?></td>
        </tr>
        <tr>
          <td>Права</td>
          <td><?php echo$_SESSION['loged_user']->license  ?></td>
        </tr>
        <tr>
          <td>Аватар</td>
          <td><div class="avatar">
          <img class="avatar" src="../../avatar/<?php echo $_SESSION['loged_user']->avatar ?>">
          <div>
            <?php if(empty($errors_image)): ?>
             <?php else: ?><div class='errors'>
              <?php echo array_shift($errors_image);?>
             </div>
             <?php endif; ?>
            <form action="index.php" method="post" enctype="multipart/form-data" >
                <input type="file" name="filename"><br>
                <input type="submit" name="do_image" value="send">  
             </form>
          </div>
          </div>
          </td>
        </tr>
        
      </table>
    </div>
         
      </div>
      <div id="sidebar">
        <div id="content-sidebar">
          
           


  <?php if (isset($_SESSION['loged_user'])):  ?>
  <div id="content-header-1"><div class="content-header-text-1">Helo <?php echo$_SESSION['loged_user']->login ?></div></div>
  <div class="avatar">
    <img class="avatar" src="../../avatar/<?php echo $_SESSION['loged_user']->avatar ?>">
    </div>
    <div id="info">
      <table>
        <tr>
          <td>Логин </td>
          <td><?php echo$_SESSION['loged_user']->login ?></td>
        </tr>
        <tr>
          <td>Баланс</td>
          <td><?php echo$_SESSION['loged_user']->balance  ?></td>
        </tr>
        <tr>
          <td>Дата регистрации</td>
          <td><?php echo$_SESSION['loged_user']->date  ?></td>
        </tr>
      </table>
    </div>
  <form method="post" action="index.php" class="login">
    
             <div id="group-btn">
              <button ><a href='logout.php'>logout</a></button>
             </div>
             <br>
             

             
        </form>
  <br><br>

  

  <?php else : ?>
    <div id="content-header-1"><div class="content-header-text-1">Login</div></div>
        <form method="post" action="index.php" class="login">
             <?php if(empty($errors)): ?>
             <?php else: ?><div class='errors'>
              <?php echo array_shift($errors);?>
             </div>
             <?php endif; ?>
             <input type="text" name="login"  placeholder="введите ваше логин" name="name"value="<?php echo $data['login'];?>"><br><br>
             <input type="password" name="password" placeholder="введите ваш пароль" value="<?php echo $data['password'];?>"><br><br>
             <div id="group-btn"><button type="submit" name="do_login" class="default-btn" >войти</button>
             <button class="default-btn">зарегистрироваться</button></div>
             <br>
             <a class="default-btn" href="a">забыли пароль?</a>

             
        </form>
        <br>
         <?php endif; ?>
      </div>
      <div id="content-sidebar-2">
        <div id="content-header-1"><div class="content-header-text-1">сайд бар</div></div>
        <div class="sidebar-2">
        <img class="side_image" src="https://i.ytimg.com/vi/F9VgxQA-sh8/maxresdefault.jpg">
      </div>
      </div>
      </div>
    </div>
    <div id="fother">
      <div id="content-fother">SiteMine.ru © 20XX-20XX<br>
          Что то на эльфийском <br>
         Кек информация</div>
    </div>
  </div>
</body>

</html>