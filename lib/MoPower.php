<?php

/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 24.06.16
 * Time: 12:06
 */

namespace lib;

class MoPower {

    private $dbConnection;

    public function __construct() {
        $configFile = simplexml_load_file(__DIR__ . '/config.xml');
        if (!$configFile) {
            throw new \Exception('No configuration file');
        }
        $host = $configFile->general->mysqlHost;
        $dbPass = $configFile->general->password;
        $dbUser = $configFile->general->user;
        $dbName = $configFile->general->dbname;

        $connection = new DbWork\DbConnection($dbUser, $dbPass, $dbName, $host);
        $this->dbConnection = $connection->initDbConnection();
    }

    public function generalFunctions () {
        return new DbWork\GeneralFunctions($this->dbConnection);
    }

    // MoSpender DB classes
    public function moSpenderCreate () {
        return new DbWork\MoSpender\CreateTables($this->dbConnection);
    }

    public function moSpenderInsert () {
        return new DbWork\MoSpender\InsertData($this->dbConnection);
    }

    public function moSpenderSelect () {
        return new DbWork\MoSpender\SelectData($this->dbConnection);
    }

    // MoCalendar DB classes
    public function moCalendarCreate () {
        return new DbWork\MoCalendar\CreateTables($this->dbConnection);
    }

    public function moCalendarInsert () {
        return new DbWork\MoCalendar\InsertData($this->dbConnection);
    }

    public function moCalendarSelect () {
        return new DbWork\MoCalendar\SelectData($this->dbConnection);
    }

    public function moCalendarDelete () {
        return new DbWork\MoCalendar\DeleteData($this->dbConnection);
    }
    
    // Auth DB classes
    public function authCreate () {
        return new DbWork\Auth\CreateTables($this->dbConnection);
    }

    public function authInsert () {
        return new DbWork\Auth\AuthInsertData($this->dbConnection);
    }
}