<main class="android-content mdl-layout__content">
    <div class="mdl-grid">
        <div class="mdl-cell--2-col"></div>
        <div class="mdl-cell--8-col">
            <div class="page-title-card structural-page-title-card mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Structural patterns Page</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    Structural Patterns implementations
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

            <div class="lesson-block-card facade-pattern mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Ski Facade <span class="subtitle">lib/Patterns/Structural/Facade</span></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <p class="description">
                        Provide a unified interface to a set of interfaces in a subsystem.
                        Facade defines a higher-level interface that makes the subsystem easier to use.
                    </p>
                    <p class="small-description">
                        Just imagine you are going to the Bukovel. You want to know price ranges.
                    </p>
                    <hr>
                    <?php
                        $skiFacade = new Patterns\Structural\Facade\SkiResortFacade();
                        echo "<p>Price for Good Rest: " . $skiFacade->haveGoodRest(180,65,40,5,5) . "</p>";
                        echo "<p>Price for Rest with own ski: " . $skiFacade->restWithOwnSki(5) . "</p>";
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

            <div class="lesson-block-card decorator-pattern mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Car Decorator <span class="subtitle">lib/Patterns/Structural/Decorator</span></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <p class="description">
                        Attach additional responsibilities to an object dynamically. Decorator provides
                        a flexible alternative to subclassing for extending functionality.
                    </p>
                    <p class="small-description">
                        Here we have a  object car. Car can change its model due to decorator class. In our example
                        its two decorators entity. (?)(?)
                    </p>
                    <hr>
                    <?php
                        $mers = new Patterns\Structural\Decorator\Car("Toyota");
                        $carDecorator = new Patterns\Structural\Decorator\CarDecorator($mers);
                        $police = new Patterns\Structural\Decorator\PoliceCar($carDecorator);
                        $medical = new Patterns\Structural\Decorator\MedicalCar($carDecorator);
                        $police->policeModel();
                        $carDecorator->showModel();
                        $medical->medicalModel();
                        $carDecorator->showModel();
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