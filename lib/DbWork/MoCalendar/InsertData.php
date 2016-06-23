<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 23.06.16
 * Time: 11:21
 */

namespace DbWork\MoCalendar;


class InsertData {

    public $dbConnection;

    public function __construct($connection) {
        $this->dbConnection = $connection;
    }

    /**
     * @param $eventTitle
     * @param $eventDetails
     * @param $eventTimestamp
     * @return bool
     */
    public function addEvent ($eventTitle, $eventDetails, $eventTimestamp) {
        $insertQuery = $this->dbConnection->prepare(
            'INSERT INTO events (title, detail, eventDate, dateAdded, eventStatus)
                VALUES (:eventTitle, :eventDetails, :eventTimestamp, NOW(), 1)'
        );

        /* Binding params */
        $insertQuery->bindParam(':eventTitle', $eventTitle);
        $insertQuery->bindParam(':eventDetails', $eventDetails);
        $insertQuery->bindParam(':eventTimestamp', $eventTimestamp);

        /* Running and checking the query */
        if ($insertQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $eventId
     * @return bool
     * 
     * function to toggle event status (active / not active)
     */
    public function updateEventStatus ($eventId) {
        $insertQuery = $this->dbConnection->prepare(
            'UPDATE events
              SET eventStatus = !eventStatus
              WHERE id = :eventId'
        );

        $insertQuery->bindParam(':eventId', $eventId);

        /* Running and checking the query */
        if ($insertQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }

}