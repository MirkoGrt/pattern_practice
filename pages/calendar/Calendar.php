<?php

/**
 * Class Calendar
 */
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

        foreach ($PDO_Connection->query($insertQuery) as $row) {
            $allEvents[] = $row["eventDate"];
        }

        return $allEvents;
    }

    /**
     * @param $dayTimestamp
     * @return mixed
     *
     * Return event title by event timestamp
     */
    public function getEventTitle ($dayTimestamp) {
        $PDO_Connection = $this->initDbConnection();
        $insertQuery = 'SELECT title FROM events WHERE eventDate = ' . $dayTimestamp;

        foreach ($PDO_Connection->query($insertQuery) as $row) {
            $eventTitle = $row["title"];
        }

        return $eventTitle;
    }

    /**
     * @param $dayTimestamp
     * @return mixed
     *
     * Return event details by event timestamp
     */
    public function getEventDetails ($dayTimestamp) {
        $PDO_Connection = $this->initDbConnection();
        $insertQuery = 'SELECT detail FROM events WHERE eventDate = ' . $dayTimestamp;

        foreach ($PDO_Connection->query($insertQuery) as $row) {
            $eventDetail = $row["detail"];
        }

        return $eventDetail;
    }
}

/*
 * @todo
 *
 * REFACTOR the Dispatcher pattern
*/

class Request {

    private $method;
    private $path;

    function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'];

        /* get 'action' parameter from url. Route = action */
        $this->path = $_REQUEST['action'];
    }

    function getMethod() {
        return $this->method;
    }

    function getPath() {
        return $this->path;
    }

}

class Router {

    private $routes = [
        'get' => [],
        'post' => []
    ];

    function get($pattern, callable $handler) {
        $this->routes['get'][$pattern] = $handler;
        return $this;
    }

    function post($pattern, callable $handler) {
        $this->routes['post'][$pattern] = $handler;
        return $this;
    }

    function match(Request $request) {
        $method = strtolower($request->getMethod());
        if (!isset($this->routes[$method])) {
            return false;
        }

        $path = $request->getPath();
        foreach ($this->routes[$method] as $pattern => $handler) {
            if ($pattern === $path) {
                return $handler;
            }
        }

        return false;
    }

}

class Dispatcher {

    private $router;

    function __construct(Router $router) {
        $this->router = $router;
    }

    function handle(Request $request) {
        $handler = $this->router->match($request);
        if (!$handler) {
            return;
        }
        $className = $handler[0];
        $methodName = $handler[1];

        $handleClassObject = new $className();
        $handleClassObject->$methodName();
    }
}

$router = new Router();

/*
    Adding the new 'route'  First parameter is the action from url, the second is handler
*/
$router->post('addEvent', ['Calendar', 'addEvent']);

$dispatcher = new Dispatcher($router);

/*
    Handling the current route. If match - run:
    $handler[0](Class Name)->$handler[1](Method name)
*/
$dispatcher->handle(new Request());

