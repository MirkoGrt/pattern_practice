<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 26.08.16
 * Time: 13:12
 */

namespace lib\DbWork\Auth;


class AuthInsertData {
    public $dbConnection;

    public function __construct($connection) {
        $this->dbConnection = $connection;
    }

    public function insertUserToDb ($table, $email, $nickname, $slogan, $pass) {
        $insertQuery = $this->dbConnection->prepare(
            'INSERT INTO '. $table .' (nickname, email, password, createdAt, slogan)
                VALUES (:nickname, :email, :pass, NOW(), :slogan)'
        );

        /* Binding params */
        $insertQuery->bindParam(':nickname', $nickname);
        $insertQuery->bindParam(':email', $email);
        $insertQuery->bindParam(':pass', $pass);
        $insertQuery->bindParam(':slogan', $slogan);

        /* Running and checking the query */
        if ($insertQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }
}