<?php

/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 21.04.16
 * Time: 10:40
 */

namespace DbWork;

class DbConnection {

    public $username;
    public $password;
    public $dbName;

    public function __construct($username, $password, $dbName) {
        $this->username = $username;
        $this->password = $password;
        $this->dbName = $dbName;
    }

    /**
     * @return \PDO
     *
     * do connection to DB
     */
    public function initDbConnection () {

        $PDO_Connection = new \PDO('mysql:host=localhost; dbname=' . $this->dbName . '; charset=utf8mb4', $this->username, $this->password);

        $PDO_Connection or die('ERROR with connection to MYSQL server . . .<hr />');

        return $PDO_Connection;
    }
}