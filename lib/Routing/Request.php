<?php

namespace Routing;

/**
 * Class Request
 */
class Request {

    private $method;
    private $path;

    /**
     * Request constructor.
     */
    function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'];

        /* get 'action' parameter from url. Route = action */
        $this->path = $_REQUEST['action'];
    }

    /**
     * @return mixed
     */
    function getMethod() {
        return $this->method;
    }

    /**
     * @return mixed
     */
    function getPath() {
        return $this->path;
    }

}