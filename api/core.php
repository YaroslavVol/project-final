<?php
    abstract class ACore { 
    
        protected $connect;
    
        public function __construct() { //создаем коснтруктор
            $this->connect =  new mysqli(HOST, USER, PASSWORD, DATABASE); 
            if ($this->connect->connect_error) { //если невозможно установить соединение 
                exit("Ошибка соединения с базой данных: " . $this->connect->connect_error); // то выходим и выводим ошибку
            }
            $this-> connect->set_charset("utf8"); //устанавливаем кодировку с которой будем работать с БД
        }
    
        public function __destruct() {
            $this->connect->close();
        }
    
        public function get_body() { 
            //функция загрузки шаблона            
            include "template/index.php";
        }

        public function formatstr($str) {
            $str = trim($str);
            $str = stripslashes($str);
            $str = htmlspecialchars($str);
            return $str;
        }
        
    }
