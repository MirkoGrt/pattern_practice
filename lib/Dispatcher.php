<?php

/**
 * Class Dispatcher
 */
class Dispatcher {

    private $router;

    /**
     * Dispatcher constructor.
     * @param Router $router
     */
    function __construct(Router $router) {
        $this->router = $router;
    }

    /**
     * @param Request $request
     */
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
