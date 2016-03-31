<main class="android-content mdl-layout__content">
    <div class="mdl-grid">
        <div class="mdl-cell--2-col"></div>
        <div class="mdl-cell--8-col">
            <h3>Main Page</h3>
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