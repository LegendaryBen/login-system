<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <h1>HOME PAGE</h1>
        <div>
            <?php
            if(isset($_SESSION['user'])){
                print '<a href="logout.php">logout</a>';
            }else{
              echo   '<a href="login.php">login</a>';
              echo  '<a href="signup.php">sign up</a>';
            }
            ?> 
        </div>
    </header>
    <main>
        <?php
            if(isset($_SESSION['user'])){
             print  "<h1>WELCOME  ".strtoupper($_SESSION['user'][0][1])."</h1>";
            }else{
              echo   "<h1>WELCOME TO THE HOME PAGE</h1>";
            }
        ?> 
    </main>
</body>
</html>