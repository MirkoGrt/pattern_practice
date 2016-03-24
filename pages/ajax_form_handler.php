<?php

    /* @NOTE
        The file for all ajax form handling to avoid all page HTML output in response.
     */

    require_once '../lib/Autoloader.php';
    spl_autoload_register('Autoloader::load');


    /* @todo
     *
     * Refactor routing.
     *
     */
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