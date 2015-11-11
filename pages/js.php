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
        </main>
        <?php require_once '../skeleton/footer.php'; ?>
    </body>
</html>