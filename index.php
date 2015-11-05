<?php
    require_once 'patterns/facade.php';
    require_once 'patterns/mediator.php';
    require_once 'patterns/singleton.php';
    require_once 'patterns/builder.php';
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
        </main>
        <footer></footer>
    </body>
</html>
