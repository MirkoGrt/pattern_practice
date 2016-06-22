<main class="android-content mdl-layout__content">
    <div class="mdl-grid">
        <div class="mdl-cell--2-col"></div>
        <div class="mdl-cell--8-col">
            <div class="page-title-card behavioral-page-title-card mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Behavioral Patterns Page</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    Behavioral Patterns implementations
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

            <div class="lesson-block-card mediator-pattern mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Body Mediator <span class="subtitle">lib/Patterns/Behavioral/Mediator</span></h2>
                </div>
                <div class="mdl-card__supporting-text">
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
                    <form class="body-mediator-form" method="get">
                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" name="body_part">
                            <label class="mdl-textfield__label" for="body_part">ear, eie</label>
                        </div>
                        <button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                            Run Body!
                        </button>
                    </form>
                    <?php
                        $brain = new \Patterns\Behavioral\Mediator\Brain($ear, $eie);
                        $part = $_GET['body_part'];
                        $brain->somethingChangedWithBody($part);
                    ?>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                       onclick="togglePatternDiagram('mediator', this)">
                        Show/Hide UML Diagram
                    </a>
                </div>
                <div class="mdl-card__menu">
                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">share</i>
                    </button>
                </div>
                <div class="pattern-diagram-wrapper mediator-diagram">
                    <img src="/images/patterns_uml_diagrams/diagram_mediator.png" alt="mediator_uml_diagram" />
                </div>
            </div>

            <div class="lesson-block-card template-method-pattern mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Template Method <span class="subtitle">lib/Patterns/Behavioral/TemplateMethod</span></h2>
                </div>
                <div class="mdl-card__supporting-text">
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
                        <strong>In "BookAbstract" class we can define the core functions (private) that will be used for all
                        templates and functions than will be declared in each template (abstract functions)</strong>
                    </p>
                    <p>Load Your Book: <em>name, number of pages, start page, step, direction to flip</em></p>
                    <form class="template-method-form" method="get">
                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" name="book-name">
                            <label class="mdl-textfield__label" for="book-name">Name of the Book</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" name="number">
                            <label class="mdl-textfield__label" for="body_part">Number Of pages</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" name="start-page">
                            <label class="mdl-textfield__label" for="start-page">Start Page</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" name="step">
                            <label class="mdl-textfield__label" for="step">Step to look</label>
                        </div>
                        <select name="direction">
                            <option value="up">up &#8593</option>
                            <option value="down">down &#8595</option>
                        </select>
                        <button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                            Run Flipping!
                        </button>
                        <?php
                            $name = $_GET['book-name'];
                            $number = $_GET['number'];
                            $start = $_GET['start-page'];
                            $step = $_GET['step'];
                            $direction = $_GET['direction'];
                        ?>
                        <hr>
                        <?php if ($name && $number && $start && $step): ?>
                            <p>Look trought the "<?php echo $name; ?>" Book...</p>
                            <p>All pages: <?php echo $number; ?></p>
                            <p>Start Page: <?php echo $start; ?></p>
                            <p>Step: <?php echo $step; ?></p>
                            <p>Direction: <?php echo $direction; ?></p>
                            <?php
                                $myBook = new Patterns\Behavioral\TemplateMethod\Book($name, $number);
                                $cookTemplate = new Patterns\Behavioral\TemplateMethod\CookBookTemplate();
                                $medicalTemplate = new Patterns\Behavioral\TemplateMethod\MedicalBookTemplate();

                                $pagesToLook = $cookTemplate->FlipTrough($myBook, $start, $step, $direction);
                                echo '<h4>First book template - &#9818</h4>';
                                foreach ($pagesToLook as $simplePage) {
                                    echo $simplePage . " ";
                                }

                                $pagesToLook = $medicalTemplate->FlipTrough($myBook, $start, $step, $direction);
                                echo '<h4>Second book template - &#9819</h4>';
                                foreach ($pagesToLook as $simplePage) {
                                    echo $simplePage . " ";
                                }
                            ?>
                        <?php else: ?>
                            <p>There is no book!  Please load your book!</p>
                        <?php endif; ?>

                    </form>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                       onclick="togglePatternDiagram('template-method', this)">
                        Show/Hide UML Diagram
                    </a>
                </div>
                <div class="mdl-card__menu">
                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">share</i>
                    </button>
                </div>
                <div class="pattern-diagram-wrapper template-method-diagram">
                    <img src="/images/patterns_uml_diagrams/diagram_template-method.png" alt="template-method_uml_diagram" />
                </div>
            </div>

        </div>
        <div class="mdl-cell--2-col"></div>
    </div>
</main>