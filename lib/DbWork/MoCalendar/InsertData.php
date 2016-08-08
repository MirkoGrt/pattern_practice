<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 23.06.16
 * Time: 11:21
 */

namespace lib\DbWork\MoCalendar;


class InsertData {

    public $dbConnection;

    public function __construct($connection) {
        $this->dbConnection = $connection;
    }

    /**
     * @param $table
     * @param $eventTitle
     * @param $eventDetails
     * @param $eventTimestamp
     * @return bool
     */
    public function addEvent ($table, $eventTitle, $eventDetails, $eventTimestamp) {
        $insertQuery = $this->dbConnection->prepare(
            'INSERT INTO '. $table .' (title, detail, eventDate, dateAdded, eventStatus)
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
     * @param $table
     * @param $eventId
     * @return bool
     */
    public function updateEventStatus ($table, $eventId) {
        $insertQuery = $this->dbConnection->prepare(
            'UPDATE '. $table .'
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