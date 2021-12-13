<?php
require "libs/rb-mysql.php";
R::setup( 'mysql:host=localhost;dbname=users',
        'root', '' ); //for both mysql or mariaDB
session_start();
?>
