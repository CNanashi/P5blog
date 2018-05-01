<?php
abstract class Manager{

    protected $dbh;

    public function __construct()
    {
        $this->dbh=Database::getDB();
    }
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