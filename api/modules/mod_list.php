<?php
session_start();

if (isset($_SESSION["user-name"])) {
    echo $_SESSION["user-name"];
    echo "<br>";
    // echo "<a href='profile.php'>перейти в профиль</a>";
    echo '
    <form action="../exit.php" method="POST">
        <input type="submit" value="Выйти">
    </form> 
    ';
}


