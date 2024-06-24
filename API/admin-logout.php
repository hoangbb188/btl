<?php
include 'API/header.php';
include 'controller/quan-ly/C_user.php';

$user = new C_user;
$user->logout();
?>