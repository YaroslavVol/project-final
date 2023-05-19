<?php
session_start();

require_once ("config.php");

$connect = new mysqli(HOST, USER, PASSWORD, DATABASE);
if($connect->connect_error){
    exit("Ошибка подключения к БД: ".$connect->connect_error);
}
$connect->set_charset("utf8");

$id_group = $_SESSION['id_group'];

$sql = "
    SELECT * FROM `groups` WHERE `id_group` = $id_group
";

$result = $connect->prepare($sql);

$result->execute();
$result = $result->get_result();

if($row = $result->fetch_assoc()) {
    $response = [
        "group_name" => $row["group_name"],
        "year_sets" => $row["year_sets"],
        "number_persons" => $row["number_persons"],
        "name_elder" => $row["name_elder"],
    ];
}
else {
    $response = [
        "status" => false
    ];
}
echo json_encode($response);