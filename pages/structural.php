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
                        Just imagine you are going to the 'Bukovel'. You want to know price ranges.
                        We create Hotel Booking class (to know hotel prices), Ski Booking class (to know ski prices)
                        and Ticket Booking class (to know tickets prices). Then in the Facade class we have all this booking
                        systems and get the needed rest according to the situation.
                        In Facade constructor we create all objects we want to use. We can manipulate data rom this objects
                        in the one place.
                    </p>
                    <hr>
                    <?php
                        $skiFacade = new lib\Patterns\Structural\Facade\SkiResortFacade();
                        echo "<p>Price for Good Rest: " . $skiFacade->haveGoodRest(180,65,40,5,5) . "</p>";
                        echo "<p>Price for Rest with own ski: " . $skiFacade->restWithOwnSki(5) . "</p>";
                    ?>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect show-pattern-diagram-btn"
                    onclick="togglePatternDiagram('facade', this)">
                        Show/Hide UML Diagram
                    </a>
                </div>
                <div class="mdl-card__menu">
                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">share</i>
                    </button>
                </div>
                <div class="pattern-diagram-wrapper facade-diagram">
                    <img src="/images/patterns_uml_diagrams/diagram_facade.png" alt="facade_uml_diagram" />
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
                        Here we have a default car class (default toyota). Also we have the main decorator class (CarDecorator).
                        Now imagine you want to make you car police or medical. At first you have to create a default car and then
                        send the this default car to the decorator class. Imagine that in the decorator some people make your car tuning.
                        So you just <strong>WRAP</strong> you car. You can wrapping your car as many times as you want.
                    </p>
                    <hr>
                    <?php
                        echo '<strong>Declaring Toyota (default car):</strong>';
                        $car = new lib\Patterns\Structural\Decorator\Car("Toyota");
                        $car->go();

                        echo '<strong>Declaring Medical Toyota:</strong> <br>';
                        $car = new lib\Patterns\Structural\Decorator\Car("Toyota");
                        $medicalCar = new lib\Patterns\Structural\Decorator\MedicalCar($car);
                        $medicalCar->go();

                        echo '<strong>Declaring Police Toyota:</strong> <br>';
                        $car = new lib\Patterns\Structural\Decorator\Car("Toyota");
                        $policeCar = new lib\Patterns\Structural\Decorator\PoliceCar($car);
                        $policeCar->go();

                        echo '<strong>Declaring Police and Medical Toyota (all in one):</strong> <br>';
                        $car = new lib\Patterns\Structural\Decorator\Car("Toyota");
                        $policeCar = new lib\Patterns\Structural\Decorator\PoliceCar($car);
                        $allInOneCar = new lib\Patterns\Structural\Decorator\MedicalCar($policeCar);
                        $allInOneCar->go();

                    ?>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                       onclick="togglePatternDiagram('decorator', this)">
                        Show/Hide UML Diagram
                    </a>
                </div>
                <div class="mdl-card__menu">
                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">share</i>
                    </button>
                </div>
                <div class="pattern-diagram-wrapper decorator-diagram">
                    <img src="/images/patterns_uml_diagrams/diagram_decorator.png" alt="decorator_uml_diagram" />
                </div>
            </div>

            <div class="lesson-block-card proxy-pattern mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Robot-Defuser Proxy <span class="subtitle">lib/Patterns/Structural/Proxy</span></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <p class="description">
                        Provide a surrogate or placeholder for another object to control access to it.
                    </p>
                    <p class="small-description">
                        Before every move the robot check its connection. He has three attempts to check it.
                        If connection is good the robot move on, else he is BOOM and stops the algorithm. The way to bomb and true
                        wire are generated randomly from array. After all steps to bomb robot tries to
                        defuse the bomb (Cutting random wire). After all steps to the bomb and cutting the
                        true wire the bomb is defused. <br>
                        <strong>RobotDefuserProxy</strong> class controls <strong>RobotDefuser</strong> object.
                    </p>
                    <hr>
                    <div class="half-page-block">
                        <p>Here is the way to bomb: </p>
                        <ol style="font-size: 20px; color: red">
                            <?php
                                $randomWayArray = [];
                                $movesArrowsArray = ['&larr;', '&uarr;', '&rarr;', '&darr;'];
                                for ($i = 0; $i < 5; $i++) {
                                    $randomArrow = array_rand($movesArrowsArray, 1);
                                    $randomWayArray[] = $randomArrow;
                                    echo '<li>'. $movesArrowsArray[$randomArrow] .'</li>';
                                }
                            ?>
                        </ol>
                    </div>
                    <div class="half-page-block">
                        <p>Here is wires for cut: </p>
                        <ol style="font-size: 20px;">
                            <?php
                                $wiresArray = ['yellow', 'black', 'blue', 'green'];
                                $trueWire = array_rand($wiresArray, 1);
                                for ($y = 0; $y < count($wiresArray); $y++) {
                                    if ($trueWire == $y) {
                                        echo '<li style="color: '. $wiresArray[$y] .'">'. $wiresArray[$y] .' -- this is true</li>';
                                    } else {
                                        echo '<li style="color: '. $wiresArray[$y] .'">'. $wiresArray[$y] .'</li>';
                                    }
                                }
                            ?>
                        </ol>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <p>Robot starts his operation:</p>
                    <?php
                        $robot = new lib\Patterns\Structural\Proxy\RobotDefuserProxy(107);
                        for ($t = 0; $t < count($randomWayArray); $t++) {
                            if ($robot->isBoomed) {
                                continue;
                            }
                            echo $t + 1 . ' --- <br>';
                            if ($randomWayArray[$t] == 0) {
                                $robot->turnLeft();
                            } elseif ($randomWayArray[$t] == 1) {
                                $robot->turnUp();
                            } elseif ($randomWayArray[$t] == 2) {
                                $robot->turnRight();
                            } elseif ($randomWayArray[$t] == 3) {
                                $robot->turnDown();
                            } else {
                                $robot->boom();
                            }
                        }

                        if (!$robot->isBoomed) {
                            echo '<p>Robot cuts the wire:</p>';
                            $robot->defusing($trueWire, array_rand($wiresArray, 1));
                        }
                    ?>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                       onclick="togglePatternDiagram('proxy', this)">
                        Show/Hide UML Diagram
                    </a>
                </div>
                <div class="mdl-card__menu">
                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">share</i>
                    </button>
                </div>
                <div class="pattern-diagram-wrapper proxy-diagram">
                    <img src="/images/patterns_uml_diagrams/diagram_proxy.png" alt="proxy_uml_diagram" />
                </div>
            </div>

        </div>
        <div class="mdl-cell--2-col"></div>
    </div>
</main>