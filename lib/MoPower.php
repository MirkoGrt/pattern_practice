<?php

/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 24.06.16
 * Time: 12:06
 */

namespace lib;

class MoPower {

    public $moSpenderDB;
    public $moCalendarDB;
    public $dbUser;
    public $dbPass;
    public $host;

    private $dbConnection;

    public function __construct() {
        $configFile = simplexml_load_file(__DIR__ . '/config.xml');
        if (!$configFile) {
            throw new \Exception('No configuration file');
        }
        $this->host = $configFile->general->mysqlHost;
        $this->dbPass = $configFile->general->password;
        $this->dbUser = $configFile->general->user;
        $this->moCalendarDB = $configFile->moCalendar->dbName;
        $this->moSpenderDB = $configFile->moSpender->dbName;
    }

    protected function setMoSpenderConnection () {
        $connection =  new DbWork\DbConnection($this->dbUser, $this->dbPass, $this->moSpenderDB, $this->host);
        $this->dbConnection = $connection->initDbConnection();
    }

    protected function setMoCalendarConnection () {
        $connection =  new DbWork\DbConnection($this->dbUser, $this->dbPass, $this->moCalendarDB, $this->host);
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

}