<main class="android-content mdl-layout__content">
    <div class="mdl-grid">
        <div class="mdl-cell--2-col"></div>
        <div class="mdl-cell--8-col">
            <div class="page-title-card mo-spender-title-card mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">MoSpender</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <h5>Features</h5>
                    <ul class="features-events-list mdl-list">
                        <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">attach_money</i>
                                Adding money income
                            </span>
                        </li>
                        <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">shopping_basket</i>
                                Adding items you buy to the Big DB.
                            </span>
                        </li>
                        <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">folder</i>
                                All items archive.
                            </span>
                        </li>
                        <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">trending_up</i>
                                Schedules and graphs.
                            </span>
                        </li>
                    </ul>
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

            <!-- Form for adding data from note to DB -->
            <h3><i class="material-icons">cloud_upload</i> Transform items from notes to great DB!</h3>
            <form id="form-to-add-data-from-note">
                <!--Name-->
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" id="spender_item_name">
                    <label class="mdl-textfield__label" for="spender_item_name">Item Name</label>
                </div>

                <!--Price-->
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="spender_item_price">
                    <label class="mdl-textfield__label" for="spender_item_price">Price</label>
                    <span class="mdl-textfield__error">Input is not a number!</span>
                </div>

                <!--Currency radio buttons-->
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="spender_currency_dollar">
                    <input type="radio" id="spender_currency_dollar" class="mdl-radio__button" name="spender_currency" value="USD">
                    <span class="mdl-radio__label">Dollar</span>
                </label>
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="spender_currency_hryvnia">
                    <input type="radio" id="spender_currency_hryvnia" class="mdl-radio__button" name="spender_currency" value="UAH" checked>
                    <span class="mdl-radio__label">Hryvnia</span>
                </label>

                <!--Tags-->
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" id="spender_item_tags">
                    <label class="mdl-textfield__label" for="spender_item_tags">Item Tags</label>
                </div>
                <div class="mdl-tooltip" for="spender_item_tags">
                    Enter the comma (',')<br>separated values
                </div>

                <!--Category-->
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="spender_item_category_joy">
                    <input type="checkbox" id="spender_item_category_joy" class="mdl-checkbox__input" checked>
                    <span class="mdl-checkbox__label">Joy</span>
                </label>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="spender_item_category_food">
                    <input type="checkbox" id="spender_item_category_food" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Food</span>
                </label>

                <!--Day-->
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="spender_item_day">
                    <label class="mdl-textfield__label" for="spender_item_day">Day</label>
                    <span class="mdl-textfield__error">Input is not a number!</span>
                </div>

                <!--Month-->
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="spender_item_month">
                    <label class="mdl-textfield__label" for="spender_item_month">Month</label>
                    <span class="mdl-textfield__error">Input is not a number!</span>
                </div>
            </form>
            <!-- End Form for adiing data -->

            <!-- Archive list -->
            <h3><i class="material-icons">folder</i> Archive!</h3>
            <ul class="money-archive-list mdl-list">
                <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                      <i class="material-icons  mdl-list__item-avatar">timeline</i>
                      2014
                    </span>
                    <span class="mdl-list__item-secondary-action">
                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="archive-checkbox-2014">
                            <input type="checkbox" id="archive-checkbox-2014" class="mdl-switch__input" />
                        </label>
                    </span>
                </li>
                <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                      <i class="material-icons  mdl-list__item-avatar">timeline</i>
                      2015
                    </span>
                    <span class="mdl-list__item-secondary-action">
                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="archive-checkbox-2015">
                            <input type="checkbox" id="archive-checkbox-2015" class="mdl-switch__input" />
                        </label>
                    </span>
                </li>
                <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                      <i class="material-icons  mdl-list__item-avatar">timeline</i>
                      2016
                    </span>
                    <span class="mdl-list__item-secondary-action">
                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="archive-checkbox-2016">
                            <input type="checkbox" id="archive-checkbox-2016" class="mdl-switch__input" />
                        </label>
                    </span>
                </li>
            </ul>
            <!--/end archive list-->

        </div>
        <div class="mdl-cell--2-col"></div>
    </div>
</main>