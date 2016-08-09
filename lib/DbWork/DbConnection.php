<?php

/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 21.04.16
 * Time: 10:40
 */

namespace lib\DbWork;

class DbConnection {

    public $username;
    public $password;
    public $dbName;
    public $host;

    public function __construct($username, $password, $dbName, $host) {
        $this->username = $username;
        $this->password = $password;
        $this->dbName = $dbName;
        $this->host = $host;
    }

    /**
     * @return \PDO
     *
     * do connection to DB
     */
    public function initDbConnection () {

        $PDO_Connection = new \PDO('mysql:host=' . $this->host .'; dbname=' . $this->dbName . '; charset=utf8mb4', $this->username, $this->password);

        $PDO_Connection or die('ERROR with connection to MYSQL server . . .<hr />');

        return $PDO_Connection;
    }
}