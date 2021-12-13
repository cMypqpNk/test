<?php
 require "db/db.php";
 unset($_SESSION['loged_user']);
 header('Location:/zagotovki/razmetka/index.php');
 ?>