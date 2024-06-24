<?php
if(!defined('LTW')) die("Bạn không thể truy cập vào đây");
include_once 'function.php';
if(!in_array($view, array('404','checkouts','chi-tiet-hoa-don'))) include 'header.php';
include "$view.php";
if(!in_array($view, array('404','checkouts','chi-tiet-hoa-don'))) include 'footer.php';
?>