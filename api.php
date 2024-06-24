<?php
session_start();
ob_start();
define('LTW', true);
$act = isset($_GET['act']) ? $_GET['act']  : die();
$file = 'API/'.$act.'.php';
//echo $file;
if(file_exists($file)) include $file;
//else print_r($_GET);
?>