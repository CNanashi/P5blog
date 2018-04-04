<?php

abstract class Database{

    public static function getDB($db)
    {
        $pdo = Configuration::getInstance();
        try {
            switch ($db) {
                case "mysql":
                    return new \PDO("mysql:host=" . $pdo->get('db_hostname') . ";dbname=" . $pdo->get('db_name'), $pdo->get('db_user'), $pdo->get('db_password'));
                default:
                    throw new \PDOException("error");
            }
        } catch (\PDOException $e) {
            die("Error : " . $e->getMessage());
        }
    }
}