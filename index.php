<?php

    require_once 'bootsrap.php';

    $router = new lib\Routing\Router();

    /*
        Adding the new 'route'  First parameter is the request from url, the second is handler
    */
    $router->post('/addEvent', ['lib\Pages\Calendar', 'addEvent']);
    $router->post('/changeEventStatus', ['lib\Pages\Calendar', 'changeEventStatus']);
    $router->post('/deleteEvent', ['lib\Pages\Calendar', 'deleteEvent']);
    $router->post('/addSpenderItem', ['lib\Pages\MoSpenderController', 'addSpenderItem']);
    $router->post('/addMoneyIncome', ['lib\Pages\MoSpenderController', 'addMoneyIncome']);
    $router->post('/register-user', ['lib\Auth\RegisterController', 'registerUser']);

    $router->get('/calendar', ['lib\Pages\Calendar', 'showCalendar']);
    $router->get('/mo-spender', ['lib\Pages\MoSpenderController', 'showMoSpender']);
    $router->get('/main-page', ['lib\Pages\MainPageController', 'showMainPage']);
    $router->get('/js-page', ['lib\Pages\JsPageController', 'showJsPage']);
    $router->get('/auth', ['lib\Auth\RegisterController', 'showAuthPage']);

    $router->get('/behavioral-patterns', ['lib\Pages\BehavioralPageController', 'showBehavioralPage']);
    $router->get('/creational-patterns', ['lib\Pages\CreationalPageController', 'showCreationalPage']);
    $router->get('/structural-patterns', ['lib\Pages\StructuralPageController', 'showStructuralPage']);

    try {
        $dispatcher = new lib\Routing\Dispatcher($router);
        /*
            Handling the current route. If match - run:
            $handler[0](Class Name)->$handler[1](Method name)
        */
        $dispatcher->handle(new lib\Routing\Request());
    } catch (Exception $e) {
        echo $e->getMessage();
    }

