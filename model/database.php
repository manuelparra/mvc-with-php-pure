<?php
    class Database {
        public static function StartUp() {
            $pdo = new PDO('mysql:host=localhost;dbname=mvcwithphppure;charset=utf8','manuel','Guti.1712*');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
    }
?>
