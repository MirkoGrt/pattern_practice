<?php

/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 24.06.16
 * Time: 12:06
 */

namespace lib;

class MoPower {

    private $moSpenderDB = 'moSpender';
    private $moCalendarDB = 'practice_calendar';
    private $dbUser = 'root';
    private $dbPass = 'root';

    private $dbConnection;

    protected function setMoSpenderConnection () {
        $connection =  new DbWork\DbConnection($this->dbUser, $this->dbPass, $this->moSpenderDB);
        $this->dbConnection = $connection->initDbConnection();
    }

    protected function setMoCalendarConnection () {
        $connection =  new DbWork\DbConnection($this->dbUser, $this->dbPass, $this->moCalendarDB);
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