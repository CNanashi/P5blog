<?php

class Database{
<<<<<<< HEAD
=======

>>>>>>> 53fe931463b07ea5b201e7e913b3b09f6ec3b37a
    public static function getDB(){
        try {
            $db = new PDO('mysql:host=localhost;dbname=blogp5', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }
        catch (\PDOException $e) {
            die("Error : " . $e->getMessage());
        }
    }
}