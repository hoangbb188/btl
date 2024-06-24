<?php
include 'API/header.php';
include 'controller/trang-chu/C_user.php';
$user = new C_user;
$user->logout();
?>