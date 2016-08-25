<?php

/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 25.08.16
 * Time: 10:07
 */

namespace lib\DbWork\Auth;

class CreateTables {
    public $dbConnection;

    public function __construct($connection) {
        $this->dbConnection = $connection;
    }

    public function createUsersTable ($tableName) {
        $PDO_Connection = $this->dbConnection;

        $sql = 'CREATE TABLE ' . $tableName .' (
                  id int(11) NOT NULL AUTO_INCREMENT,
                  nickname varchar(255) NOT NULL,
                  email varchar(255) NOT NULL,
                  password varchar(255) NOT NULL,
                  createdAt date NOT NULL,
                  slogan text NOT NULL,
                  PRIMARY KEY (id)
                ) ENGINE=InnoDB;';

        $PDO_Connection->exec($sql);
    }
}