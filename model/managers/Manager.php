<?php


abstract class Manager{

    protected $dbh;

    public function __construct()
    {

        $this->dbh=Database::getDB();

    }

}