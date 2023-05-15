<?php

header("Content-Type:text/html; charset=UTF-8;");

require_once ("api/config.php");
require_once ("api/core.php");

if (isset($_GET['option'])) {
    $class=trim(strip_tags($_GET['option']));
} 

elseif (isset($_POST['option'])){
    $class=trim(strip_tags($_POST['option']));
}

else {
    $class='main';
}

if (file_exists("api/".$class.".php")) {
    include ("api/".$class.".php");
    
    if (class_exists($class)) {
        $obj = new $class;
        $obj->get_body();
    } else {
        exit("<p>Введены неверные данные для входа</p>");
    }
} else {
    exit("<p>Не верный адрес</p>");
}

?>