<?php

    require_once 'bootsrap.php';

    $router = new Router();

    /*
        Adding the new 'route'  First parameter is the action from url, the second is handler
    */
    $router->post('addEvent', ['Calendar', 'addEvent']);
    $router->get('show-calendar', ['Calendar', 'showCalendar']);
    $router->get('show-main-page', ['MainPageController', 'showMainPage']);
    $router->get('show-js-page', ['JsPageController', 'showJsPage']);

    $dispatcher = new Dispatcher($router);

    /*
        Handling the current route. If match - run:
        $handler[0](Class Name)->$handler[1](Method name)
    */
    $dispatcher->handle(new Request());

