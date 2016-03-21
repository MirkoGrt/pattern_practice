<?php

    class Calendar {

        /**
         * @return PDO
         */
        public function initDbConnection () {
            $userName = 'root';
            $password = 'root';

            $calendar_connection = new PDO('mysql:host=localhost; dbname=practice_calendar; charset=utf8mb4', $userName, $password);

            $calendar_connection or die('ERROR with connection to MYSQL server . . .<hr />');

            return $calendar_connection;
        }

        /**
         * Adding event to events table
         */
        public function addEvent() {
            $PDO_Connection = $this->initDbConnection();

            /* Getting post data */
            $eventTimestamp = $_POST['timestamp'];
            $eventTitle = $_POST['title'];
            $eventDetails = $_POST['details'];

            /* MySQL insert query */
            $insertQuery = 'INSERT INTO events (title, detail, eventDate, dateAdded)
                    VALUES ("'. $eventTitle .'", "'. $eventDetails .'", "'. $eventTimestamp .'", NOW())';

            /* Running and checking the query */
            if ($PDO_Connection->exec($insertQuery)) {
                echo json_encode("Success! Event added!");
            } else {
                echo json_encode("Error with adding the event!");
            }
        }

        /**
         * @return array
         *
         * (all events timestamp from events table)
         */
        public function getEventsTimestamp () {
            $PDO_Connection = $this->initDbConnection();

            $insertQuery = 'SELECT eventDate FROM events';
            $allEvents = array();

            foreach($PDO_Connection->query($insertQuery) as $row) {
                $allEvents[] = $row["eventDate"];
            }

            return $allEvents;
        }
    }
?>