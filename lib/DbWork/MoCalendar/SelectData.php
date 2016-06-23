<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 23.06.16
 * Time: 11:50
 */

namespace DbWork\MoCalendar;


class SelectData {
    public $dbConnection;

    public function __construct($connection) {
        $this->dbConnection = $connection;
    }

    /**
     * @return array
     */
    public function getAllEvents () {
        $insertQuery = 'SELECT id, title, detail, eventStatus, eventDate FROM events';
        $allEventsData = array();

        foreach ($this->dbConnection->query($insertQuery) as $row) {
            $eventData = array();
            $eventData['title'] = $row["title"];
            $eventData['detail'] = $row["detail"];
            $eventData['id'] = $row["id"];
            $eventData['status'] = $row["eventStatus"];
            $allEventsData[$row["eventDate"]][] = $eventData;
        }

        return $allEventsData;
    }

    /**
     * @return array
     */
    public function getTimestamps () {
        $insertQuery = 'SELECT eventDate FROM events';
        $allTimestamps = array();

        foreach ($this->dbConnection->query($insertQuery) as $row) {
            $allTimestamps[] = $row["eventDate"];
        }

        return $allTimestamps;
    }
}