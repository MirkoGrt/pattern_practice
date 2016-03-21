<?php
    @include '../../DbConnection/connection.php';

    /* Getting post data */
    $eventTimestamp = $_POST['timestamp'];
    $eventTitle = $_POST['title'];
    $eventDetails = $_POST['details'];

    /* MySQL insert query */
    $insertQuery = 'INSERT INTO events (title, detail, eventDate, dateAdded)
                    VALUES ("'. $eventTitle .'", "'. $eventDetails .'", "'. $eventTimestamp .'", NOW())';

    /* Running and checking the query */
    if ($_SESSION['db_connection']->exec($insertQuery)) {
        echo json_encode("Success! Event added!");
    } else {
        echo json_encode("Error with adding the event!");
    }
    mysqli_close($_SESSION['db_connection']);
?>