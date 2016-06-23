<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 23.06.16
 * Time: 11:39
 */

namespace DbWork\MoCalendar;


class DeleteData {

    public $dbConnection;

    public function __construct($connection) {
        $this->dbConnection = $connection;
    }

    /**
     * @param $table
     * @param $eventId
     * @return bool
     */
    public function deleteEvent ($table, $eventId) {
        $deleteQuery = $this->dbConnection->prepare(
            'DELETE FROM '. $table .' WHERE id = :eventId'
        );

        $deleteQuery->bindParam(':eventId', $eventId);

        /* Running and checking the query */
        if ($deleteQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }

}