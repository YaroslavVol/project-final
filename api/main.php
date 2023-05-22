<?php
    class Main extends ACore {

    public function get_login() {
        include("api/modules/login.php");
    }

    public function get_content() {
        include("api/modules/mod_list.php");
    }
}

?>