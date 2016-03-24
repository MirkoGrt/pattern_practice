<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Patterns and Practice</title>
    <link rel="shortcut icon" href="../bird.png" />
    <script type="text/javascript" src="../js/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="../js/processing.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>

    <!--MDL-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.2/material.brown-orange.min.css">
    <script defer src="https://code.getmdl.io/1.1.2/material.min.js"></script>

    <!--Android Template styles-->
    <link rel="stylesheet" href="../android-template-styles.css">

    <link rel="stylesheet" href="../style.css" />
    <?php
        /* include Autoloader class here as the head is on all pages (As general entry point) */
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
    ?>
</head>