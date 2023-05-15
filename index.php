<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="js/script.js"></script>
</head>
<body>

    <?php 
    require_once ("api/config.php");
    require_once ("api/core.php");

    //соединение с БД
    // $connect = new mysqli(HOST, USER, PASSWORD, DATABASE);
    // if($connect->connect_error){
    //     exit("Ошибка подключения к БД: ".$connect->connect_error);
    // }
    // //установить кодировку
    // $connect->set_charset("utf8");

    if (isset($_SESSION["user-name"])) {
        echo $_SESSION["user-name"];
        echo "<br>";
        echo "<a href='profile.php'>перейти в профиль</a>";
        echo '
        <form action="api/exit.php" method="POST">
            <input type="submit" value="Выйти">
        </form> 
        ';
    } else {
        if (isset($_SESSION["false-auth"])) {
            echo $_SESSION["false-auth"];
        }
        echo '
            <form id="form-auth" method="POST" action="api/auth.php">
                <input type="text" id="login" name="login" placeholder="Введите логин" required><br>

                <input type="password" id="password" name="password" placeholder="Введите пароль" required><br>

                <input type="submit" value="Войти">
            </form>
        ';
    }

    

    ?>



</body>
</html>
