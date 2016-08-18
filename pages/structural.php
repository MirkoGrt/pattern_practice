<?php
    use lib\Patterns\Structural\Composite;
    use lib\Patterns\Structural\Facade;
    use lib\Patterns\Structural\Decorator;
    use lib\Patterns\Structural\Proxy;
    use lib\Patterns\Structural\Flyweight;
?>

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

            <div class="lesson-block-card flyweight-pattern mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Text Flyweight <span class="subtitle">lib/Patterns/Structural/Flyweight</span></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <p class="description">
                        Use sharing to support large numbers of fine-grained objects efficiently.
                    </p>
                    <p class="small-description">
                        Here we have the simple sample of this pattern. We have "CharacterFactory" class, abstract
                        "Character" class and character classes like "CharacterA" or "CharacterB". So what is the
                        "CharacterFactory" class? We use this class to put objects into array. <br> This way some object will
                        be stored in the array for next use. Here we have just letters. But in the array or another "storage"
                        may be some big objects or pictures. <br> This pattern allow us to create some thing once and then use it
                        many times without creating again. <br>
                        We defined only 4 classes for letters. So when you'll write some text you'll see that only
                        <strong>a,b,c,d</strong> are taken from our "array-storage". But this is only the sample.
                    </p>
                    <hr>
                    <form method="get" id="flyweight-icons-form">

                        <div class="mdl-textfield mdl-js-textfield">
                            <textarea class="mdl-textfield__input" type="text" rows= "3" name="text-for-flyweight-generator" id="flyweight-text-input" ></textarea>
                            <label class="mdl-textfield__label" for="flyweight-text-input">Enter some text!!!</label>
                        </div>
                        <br>

                        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised">
                            Run text generator!
                        </button>
                    </form>
                    <hr>

                    <?php
                        if ($_GET['text-for-flyweight-generator']) {
                            $text = strtolower(str_replace(' ', '', $_GET['text-for-flyweight-generator']));
                            $textArray = str_split($text);
                            
                            $characterFactory = new Flyweight\CharacterFactory();

                            foreach ($textArray as $letter) {
                                $character = $characterFactory->getCharacter($letter);

                                if (method_exists($character,'display')) {
                                    $character->display();
                                }
                            }

                            echo "<h4>All characters objects in factory (in accordance to text):</h4>";
                            $characterFactory->displayAllFactoryCharacters();
                        }
                    ?>

                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                       onclick="togglePatternDiagram('flyweight', this)">
                        Show/Hide UML Diagram
                    </a>
                </div>
                <div class="mdl-card__menu">
                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">share</i>
                    </button>
                </div>
                <div class="pattern-diagram-wrapper flyweight-diagram">
                    <img src="/images/patterns_uml_diagrams/diagram_flyweight.png" alt="flyweight_uml_diagram" />
                </div>
            </div>

            <div class="lesson-block-card composite-pattern mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Country Composite <span class="subtitle">lib/Patterns/Structural/Composite</span></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <p class="description">
                        Compose objects into tree structures to represent part-whole hierarchies. Composite
                        lets clients treat individual objects and compositions of objects uniformly
                    </p>
                    <p class="small-description">
                        Lets create the country. Enter the country name, add regions and cities. You'll see the
                        country structure in classes. We have "Country", "Region" and "City" classes to do this.
                        We just put city into region and region with this city into country.
                    </p>
                    <hr>

                    <script src="/js/structuralPatterns/compositePatternFunctions.js"></script>

                    <button class="mdl-button mdl-js-button mdl-button--accent" onclick="generateCompositeInput('country')">
                        Add Country!
                    </button>
                    <button class="mdl-button mdl-js-button mdl-button--accent" onclick="generateCompositeInput('region')">
                        Add Region!
                    </button>
                    <button class="mdl-button mdl-js-button mdl-button--accent" onclick="generateCompositeInput('city')">
                        Add City!
                    </button>
                    <form method="get" id="country-composite-form">

                        <div class="clearfix"></div>
                        <hr>
                        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised">
                            Compose Country!
                        </button>
                    </form>

                    <?php
                        if ($_GET) {
                            foreach ($_GET as $key => $value) {
                                list($type, $id) = explode('-', $key, 2);
                                if ($type == 'country') {
                                    $country = new Composite\CountryComponent($value);
                                } else if ($type == 'region') {
                                    $region = new Composite\RegionComponent($value);
                                    $country->add($region);
                                } else if ($type == 'city') {
                                    $city = new Composite\CityComponent($value);
                                    $region->add($city);
                                } else {
                                    $country = new Composite\CountryComponent('default Country');
                                    $region = new Composite\RegionComponent('default Region');
                                    $city = new Composite\CityComponent('default City');
                                }
                            }
                            $country->display();
                        }
                    ?>

                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                       onclick="togglePatternDiagram('composite', this)">
                        Show/Hide UML Diagram
                    </a>
                </div>
                <div class="mdl-card__menu">
                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">share</i>
                    </button>
                </div>
                <div class="pattern-diagram-wrapper composite-diagram">
                    <img src="/images/patterns_uml_diagrams/diagram_composite.png" alt="composite_uml_diagram" />
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
                        $skiFacade = new Facade\SkiResortFacade();
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
                        $car = new Decorator\Car("Toyota");
                        $car->go();

                        echo '<strong>Declaring Medical Toyota:</strong> <br>';
                        $car = new Decorator\Car("Toyota");
                        $medicalCar = new Decorator\MedicalCar($car);
                        $medicalCar->go();

                        echo '<strong>Declaring Police Toyota:</strong> <br>';
                        $car = new Decorator\Car("Toyota");
                        $policeCar = new Decorator\PoliceCar($car);
                        $policeCar->go();

                        echo '<strong>Declaring Police and Medical Toyota (all in one):</strong> <br>';
                        $car = new Decorator\Car("Toyota");
                        $policeCar = new Decorator\PoliceCar($car);
                        $allInOneCar = new Decorator\MedicalCar($policeCar);
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
                        $robot = new Proxy\RobotDefuserProxy(107);
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