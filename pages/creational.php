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
                        $Sara = new Patterns\Creational\Singleton\BookBorrower();
                        $Lee = new Patterns\Creational\Singleton\BookBorrower();

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
                        Imagine you want to create some page builder. <strong>Builder</strong> classes is the structure of pages.
                        <strong>Page director</strong> is the content of pages. In this case there is one page director to
                        both pages. You can use different directors. Depending on what you want you can construct the needed page.
                        Also you can define which methods should be used in Builder and in Director classes by defining them
                        in Abstract classes.
                    </p>
                    <hr>
                    <?php
                        $pageBuilder = new Patterns\Creational\Builder\OneColumnPageBuilder();
                        $pageDirector = new Patterns\Creational\Builder\PageDirector($pageBuilder);
                        $pageDirector->buildPage();
                        $page = $pageDirector->getPage();
                        echo $page->showPage();
                        echo "<hr />";
                        $pageWithSidebarBuilder = new Patterns\Creational\Builder\TwoColumnsRightPageBuilder();
                        $pageDirector = new Patterns\Creational\Builder\PageDirector($pageWithSidebarBuilder);
                        $pageDirector->buildPage();
                        $pageTwoColumnsFight = $pageDirector->getPage();
                        echo $pageTwoColumnsFight->showPage();
                    ?>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Button
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