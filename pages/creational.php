
<main class="android-content mdl-layout__content">
    <div class="singleton-pattern lesson-block">
        <h3>Book Singleton <span>(creational)</span><em>/patterns/singleton.php</em></h3>
        <p class="description">
            Ensure a class only has one instance, and provide a global point
            of access to it.
        </p>
        <p class="small-description">There are two peoples want to read the same book. Sara and Lee</p>
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
</main>