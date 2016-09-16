<main class="android-content mdl-layout__content">
    <div class="mdl-grid">
        <div class="mdl-cell--2-col"></div>
        <div class="mdl-cell--8-col">
            <div class="mdl-grid">
                <?php if ($_SESSION['logged_user']): ?>
                    <h3>You are already here!</h3>
                <?php else: ?>
                    <div class="mdl-cell--6-col">
                        <div class="login-page-card mdl-card mdl-shadow--2dp">
                            <div class="mdl-card__title">
                                <h2 class="mdl-card__title-text">Login!</h2>
                            </div>
                            <div class="mdl-card__supporting-text">
                                <form id="auth-page-login-form">
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <input class="mdl-textfield__input" type="email" name="auth_login_email" id="auth-login-email">
                                        <label class="mdl-textfield__label" for="auth-login-email">Email</label>
                                        <span class="mdl-textfield__error"></span>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <input class="mdl-textfield__input" type="password" name="auth_login_password" id="auth-login-pass">
                                        <label class="mdl-textfield__label" for="auth-login-pass">Password</label>
                                        <span class="mdl-textfield__error"></span>
                                    </div>
                                    <div id="user-login-progress" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div>
                                    <br>
                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                        Login
                                    </button>
                                </form>
                            </div>
                            <div class="mdl-card__actions mdl-card--border">

                            </div>
                            <div class="mdl-card__menu">
                                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                    <i class="material-icons">share</i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="mdl-cell--6-col">
                        <div class="login-page-card mdl-card mdl-shadow--2dp">
                            <div class="mdl-card__title">
                                <h2 class="mdl-card__title-text">Register!</h2>
                            </div>
                            <div class="mdl-card__supporting-text">
                                <form id="auth-page-register-form">
                                    <p>Registration is disabled at the moment..</p>
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <input class="mdl-textfield__input" name="auth_register_email" type="email" id="auth-register-email">
                                        <label class="mdl-textfield__label" for="auth-register-email">Email</label>
                                        <span class="mdl-textfield__error"></span>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <input class="mdl-textfield__input" name="auth_register_nickname" type="text" id="auth-register-nickname">
                                        <label class="mdl-textfield__label" for="auth-register-nickname">Nickname</label>
                                        <span class="mdl-textfield__error"></span>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <textarea class="mdl-textfield__input" name="auth_register_slogan" id="auth-register-slogan"></textarea>
                                        <label class="mdl-textfield__label" for="auth-register-slogan">Slogan</label>
                                        <span class="mdl-textfield__error"></span>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <input class="mdl-textfield__input" name="auth_register_pass" type="password" id="auth-register-pass">
                                        <label class="mdl-textfield__label" for="auth-register-pass">Password</label>
                                        <span class="mdl-textfield__error"></span>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <input class="mdl-textfield__input" name="auth_register_confirm_pass" type="password" id="auth-register-confirm-pass">
                                        <label class="mdl-textfield__label" for="auth-register-confirm-pass">Confirm Pass</label>
                                        <span class="mdl-textfield__error"></span>
                                    </div>
                                    <div id="user-registration-progress" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div>
                                    <br>
                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" disabled>
                                        Register
                                    </button>
                                </form>
                            </div>

                            <div class="mdl-card__actions mdl-card--border">

                            </div>

                            <div class="mdl-card__menu">
                                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                    <i class="material-icons">share</i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div id="auth-page-snackbar" class="mdl-js-snackbar mdl-snackbar">
                <div class="mdl-snackbar__text"></div>
                <button class="mdl-snackbar__action" type="button">button</button>
            </div>

            <!--JAVASCRIPT FUNCTIONS-->
            <script src="/js/auth/authPageFunctions.js"></script>

            <!-- End JavaScript -->

        </div>
        <div class="mdl-cell--2-col"></div>
    </div>
</main>