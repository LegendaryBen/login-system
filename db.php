<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "loginsystem";

$connection = mysqli_connect($host,$username,$password,$dbname);

if(!$connection){
    die("failed to connect to the database".mysqli_error());
}
