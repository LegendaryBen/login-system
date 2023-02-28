<?php
session_start();

if(!$_SESSION['user']){
    header("location:index.php");
    exit;
}else{
    session_unset();
    session_destroy();
    header("location:index.php");
    exit;
}