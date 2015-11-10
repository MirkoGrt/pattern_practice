<?php
    require_once 'patterns/facade.php';
    require_once 'patterns/mediator.php';
    require_once 'patterns/singleton.php';
    require_once 'patterns/builder.php';
    require_once 'patterns/templateMethod.php';
?>

<html>
    <head>
        <link rel="stylesheet" href="styles.css" />
        <title>Patterns and Practice</title>
        <link rel="shortcut icon" href="bird.png" />
        <script type="text/javascript" src="main.js"></script>
    </head>
    <body>
        <header></header>
        <main>
            <div class="facade-pattern lesson-block">
                <h3>Ski Facade <span>(structural)</span><em>/patterns/facade.php</em></h3>
                <p class="description">
                    Provide a unified interface to a set of interfaces in a subsystem.
                    Facade defines a higher-level interface that makes the subsystem easier to use.
                </p>
                <p class="small-description">
                    Just imagine you are going to the Bukovel. You want to know price ranges.
                </p>
                <?php
                    $skiFacade = new SkiResortFacade();
                    echo "<p>Price for Good Rest: " . $skiFacade->haveGoodRest(180,65,40,5,5) . "</p>";
                    echo "<p>Price for Rest with own ski: " . $skiFacade->restWithOwnSki(5) . "</p>";
                ?>
            </div>
            <div class="mediator-pattern lesson-block">
                <h3>Body Mediator <span>(behavioral)</span><em>/patterns/mediator.php</em></h3>
                <p class="description">
                    Define an object that encapsulates how a set of objects interact. Mediator promotes loose
                    coupling by keeping objects from referring to each other explicitly, and it lets you vary
                    their interaction independently.
                </p>
                <p class="small-description">
                    Just imagine the our brain. There are some body parts, that know about brain and brain knows
                    about them. But one body part not always know about other one. Body part can do its own functions
                    and send the signal to brain.
                </p>
                <p>Enter body part (ear, eie)</p>
                <form method="post">
                    <input type="text" name="name" placeholder="ear, eie">
                    <input type="submit">
                </form>
                <?php
                    $brain = new Brain($ear, $eie);
                    $part = $_POST['name'];
                    $brain->somethingChangedWithBody($part);
                ?>
            </div>
            <div class="singleton-pattern lesson-block">
                <h3>Book Singleton <span>(creational)</span><em>/patterns/singleton.php</em></h3>
                <p class="description">
                    Ensure a class only has one instance, and provide a global point
                    of access to it.
                </p>
                <p class="small-description">There are two peoples want to read the same book. Sara and Lee</p>
                <?php
                    $Sara = new BookBorrower();
                    $Lee = new BookBorrower();

                    $Sara->borrowBook();
                    echo "<p>Sara borrows a book: {$Sara->getAuthorAndTitle()}</p>";

                    $Lee->borrowBook();
                    echo "<p>Lee borrows a book: {$Lee->getAuthorAndTitle()}</p>";

                    $Sara->returnBook();
                    echo "<p>Sara returns a book</p>";

                    $Lee->borrowBook();
                    echo "<p>Lee borrows a book again: {$Lee->getAuthorAndTitle()}</p>";
                ?>
            </div>
            <div class="builder-pattern lesson-block">
                <h3>Page Builder <span>(creational)</span><em>/patterns/builder.php</em></h3>
                <p class="description">
                    Separate the construction of a complex object from its representation so that
                    the same construction process can create different representations.
                </p>
                <p class="small-description">
                    Imagine you want to create some page builder. <strong>Builder</strong> classes is the structure of pages.
                    <strong>Page director</strong> is the content of pages. In this case there is one page director to
                    both pages. You can use different directors. Depending on what you want you can construct the needed page.
                    Also you can define which methods should be used in Builder and in Director classes by defining them in Abstract classes.
                </p>
                <?php
                    $pageBuilder = new OneColumnPageBuilder();
                    $pageDirector = new PageDirector($pageBuilder);
                    $pageDirector->buildPage();
                    $page = $pageDirector->getPage();
                    echo $page->showPage();
                    echo "<hr />";
                    $pageWithSidebarBuilder = new TwoColumnsRightPageBuilder();
                    $pageDirector = new PageDirector($pageWithSidebarBuilder);
                    $pageDirector->buildPage();
                    $pageTwoColumnsFight = $pageDirector->getPage();
                    echo $pageTwoColumnsFight->showPage();
                ?>
            </div>
            <div class="template-method-pattern lesson-block">
                <h3>Template Method <span>(behavioral)</span><em>/patterns/templateMethod.php</em></h3>
                <p class="description">
                    Define the skeleton of an algorithm in an operation, deferring some steps to subclasses.
                    Template Method lets subclasses redefine certain steps of an algorithm without changing the
                    algorithm structure.
                </p>
                <p class="small-description">
                    Imagine you want to pick up the some pages from book. You can define the step and page from to start.
                    In "BookAbstract" class you define the main algorithm and methods to use in it. In our case this method
                    flip through the book you type in with step you type in and with direction and echo the matches pages.
                    You need another class to extend the "BookAbstract" to use the algorithm. In our case it is the "CookTemplate".
                    You can add and use different templates to your main algorithm (Such as pages style). Or you can to change
                    the one of the methods in Abstract Class without change the algorithm.
                    This is the substance of Template Method.
                </p>
                <p>Load Your Book: <em>name, number of pages, start page, step, direction to flip</em></p>
                <form method="post">
                    <input type="text" name="book-name" placeholder="Name of the Book">
                    <input type="text" name="number" placeholder="Number Of pages">
                    <input type="text" name="start-page" placeholder="Start Page">
                    <input type="text" name="step" placeholder="Step to look">
                    <select name="direction">
                        <option value="up">up &#8593</option>
                        <option value="down">down &#8595</option>
                    </select>
                    <input type="submit" />
                </form>
                <?php if ($_POST): ?>
                    <?php
                        $name = $_POST['book-name'];
                        $number = $_POST['number'];
                        $start = $_POST['start-page'];
                        $step = $_POST['step'];
                        $direction = $_POST['direction'];
                    ?>
                    <p>Look trought the "<?php echo $name; ?>" Book...</p>
                    <p>All pages: --<?php echo $number; ?>--...</p>
                    <p>Start Page: __<?php echo $start; ?>__...</p>
                    <p>Step: **<?php echo $step; ?>**...</p>
                    <p>Direction: >><?php echo $direction; ?>>>...</p>
                    <?php
                        $myBook = new Book($name, $number);
                        $cooktemplate = new CookBookTemplate();
                        $pagesToLook = $cooktemplate->FlipTrough($myBook, $start, $step, $direction);
                        foreach ($pagesToLook as $simplePage) {
                            echo $simplePage . " ";
                        }
                    ?>
                <?php endif; ?>
            </div>
        </main>
        <footer></footer>
    </body>
</html>
