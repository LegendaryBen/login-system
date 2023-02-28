<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <?php
        if(isset($_GET['name']) && isset($_GET['color'])){
            $name = $_GET['name'];
            $color = $_GET['color'];
            echo '<div class="'.$color.'">'.$name.'</div>';
        }
    ?>
    <form method="post" action="verify.login.php">
        <div>
            <input type="text" placeholder="Username" name="username">
        </div>
        <div>
            <input type="text" placeholder="Password" name="pass">
        </div>
        <div class="submit">
            <input type="submit" value="submit" name="submit">
        </div>
        <a href="index.php">Home page</a>
    </form>
</body>
</html>