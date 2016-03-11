<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
        <span class="android-title mdl-layout-title">
            <img class="android-logo-image" src="../images/android-logo.png">
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
            <div class="android-navigation-container">
                <nav class="android-navigation mdl-navigation">
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="main.php">Main</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="js.php">JS</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="php.php">PHP</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="sql.php">SQL</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="calendar.php">Calendar</a>
                </nav>
            </div>
          <span class="android-mobile-title mdl-layout-title">
            <img class="android-logo-image" src="../images/android-logo.png">
          </span>
            <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
                <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
                <li class="mdl-menu__item">Stuff</li>
                <li class="mdl-menu__item">Stuff</li>
                <li disabled class="mdl-menu__item">Stuff</li>
                <li class="mdl-menu__item">Stuff</li>
            </ul>
        </div>
    </header>
    <div class="android-drawer mdl-layout__drawer">
        <span class="mdl-layout-title">
          <img class="android-logo-image" src="../images/android-logo-white.png">
        </span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="behavioral.php">Behavioral</a>
            <a class="mdl-navigation__link" href="structural.php">Structural</a>
            <a class="mdl-navigation__link" href="creational.php">Creational</a>
            <div class="android-drawer-separator"></div>
            <span class="mdl-navigation__link" href="">Stuff</span>
            <a class="mdl-navigation__link" href="">Stuff</a>
            <a class="mdl-navigation__link" href="">Stuff</a>
        </nav>
    </div>

