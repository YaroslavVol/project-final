<?php
session_start();
if (isset($_SESSION['user-name']))
    unset ($_SESSION['user-name']);
    // session_destroy();
    session_destroy();
    header ('Location: ../index.php');
    exit();
?>