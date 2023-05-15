<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once ("../api/config.php");

        //соединение с БД
        $connect = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if($connect->connect_error){
            exit("Ошибка подключения к БД: ".$connect->connect_error);
        }
        //установить кодировку
        $connect->set_charset("utf8");

        $sql = "SELECT * FROM `days_week`";

        echo $row["name"];
        
    ?>

    de
</body>
</html>