<?php
    require_once '../patterns/facade.php';
?>
<html lang="en">
    <?php require_once '../skeleton/head.php'; ?>
    <body>
        <?php require_once '../skeleton/header.php'; ?>
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
        </main>
        <?php require_once '../skeleton/footer.php'; ?>
    </body>
</html>