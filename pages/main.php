<main class="android-content mdl-layout__content">
    <div class="mdl-grid">
        <div class="mdl-cell--2-col"></div>
        <div class="mdl-cell--8-col">
            <h3>Main Page</h3>
            <h5>How it works?</h5>
            <p>
                UML Diagram (31-03-2016)
                <img src="/images/uml_diagram_31_03_2016.png" alt="">
                <hr>
                <u>Autoloader</u> <br>
                The one entry point on site is the index.php file. In this file bootstrap.php is included.
                In the bootstrap.php we register the autoload static method (Autoloader::load()). The autoloader
                class location: <strong> 'lib/Autoloader.php'</strong>. Now autoloader loads classes only from
                <i>'lib'</i> directory. To be continued with namespaces.
                <hr>
                <u>Routing</u> <br>
                As <i>index.php</i> is one entry point, we declare all routes and all needed objects to routing in
                this file. First the <strong>Router ('lib/Router.php')</strong>  object is created. Now we define
                the available routers. We should define them this way:
                <strong>$router->get('<i>route-path</i>', ['<i>class-name</i>', '<i>method-name</i>']);</strong>
                At the moment we can define route as 'get' or 'post'. When creating the link to some action you need
                to write <strong>href='?action=route-path'</strong>.  In <strong>Router->match()</strong>
                method all routers are checked. If current route is matching some of the exists this method return
                tha <strong>array['class-name', 'method-name']</strong>. Then the route 'goes' to dispatcher and
                the dispatcher handling the current route. Dispatcher run [0] element of this array as class, and
                [1] element as method.
                <hr>
                <u>MVC</u> <br>
                As we see from UML diagram there is 'BaseController' class. In this file the 'View' object is created.
                All view controllers need extends BaseController to run the 'render' method. 'Render' method is located
                in 'lib/View.php' controller. This method gets path to file, path to layout and array with variables
                we can get in the view file. Method <strong>View->render()</strong> push view file content to variable
                and then push this variable to layout (<strong>echo $content</strong> in layout file).
                All view files are located in 'pages' directory. All controllers - in 'lib' directory.
                Every view file must have its own controller file. Every controller must have the method that render
                its view file. We run this method by URL via routing.
                <hr>
            </p>
            <h5>How to add new page?</h5>
            <p>
                To add new page you need to create the view file (test.php) in 'pages' directory. Then create the
                controller file (TestController) in 'lib' directory with action (showTestPage) that will return this view file. Controller should
                extends the BaseController to use the 'render' method.<br />
                Now create the route to TestController->showTestPage ('show-test-page', ['TestController', 'showTestPage']) in index.php file. <br>
                In the menu create link with href='?action=show-test-page'. Done!
            </p>

            <h5>Where is the main layout?</h5>
            <p>The main layout file: <stong>pages/mainLayout.php</stong></p>

            <h5>How main page is shown by default?</h5>
            <p>
                In the lib folder and 'Router->match()' method we check if the router path exists. If no - make it
                as main page route.
            </p>
        </div>
        <div class="mdl-cell--2-col"></div>
    </div>
</main>