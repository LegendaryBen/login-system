<?php

if(isset($_POST['submit'])){
    require "db.php";

    $name = trim($_POST['name']);
    $email = $_POST['email'];
    $pasword = trim($_POST['password']);


    if(empty($name)||empty($email)||empty($pasword)){
        header("location:signup.php?name= Some input fields are empty&color=red");
        exit;
    }else{
        $sql1 = "select * from users where username = ?";
        $sql2 = "select * from users where email = ?";
    
        $stmt1 = mysqli_prepare($connection,$sql1);
        $stmt2 = mysqli_prepare($connection,$sql2);
    
        mysqli_stmt_bind_param($stmt1,"s",$name);
        mysqli_stmt_bind_param($stmt2,"s",$email);
    
        mysqli_execute($stmt1);
        $res1 = mysqli_stmt_get_result($stmt1);
        $final1 = mysqli_fetch_all($res1,MYSQLI_ASSOC);
    
    
        mysqli_execute($stmt2);
        $res2 = mysqli_stmt_get_result($stmt2);
        $final2 = mysqli_fetch_all($res2,MYSQLI_ASSOC);
    
    
        if(!empty($final1)){
            header("location:signup.php?name=Username already taken&color=red");
            exit;
        }
    
        if(!empty($final2)){
            header("location:signup.php?name= Email already taken&color=red");
            exit;
        }


        $sql4 = "insert into users(username,email,userpassword) value(?,?,?)";

        $stmt4 = mysqli_prepare($connection,$sql4);
        mysqli_stmt_bind_param($stmt4,"sss",$name,$email,password_hash($pasword,PASSWORD_DEFAULT));
        mysqli_execute($stmt4);

        header("location:signup.php?name= Success!!. Navigate to the home page to login&color=green");
        exit;

    }

}else{
    header("location:index.php");
}




