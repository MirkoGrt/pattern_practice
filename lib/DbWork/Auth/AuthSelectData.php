<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 29.08.16
 * Time: 15:45
 */

namespace lib\DbWork\Auth;


class AuthSelectData {
    public $dbConnection;

    public function __construct($connection) {
        $this->dbConnection = $connection;
    }

    public function checkIfUserExists ($table, $email) {
        $insertQuery = $this->dbConnection->prepare('SELECT * FROM ' . $table . ' WHERE email = :email');

        $insertQuery->bindParam(':email', $email);

        $insertQuery->execute();

        if ($insertQuery->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}