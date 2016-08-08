<?php

namespace lib\Routing;

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

        /*
            get route parameter from url.
            We need to delete query params for routing works when forms are sending get request
        */
        $queryString = $_SERVER['QUERY_STRING'];
        $queryPath = str_replace('?' . $queryString, '', $_SERVER['REQUEST_URI']);
        $this->path = $queryPath;
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