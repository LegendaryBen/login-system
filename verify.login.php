<?php

if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $password = trim($_POST["password"]);

    if(empty($name)||empty($password)){
        header("location:login.php?name= Some input fields are empty&color=red");
        exit;
    }else{
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
        }else{
            $pass = $final[0][3];
            if(password_verify($password,$pass)){
                header("location:login.php?name=Incorrect password&color=red");
                exit;
            }else{
                session_start();
                $_SESSION['user'] = $final;
                header("location:index.php");
                exit;
            }
        }
    }



}else{
    header("location:index.php");
}