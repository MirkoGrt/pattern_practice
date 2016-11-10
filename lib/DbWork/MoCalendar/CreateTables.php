<?php

/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 23.06.16
 * Time: 11:08
 */

namespace lib\DbWork\MoCalendar;

class CreateTables {

    public $dbConnection;

    public function __construct($connection) {
        $this->dbConnection = $connection;
    }

    /**
     * @param $tableName
     *
     * function for creating table for events
     */
    public function createEventsTable ($tableName) {
        $PDO_Connection = $this->dbConnection;

        $sql = 'CREATE TABLE ' . $tableName .' (
                  id int(11) NOT NULL AUTO_INCREMENT,
                  title varchar(255) NOT NULL,
                  detail varchar(255) NOT NULL,
                  eventDate varchar(10) NOT NULL,
                  dateAdded date NOT NULL,
                  eventStatus tinyint(1) NOT NULL,
                  PRIMARY KEY (id),
                  
                ) ENGINE=InnoDB,
                CHARACTER SET utf8 COLLATE utf8_general_ci
                ;';

        $PDO_Connection->exec($sql);
    }

}