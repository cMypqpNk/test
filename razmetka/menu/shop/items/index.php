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

 $id_item=  $_GET['val'];
 

 $result= mysqli_query($link,"SELECT * FROM `items` WHERE id=$id_item");
 $mesage =mysqli_fetch_assoc($result);
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
    <li class="top"><a class="top" href="../../../index.php">Главная</a></li>
    <li class="top"><a class="top" href="../../start/index.php">Начать играть</a></li>
    <li class="top"><a class="top" href="../index.php">Донат</a>
      <ul class="submenu">
        <li><a class="top" href="../index.php">Сервер 1</a></li>
        <li><a class="top" href="../index.php">Сервер 2</a></li>
        <li><a class="top" href="../index.php">Сервер 3</a></li>
        
      </ul>
    </li>
    <li class="top"><a class="top" href="https://vk.com/cmypqpnk">Группа ВК</a></li>
    <li class="down"><a class="top" href="#rus">Информация</a>
    <ul class="submenu">
        <li><a class="top" href="">Сервера</a></li>
        <li><a class="top" href="">Правила</a></li>
        <li><a class="top" href="">Контакты</a></li>
        
      </ul>
    </li>
    <?php if (isset($_SESSION['loged_user'])):  ?>
 
    <li class="top"><a class="top" href="../../profile/index.php">Профиль</a></li><?php else : ?><?php endif; ?>
    <li class="top"><a class="top" href="#rus">Бан лист</a></li>
  </ul>
    </div>

    <div id="container">
      <div id="content">
        <div id="content-header"><div class="content-header-text"><?echo $mesage['title']; ?>  </div>
          <div class="gropup-btn">
          <a class="topi" href="../index.php">Назад</a>
           <?php if (isset($_SESSION['loged_user'])):  ?>
            <a class="topi" href="../../balance/index.php">Пополнить счёт</a>
            <?php else : ?><?php endif; ?>
           </div>
        </div>
       <div id="content-content-1">
        <div class="shop-panel">
          
         
            <div class="image">
              <img class="image" src="img/<?echo $mesage['image']; ?>">
            </div>
            <div id="content-content-1">
               <table class="profile">
        <tr >
          <td class="first">Описание </td>
          <td><?echo $mesage['title']; ?></td>
        </tr>
        <tr>
          <td>Категория</td>
          <td><?echo $mesage['type']; ?></td>
        </tr>
        <tr>
          <td>Время действия:</td>
          <td><?echo $mesage['time']; ?></td>
        </tr>
        <tr>
          <td>Цена:</td>
          <td><?echo $mesage['price']; ?></td>
        </tr>
        <tr>
          <td>Скидка:</td>
          <td><?echo $mesage['discount']; ?></td>
        </tr>
        
        
      </table>
       <?php if (isset($_SESSION['loged_user'])):  ?><form method="post" action="index.php" class="login">
             <input type="number" placeholder="введите сколько хотите купить" name="x">
 
    
             <div id="group-btn"><button type="top" name="do_buy" class="default-btn" >купить</button>
             </div>
             <br>
             

             
        </form>
        <?php else : ?><?php endif; ?>
            <!--<a class="top" href="">buy</a>-->
            </div>
           <!-- <div id="content-content-1">
              <div id="content-title">отличие от других предметов</div></div>
            <div class="div-buy">
            <table class="profile">
        <tr >
          <td class="first">Описание </td>
          <td><?php echo$_SESSION['loged_user']->login ?></td>
        </tr>
        <tr>
          <td>Категория</td>
          <td><?php echo$_SESSION['loged_user']->date  ?></td>
        </tr>
        <tr>
          <td>Время действия:</td>
          <td><?php echo$_SESSION['loged_user']->balance  ?></td>
        </tr>
        <tr>
          <td>Цена:</td>
          <td><?php echo$_SESSION['loged_user']->score  ?></td>
        </tr>
        <tr>
          <td>Скидка:</td>
          <td><?php echo$_SESSION['loged_user']->voice  ?></td>
        </tr>
        
        
      </table>
           </div>
         -->
         </div>  

     </div>

         
      </div>
      <div id="sidebar">
        <div id="content-sidebar">
          
           


  <?php if (isset($_SESSION['loged_user'])):  ?>
  <div id="content-header-1"><div class="content-header-text-1">Helo <?php echo$_SESSION['loged_user']->login ?></div></div>
  <div class="avatar">
    <img class="avatar" src="../../../avatar/<?php echo $_SESSION['loged_user']->avatar ?>">
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
        <form method="post" action="../index.php" class="login">
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