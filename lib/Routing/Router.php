<?php

namespace Routing;

/**
 * Class Router
 */
class Router {

    private $routes = [
        'get' => [],
        'post' => []
    ];

    /**
     * @param $pattern
     * @param callable $handler
     * @return $this
     */
    function get($pattern, callable $handler) {
        $this->routes['get'][$pattern] = $handler;
        return $this;
    }

    /**
     * @param $pattern
     * @param callable $handler
     * @return $this
     */
    function post($pattern, callable $handler) {
        $this->routes['post'][$pattern] = $handler;
        return $this;
    }

    /**
     * @param Request $request
     * @return bool
     */
    function match(Request $request) {
        $method = strtolower($request->getMethod());
        if (!isset($this->routes[$method])) {
            return false;
        }

        $path = $request->getPath();

        if (!$path) {
            $path = 'show-main-page';
        }

        foreach ($this->routes[$method] as $pattern => $handler) {
            if ($pattern === $path) {
                return $handler;
            }
        }

        return false;
    }
}