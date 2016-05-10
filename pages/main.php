<main class="android-content mdl-layout__content">
    <div class="mdl-grid">
        <div class="mdl-cell--2-col"></div>
        <div class="mdl-cell--8-col">
            <div class="page-title-card main-page-title-card mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Main Page</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <h5>How it works?</h5>
                    <hr>
                    <u>Autoloader</u> <br>
                    The one entry point on site is the index.php file. In this file bootstrap.php is included.
                    In the bootstrap.php we register the autoload static method (Autoloader::load()). The autoloader
                    class location: <strong> 'lib/Autoloader.php'</strong>.Autoloader loads classes with namespaces.
                    <hr>
                    <u>Routing</u> <br>
                    As <i>index.php</i> is one entry point, we declare all routes and all needed objects to routing in
                    this file. First the <strong>Router ('lib/Routing/Router.php')</strong>  object is created. Now we define
                    the available routers. We should define them this way:
                    <strong>$router->get('<i>route-path</i>', ['<i>\namespace-name\class-name</i>', '<i>method-name</i>']);</strong>
                    At the moment we can define route as 'get' or 'post'. When creating the link to some path you need
                    to write <strong>href='/route-path'</strong>.  In <strong>Router->match()</strong>
                    method all routers are checked. If current route is matching some of the exists this method return
                    tha <strong>array['\namespace-name\class-name', 'method-name']</strong>. Then the route 'goes' to dispatcher and
                    the dispatcher handling the current route. Dispatcher run [0] element of this array as class, and
                    [1] element as method.
                    <hr>
                    <img src="/images/diagram_routing_20-04-16.png" alt="Routing diagram">
                    <hr>
                    <u>MVC</u> <br>
                    As we see from UML diagram there is 'BaseController' class. In this file the 'View' object is created.
                    All view controllers need extends BaseController to run the 'render' method. 'Render' method is located
                    in 'lib/mvc/View.php' controller. This method gets path to file, path to layout and array with variables
                    we can get in the view file. Method <strong>View->render()</strong> push view file content to variable
                    and then push this variable to layout (<strong>echo $content</strong> in layout file).
                    All view files are located in 'pages' directory. All pages controllers - in 'lib/Pages/' directory.
                    Every view file must have its own controller file. Every controller must have the method that render
                    its view file. We run this method by URL via routing.
                    <hr>
                    <img src="/images/diagram_mvc_20-04-16.png" alt="MVC diagram">
                    <hr>

                    <u>Patterns</u> <br>
                    There is patterns implementations on this site. Each pattern has its own namespace (lib/Patterns)
                    Patterns pages links are in the burger-menu. To see pattern classes open it in the "lib" folder. To
                    see the pattern usage open the current patterns group page in the "pages" folder <strong>(creational.php,
                    behavioral.php, structural.php)</strong>. To see the pattern presentation open its group page in burger menu
                    and find interested pattern.
                    <hr>

                    <u>Pages</u> <br>
                    Pages Controllers to render pages views and do some functionality on its views
                    <hr>
                    <img src="/images/diagram_pages_20-04-16.png" alt="Pages diagram">
                    <hr />
                    <h1>FAQ</h1>
                    <h5>How to add new page?</h5>
                    <p>
                        To add new page you need to create the view file (test.php) in 'pages' directory. Then create the
                        controller file (TestController) in 'lib/Pages' directory with action (showTestPage) that will return this view file. Controller should
                        extends the \mvc\BaseController to use the 'render' method.<br />
                        Now create the route to TestController->showTestPage ('/show-test-page', ['\Pages\TestController', 'showTestPage']) in index.php file. <br>
                        In the menu create link with href='/show-test-page'. Done!
                    </p>

                    <h5>Where is the layout files?</h5>
                    <p>The layout files: <stong>pages/layouts</stong> directory</p>

                    <h5>How main page is shown by default?</h5>
                    <p>
                        In the <strong>'lib\Routing'</strong> folder and 'Router->match()' method we check if the router path exists. If no - make it
                        as main page route.
                    </p>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Button...
                    </a>
                </div>
                <div class="mdl-card__menu">
                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">share</i>
                    </button>
                </div>
            </div>
        </div>
        <div class="mdl-cell--2-col"></div>
    </div>
</main>