<html lang="en">
    <?php require_once '../skeleton/head.php'; ?>
    <body>
        <?php require_once '../skeleton/header.php'; ?>
        <main>
            <h1>JS Page</h1>
            <div class="js-prototype lesson-block">
                <h3>JS Prototype <span></span><em>../main.js -> function person</em></h3>
                <p class="description">
                    Every JavaScript object has a prototype. The prototype is also an object.
                    All JavaScript objects inherit their properties and methods from their prototype. (c) W3School
                </p>
                <p class="small-description">
                    Bellow we have created a simple constructor. Then we have created the object and add
                    more properties  and methods to this object. "addSecondName" is the function. It is not run because
                    it is the dump. But it works. You can add new properties to object without prototype, but if
                    you want to add property to the constructor you need to use
                    <strong>"constructor.prototype.property = value".</strong> In our case it will be
                    <strong>"person.prototype.hasBrothers = true".</strong>
                </p>
                <p class="person"></p>
                <script type="text/javascript">
                    var Person1 = new person('Lily', 23, 'blue');
                    Person1.nationality = "UK";
                    Person1.isMerried = false;
                    Person1.addSecondName = function () {
                        return this.name + ' ' + 'Bla-Bla-Bla';
                    };
                    person.prototype.hasBrothers = true;
                    var dump = dump(Person1);
                    $('.person').append(dump);
                </script>
            </div>
            <div class="js-prototype lesson-block">
                <h3>JS Type Juggling <span></span><em></em></h3>
                <p class="description">
                    <strong>String(x), x.toString()</strong> - return number as a string. Can convert boolean.
                    <a href="http://www.w3schools.com/js/js_type_conversion.asp" title="W3Scholl (c)" target="_blank">More . . .</a> <br />
                </p>
                <p class="small-description">
                    First we have created the "var x = 1000;" Than convert it to string using "String(x)".
                    Second we have created the "var z = false;" and convert it to string.
                </p>
                <p class="juggling"></p>
                <script type="text/javascript">
                    var x = 1000;
                    var type = typeof x;
                    $('.juggling').append(x,' - ', type, '<br />');

                    var y = String(x);
                    type = typeof y;
                    $('.juggling').append(x,' - ', type, '<br />');

                    var z = false;
                    type = typeof z;
                    $('.juggling').append('false',' - ', type, '<br />');

                    var c = String(z);
                    type = typeof c;
                    $('.juggling').append('false',' - ', type, '<br />');
                </script>
            </div>
            <div class="js-drawing lesson-block">
                <h3>JS Drawing <span></span><em></em></h3>
                <p class="description">

                </p>
                <p class="small-description">

                </p>
                <canvas id="canvas1" width="200" height="200"></canvas>

                <script id="script1" type="text/javascript">
                    function sketchProc(processing) {
                        processing.ellipse(56, 46, 55, 55);
                    }

                    var canvas = document.getElementById("canvas1");
                    var p = new Processing(canvas, sketchProc);
                </script>
            </div>
        </main>
        <?php require_once '../skeleton/footer.php'; ?>
    </body>
</html>