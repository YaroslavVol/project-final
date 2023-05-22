<?php 
session_start();

// require_once ("../config.php");
// require_once ("../core.php");

// action="api/exit.php"

if (isset($_SESSION["user-name"])) {
    echo $_SESSION["user-name"];
    echo "<br>";
    // echo "<a href='profile.php'>перейти в профиль</a>";
    echo '
    <form  method="POST">
        <input type="submit" value="Выйти">
    </form> 
    ';
} else {
    if (isset($_SESSION["false-auth"])) {
        echo $_SESSION["false-auth"];
    }
    echo '
        <form id="form-auth" method="POST" action="/api/auth.php">
            <input type="text" id="login" name="login" placeholder="Введите логин" required><br>

            <input type="password" id="password" name="password" placeholder="Введите пароль" required><br>

            <input type="submit" value="Войти">
        </form>
    ';
}