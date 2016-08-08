<main class="android-content mdl-layout__content">
    <div class="mdl-grid">
        <div class="mdl-cell--2-col"></div>
        <div class="mdl-cell--8-col">
            <div class="page-title-card creational-page-title-card mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Creational patterns Page</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    Creational Patterns implementations
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

            <div class="lesson-block-card singleton-pattern mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Book Singleton <span class="subtitle">lib/Patterns/Creational/Singleton</span></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <p class="description">
                        Ensure a class only has one instance, and provide a global point
                        of access to it.
                    </p>
                    <p class="small-description">
                        There are two peoples want to read the same book. Sara and Lee
                    </p>
                    <hr>
                    <?php
                        $Sara = new lib\Patterns\Creational\Singleton\BookBorrower();
                        $Lee = new lib\Patterns\Creational\Singleton\BookBorrower();

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
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                       onclick="togglePatternDiagram('singleton', this)">
                        Show/Hide UML Diagram
                    </a>
                </div>
                <div class="mdl-card__menu">
                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">share</i>
                    </button>
                </div>
                <div class="pattern-diagram-wrapper singleton-diagram">
                    <img src="/images/patterns_uml_diagrams/diagram_singleton.png" alt="singleton_uml_diagram" />
                </div>
            </div>

            <div class="lesson-block-card builder-pattern mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Page Builder <span class="subtitle">lib/Patterns/Creational/Builder</span></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <p class="description">
                        Separate the construction of a complex object from its representation so that
                        the same construction process can create different representations.
                    </p>
                    <p class="small-description">
                        Imagine you want to create some page builder. <strong>Builder</strong> class is the structure of pages.
                        <strong>Page director</strong> is the content of pages. In this case there is one page director to
                        both pages. You can use different directors. Depending on what you want you can construct the needed page.
                        Also you can define which methods should be used in Builder and in Director classes by defining them
                        in Abstract classes. <br>
                        First we create the needed page object. <br> Then we create the page builder object with needed page in
                        constructor. PageBuilder uses page-class set-methods to set the data <br> Then we create a Page director object with page builder in constructor
                        <br> Director(buildPage)->Builder(formatPage)->Page(formatPage)
                    </p>
                    <hr>
                    <?php
                        $oneColumnPage = new lib\Patterns\Creational\Builder\OneColumnPage();
                        $pageBuilder = new lib\Patterns\Creational\Builder\MainPageBuilder($oneColumnPage);
                    
                        $pageDirector = new lib\Patterns\Creational\Builder\PageDirector($pageBuilder);
                        $pageDirector->buildPage();
                        $page = $pageDirector->getPage();
                        echo $page->showPage();
                        echo "<hr />";

                        $twoColumnsRightPage = new lib\Patterns\Creational\Builder\TwoColumnsRightPage();
                        $pageBuilder = new lib\Patterns\Creational\Builder\MainPageBuilder($twoColumnsRightPage);

                        $pageDirector = new lib\Patterns\Creational\Builder\PageDirector($pageBuilder);
                        $pageDirector->buildPage();
                        $pageTwoColumnsRight = $pageDirector->getPage();
                        echo $pageTwoColumnsRight->showPage();
                    ?>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                       onclick="togglePatternDiagram('builder', this)">
                        Show/Hide UML Diagram
                    </a>
                </div>
                <div class="mdl-card__menu">
                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">share</i>
                    </button>
                </div>
                <div class="pattern-diagram-wrapper builder-diagram">
                    <img src="/images/patterns_uml_diagrams/diagram_builder.png" alt="builder_uml_diagram" />
                </div>
            </div>

            <div class="lesson-block-card abstract-factory-pattern mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">War Abstract Factory (people vs zombie) <span class="subtitle">lib/Patterns/Creational/AbstractFactory</span></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <p class="description">
                        Provide an interface for creating families of related or dependent objects without
                        specifying their concrete classes.
                    </p>
                    <p class="small-description">
                        Here we have the simple war imitation. We input quantity of warriors and start the war.
                        Peoples and Zombies have the same interfaces, but another implementation.
                        <br>
                        Abstract factory is used for creating different objects from one interface.
                    </p>
                    <hr>
                    <form class="abstract-factory-form" method="get">
                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="number" required name="people-qty">
                            <label class="mdl-textfield__label" for="people-qty">Peoples quantity</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" required type="number" name="zombies-qty">
                            <label class="mdl-textfield__label" for="zombies-qty">Zombies quantity</label>
                        </div>
                        <button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                            Run WAR!
                        </button>
                        <?php
                            $zombiesQty = $_GET['zombies-qty'];
                            $peopleQty = $_GET['people-qty'];
                        ?>
                        <hr>
                        <?php if ($zombiesQty && $peopleQty): ?>
                            <?php
                                $zombies = new lib\Patterns\Creational\AbstractFactory\ZombieFactory();
                                $peoples = new lib\Patterns\Creational\AbstractFactory\PeopleFactory();
                            ?>
                            <div class="half-page-block">
                                <?php
                                    for ($i = 0; $i < $zombiesQty; $i++) {
                                        $zombie = $zombies->getWarrior();
                                        $zombie->sayHello();
                                    }
                                    $zombies->horrorSlogan();
                                ?>
                            </div>
                            <div class="half-page-block">
                                <?php
                                    for ($y = 0; $y < $peopleQty; $y++) {
                                        $people = $peoples->getWarrior();
                                        $people->sayHello();
                                    }
                                    $peoples->horrorSlogan();
                                ?>
                            </div>
                            <div class="clearfix"></div>
                        <?php else: ?>
                            <h4>First run the war!!...</h4>
                        <?php endif; ?>
                    </form>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                       onclick="togglePatternDiagram('abstract-factory', this)">
                        Show/Hide UML Diagram
                    </a>
                </div>
                <div class="mdl-card__menu">
                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">share</i>
                    </button>
                </div>
                <div class="pattern-diagram-wrapper abstract-factory-diagram">
                    <img src="/images/patterns_uml_diagrams/diagram_abstract-factory.png" alt="abstract-factory_uml_diagram" />
                </div>
            </div>

        </div>
        <div class="mdl-cell--2-col"></div>
    </div>
</main>