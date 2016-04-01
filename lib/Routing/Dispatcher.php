<?php

namespace Routing;

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
     * @throws \Exception
     */
    function handle(Request $request) {
        $handler = $this->router->match($request);
        if (!$handler) {
            throw new \Exception('Router don\'t match the handle');
        }
        $className = $handler[0];
        $methodName = $handler[1];

        $handleClassObject = new $className();

        if (method_exists($handleClassObject, $methodName)) {
            $handleClassObject->$methodName();
        } else {
            throw new \Exception('Handle class don\'t has handle method');
        }
    }
}
