<?php

if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $pass = trim($_POST['pass']);

    if(empty($name)||empty($pass)){
        header("location:login.php?name= Some input fields are empty&color=red");
        exit;
    }

    require "db.php";
    $sql = "select * from users where username = ?";
    $stmt = mysqli_prepare($connection,$sql);
    mysqli_stmt_bind_param($stmt,"s",$name);
    mysqli_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $final = mysqli_fetch_all($res);

    if(empty($final)){
        header("location:login.php?name=Incorrect username&color=red");
        exit;
    }

    $hash = $final[0][3];

    if(password_verify($pass,$hash)){            

        session_start();
        $_SESSION['user'] = $final;
        header("location:index.php");
        exit;

    }else{

        header("location:login.php?name=Incorrect password&color=red");
        exit;
        echo "error";
    }



}else{
    header("location:index.php");
}