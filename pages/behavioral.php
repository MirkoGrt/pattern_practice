<?php
    require_once '../patterns/mediator.php';
    require_once '../patterns/templateMethod.php';
?>
<html lang="en">
    <?php require_once '../skeleton/head.php'; ?>
    <body>
        <?php require_once '../skeleton/header.php'; ?>
        <main>
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
            <div class="template-method-pattern lesson-block">
                <h3>Template Method <span>(behavioral)</span><em>/patterns/templateMethod.php</em></h3>
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
                </p>
                <p>Load Your Book: <em>name, number of pages, start page, step, direction to flip</em></p>
                <form method="post">
                    <input type="text" name="book-name" placeholder="Name of the Book">
                    <input type="text" name="number" placeholder="Number Of pages">
                    <input type="text" name="start-page" placeholder="Start Page">
                    <input type="text" name="step" placeholder="Step to look">
                    <select name="direction">
                        <option value="up">up &#8593</option>
                        <option value="down">down &#8595</option>
                    </select>
                    <input type="submit" />
                </form>
                <?php if ($_POST): ?>
                    <?php
                        $name = $_POST['book-name'];
                        $number = $_POST['number'];
                        $start = $_POST['start-page'];
                        $step = $_POST['step'];
                        $direction = $_POST['direction'];
                    ?>
                    <p>Look trought the "<?php echo $name; ?>" Book...</p>
                    <p>All pages: --<?php echo $number; ?>--...</p>
                    <p>Start Page: __<?php echo $start; ?>__...</p>
                    <p>Step: **<?php echo $step; ?>**...</p>
                    <p>Direction: >><?php echo $direction; ?>>>...</p>
                    <?php
                        $myBook = new Book($name, $number);
                        $cooktemplate = new CookBookTemplate();
                        $pagesToLook = $cooktemplate->FlipTrough($myBook, $start, $step, $direction);
                        foreach ($pagesToLook as $simplePage) {
                            echo $simplePage . " ";
                        }
                    ?>
                <?php endif; ?>
            </div>
        </main>
        <?php require_once '../skeleton/footer.php'; ?>
    </body>
</html>