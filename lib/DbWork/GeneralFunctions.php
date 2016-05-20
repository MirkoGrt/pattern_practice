<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 20.05.16
 * Time: 11:20
 */

namespace DbWork;


class GeneralFunctions {
    public $dbConnection;

    public function __construct($connection) {
        $this->dbConnection = $connection;
    }

    /**
     * @param $tableName
     * @return bool
     *
     * check if table exists in DB
     */
    public function checkIfTableExist ($tableName) {
        $PDO_Connection = $this->dbConnection;

        $results = $PDO_Connection->query("SHOW TABLES LIKE '$tableName'");
        if ($results->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}