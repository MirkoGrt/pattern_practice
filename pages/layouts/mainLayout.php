<?php
/* 
 * 	GOOD LUCK WITH CODDING!
 * 	Author Mirko.
 * 	Visit the site: http://4gift.in.ua/
 * 	
 * 	
 * 	Project: pattern_practice
 * 
 * 	File name: mainLayout.php | Created: 30.03.16 , 10:49
 */

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ANGRY PRACTICE</title>
    <link rel="shortcut icon" href="/images/bird.png" />

    <!--JS Libs-->
    <script type="text/javascript" src="/js/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="/js/processing.js"></script>

    <!--Custom JS-->
    <script type="text/javascript" src="/js/main.js"></script>

    <!--MDL-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.brown-orange.min.css">
    <script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>

    <!--Android Template styles-->
    <link rel="stylesheet" href="/styles/android-template-styles.css">

    <!--Custom Styles-->
    <link rel="stylesheet" href="/styles/style.css" />
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
        <span class="android-title mdl-layout-title">
            <img class="android-logo-image" src="/images/angry_practice_logo.png">
        </span>
            <!-- Add spacer, to align navigation to the right in desktop -->
            <div class="android-header-spacer mdl-layout-spacer"></div>
            <div class="android-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="search-field">
                </div>
            </div>
            <!-- Navigation -->
            <?php $loggedUser = $_SESSION['logged_user']; ?>
            <?php if ($loggedUser): ?>
                <div class="header__user-icon">
                    <span class="mdl-chip mdl-chip--contact mdl-chip--deletable">
                        <img class="mdl-chip__contact" src="/images/logo.png" />
                        <span class="mdl-chip__text">Hi, <?php echo $loggedUser['nickname']?></span>
                        <a title="Logout" onclick="logout()" class="mdl-chip__action"><i class="material-icons">directions_run</i></a>
                    </span>
                </div>
                <div class="android-navigation-container">
                    <nav class="android-navigation mdl-navigation">
                        <a class="mdl-navigation__link mdl-typography--text-uppercase" href="/main-page">Main</a>
                        <a class="mdl-navigation__link mdl-typography--text-uppercase" href="/js-page">JS</a>
                        <a class="mdl-navigation__link mdl-typography--text-uppercase" href="/calendar">MoCalendar</a>
                        <a class="mdl-navigation__link mdl-typography--text-uppercase" href="/mo-spender">MoSpender</a>
                    </nav>
                </div>
            <?php else: ?>
                <div class="android-navigation-container">
                    <nav class="android-navigation mdl-navigation">
                        <a class="mdl-navigation__link mdl-typography--text-uppercase" href="/auth">Login</a>
                    </nav>
                </div>
            <?php endif; ?>

          <span class="android-mobile-title mdl-layout-title">
            <img class="android-logo-image" src="/images/logo_small.png">
          </span>
            <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
                <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">

                <li disabled class="mdl-menu__item">Stuff</li>
                <li class="mdl-menu__item" onclick="logout()">Logout</li>
            </ul>
        </div>
    </header>
    <div class="android-drawer mdl-layout__drawer">
        <span class="mdl-layout-title">
          <img class="android-logo-image" src="/images/logo.png">
        </span>
        <?php if ($loggedUser): ?>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="/behavioral-patterns">Behavioral</a>
                <a class="mdl-navigation__link" href="/structural-patterns">Structural</a>
                <a class="mdl-navigation__link" href="/creational-patterns">Creational</a>
                <div class="android-drawer-separator"></div>
                <a class="mdl-navigation__link" href="/auth">My account</a>
                <a class="mdl-navigation__link" href="">Stuff</a>
                <a class="mdl-navigation__link" href="">Stuff</a>
            </nav>
        <?php else: ?>
            <p>Please <a href="/auth">Login</a> to see site content.</p>
        <?php endif; ?>
    </div>

    <?php
        echo $content;
    ?>

    <footer>
        <script type="text/javascript" src="/js/jquery.validate.js"></script>
    </footer>
</div><!--/.mdl-layout .mdl-js-layout .mdl-layout--fixed-header-->

</body>
</html>
