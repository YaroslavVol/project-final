<?php
session_start();

if (!empty($_REQUEST['password']) and !empty($_REQUEST['login'])) {
    $login = $_REQUEST['login'];
    $password = $_REQUEST['password'];
}

require_once ("config.php");
require_once ("core.php");

// Соединение к бд
$connect = new mysqli(HOST, USER, PASSWORD, DATABASE);
if($connect->connect_error){
    exit("Ошибка подключения к БД: ".$connect->connect_error);
}

//установить кодировку
$connect->set_charset("utf8");


$sql = "SELECT * FROM `users` 
WHERE `login`=? AND `password` = md5(?)";

// $result = $this->connect->prepare

$result = $connect->prepare($sql);
$result->bind_param("ss", $login, $password);
$result->execute();
$result = $result->get_result();

if($row = $result->fetch_assoc()) {
    $response = [
        "status" => true,
        "name" => $row["name"],
        "login" => $row["login"]
    ];
    $_SESSION["user-name"] = $row["name"];
    header ('Location: ../index.php');
    exit();
} else {
    $response = [
        "status" => false
    ];
    $_SESSION["false-auth"] = "Неправильный пароль или логин";
    header ('Location: ../index.php');
    exit();
}

