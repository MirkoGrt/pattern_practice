<!doctype html>
<html lang="en">
    <?php require_once '../skeleton/head.php'; ?>
    <body>
        <?php require_once '../skeleton/header.php'; ?>
        <main class="android-content mdl-layout__content">
            <h1>JS Page</h1>
            <div class="js-caesar-cipher lesson-block">
                <h3>JS Caesar Cipher Developing <span></span><em></em></h3>
                <p class="description">
                    There is the simplest cipher.
                    <a href="https://www.khanacademy.org/computing/computer-science/cryptography/ciphers/a/shift-cipher">More ...</a>
                </p>
                <p class="small-description">
                    1) There we have the array with all English letters. <br>
                    2) Then we assign new object like "LETTER" => "NUMBER". <br>
                    3) The next step is to transform message to array with numbers from the alphabet order. <br>
                    4) Then we need to add key value to every number letter in our message array and get
                    absolute value by MOD 26 in our case<br>
                    5) Getting encrypted message. Transform numeric encrypted message to letters array. <br>
                </p>
                <form class="caesar-chiper-form">
                    <input type="text" name="message-to-encrypt" placeholder="enter the message">
                    <input type="number" name="key-to-encrypt" placeholder="enter the key">
                    <input type="submit" class="btn-encrypt">
                    <input type="text" name="encrypted-message">
                </form>
                <script type="text/javascript">

                    var alphabet = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];

                    $('.caesar-chiper-form').on('submit', function (e) {
                        e.preventDefault();

                        var keyToEncrypt = Number($('input[name="key-to-encrypt"]').val());
                        var message =  $('input[name="message-to-encrypt"]').val().replace(/\s+/g, '');

                        /* Making numeric alphabet like LETTER => NUMBER */
                        var alphabetNumeric = new Object();
                        for (var $i = 0; $i < alphabet.length; $i++) {
                            var letter = alphabet[$i];
                            alphabetNumeric[letter] = $i;
                        }

                        /* Transform message to array with NUMBERs */
                        var messageNumeric = new Array();
                        for (var $j = 0; $j < message.length; $j++) {
                            var messageLetter = message[$j];
                            messageNumeric[$j] = alphabetNumeric[messageLetter];
                        }

                        /* Making array with message numeric values + key */
                        var encryptedMessageNumeric = new Array();
                        for (var $k = 0; $k < messageNumeric.length; $k++) {
                            encryptedMessageNumeric[$k] = (messageNumeric[$k] + keyToEncrypt) % alphabet.length;
                        }

                        /* Getting encrypted message. Transform numeric encrypted message to letters array */
                        var encryptedMessage = new Array();
                        for (var $m = 0; $m < encryptedMessageNumeric.length; $m++) {
                            for (var key in alphabetNumeric) {
                                if (encryptedMessageNumeric[$m] == alphabetNumeric[key]) {
                                    encryptedMessage[$m] = key;
                                }
                            }
                        }
                        var stringWithoutComma = encryptedMessage.toString().replace(/,/g, '');

                        $('input[name="encrypted-message"]').val(stringWithoutComma);
                    });
                </script>
            </div>
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
            <div class="js-type-juggling lesson-block">
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
                    We include "Processing.js" to draw some features. To be continued...
                </p>
                <canvas id="canvas1" width="100" height="100"></canvas>
                <canvas id="canvas2" width="400" height="400"></canvas>

                <script id="script1" type="text/javascript">
                    function sketchProc(processing) {
                        processing.ellipse(56, 46, 55, 55);
                    }
                    function draw(processing) {
                        processing.rect(10, 20, 100, 200);
                    }

                    var canvas = document.getElementById("canvas1");
                    var canvas2 = document.getElementById("canvas2");
                    var p = new Processing(canvas, sketchProc);
                    var d = new Processing(canvas2, draw);

                </script>
            </div>
            <div class="js-simple-animation lesson-block">
                <h3>JS Simple Animation <span></span><em></em></h3>
                <p class="description">
                    Here we follow the tutorial on Khan Academy about JS Animation.
                </p>
                <p class="small-description">
                    We have the .gif picture and change it left position to move right. <strong>We use the date to
                    compute distance instead of interval</strong>. If the picture is near right window
                    border we move it to left and so on.
                </p>
                <div class="animated-image" id="banana_wrapper" >
                    <img id="banana_dance" src="../banana.gif" alt="Dancing Banana">
                </div>
                <button id="start_dance" onclick="walk()">Start Walking</button>
                <script type="text/javascript">

                    var banana = document.getElementById("banana_dance");
                    var bananaWrapper = document.getElementById("banana_wrapper");
                    var stopPosition = bananaWrapper.offsetWidth - banana.offsetWidth;

                    var walk = function () {
                        var start;
                        function right () {
                            var current = new Date().getTime();
                            var secondsElapsed = ((current - start) / 1000);
                            var newLeft = secondsElapsed * 200;

                            if (newLeft < stopPosition) {
                                banana.style.left = newLeft + "px";
                                window.requestAnimationFrame(right);
                            } else {
                                start = new Date().getTime();
                                left();
                            }
                        }

                        function left () {
                            var current = new Date().getTime();
                            var secondsElapsed = ((start - current) / 1000);
                            var newLeft = secondsElapsed * 200;
                            var absoluteLeft = Math.abs(newLeft);
                            if (absoluteLeft < stopPosition) {
                                banana.style.left = stopPosition + newLeft + "px";
                                window.requestAnimationFrame(left);
                            } else {
                                start = new Date().getTime();
                                right();
                            }
                        }
                        left();
                    }
                </script>
            </div>
            <div class="js-merge-sorting lesson-block">
                <h3>JS Merge Sorting <span></span><em></em></h3>
                <p class="description">
                    Merge sorting are dividing array into sub-arrays, until sub-array will have one element.
                    Then merge function merged this subarray into one.
                    <a href="https://www.khanacademy.org/computing/computer-science/algorithms/merge-sort/a/overview-of-merge-sort">More ...</a>
                </p>
                <p class="small-description">
                    In our case there is an array with 8 values. Function "mergeSort" are dividing this array
                    until its length >= 1. We recursively call this function to divide. For each dividing step
                    sub-array are sorted and merged in "merge" function.
                </p>
                <p class="merged"></p>
                <script type="text/javascript">
                    var merge = function(array, p, q, r) {
                        var lowHalf = [];
                        var highHalf = [];

                        var k = p;
                        var i;
                        var j;
                        for (i = 0; k <= q; i++, k++) {
                            lowHalf[i] = array[k];
                        }
                        for (j = 0; k <= r; j++, k++) {
                            highHalf[j] = array[k];
                        }

                        k = p;
                        i = 0;
                        j = 0;

                        // Repeatedly compare the lowest untaken element in
                        //  lowHalf with the lowest untaken element in highHalf
                        //  and copy the lower of the two back into array
                        while (i < lowHalf.length && j < highHalf.length) {
                            if (lowHalf[i] < highHalf[j]) {
                                array[k] = lowHalf[i];
                                i ++;
                            } else {
                                array[k] = highHalf[j];
                                j ++;
                            }
                            k ++;
                        }
                        // Once one of lowHalf and highHalf has been fully copied
                        //  back into array, copy the remaining elements from the
                        //  other temporary array back into the array
                        while (i < lowHalf.length) {
                            array[k] = lowHalf[i];
                            k++;
                            i++;
                        }
                        while (j < highHalf.length) {
                            array[k] = highHalf[j];
                            k++;
                            j++;
                        }
                    };

                    // Takes in an array and recursively merge sorts it
                    var mergeSort = function(array, p, r) {
                        if (r - p >= 1) {
                            var middle = p + Math.floor((r - p) / 2);
                            mergeSort(array, p, middle);
                            mergeSort(array, middle + 1, r);
                            merge(array, p, middle, r);
                        }
                    };
                    var array = [14, 7, 3, 12, 9, 11, 6, 2];
                    arrayToDiv(array, $('.merged'));
                    mergeSort(array, 0, array.length - 1);
                    arrayToDiv(array, $('.merged'));
                </script>
            </div>
        </main>
        <?php require_once '../skeleton/footer.php'; ?>
    </body>
</html>