<!doctype html>
<?php
    require_once '../patterns/facade.php';
    require_once '../patterns/decorator.php';
?>
<html lang="en">
    <?php require_once '../skeleton/head.php'; ?>
    <body>
        <?php require_once '../skeleton/header.php'; ?>
        <main class="android-content mdl-layout__content">
            <h1>Structural patterns</h1>
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
            <div class="facade-pattern lesson-block">
                <h3>Car Decorator <span>(structural)</span><em>/patterns/decorator.php</em></h3>
                <p class="description">
                    Attach additional responsibilities to an object dynamically. Decorator provides
                    a flexible alternative to subclassing for extending functionality.
                </p>
                <p class="small-description">
                    Here we have a  object car. Car can change its model due to decorator class. In our example
                    its two decorators entity. (?)(?)
                </p>
                <?php
                    $mers = new Car("Toyota");
                    $carDecorator = new CarDecorator($mers);
                    $police = new PoliceCar($carDecorator);
                    $medical = new MedicalCar($carDecorator);
                    $police->policeModel();
                    $carDecorator->showModel();
                    $medical->medicalModel();
                    $carDecorator->showModel();
                ?>
            </div>
        </main>
        <?php require_once '../skeleton/footer.php'; ?>
    </body>
</html>