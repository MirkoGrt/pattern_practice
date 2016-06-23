<?php

?>
<main class="android-content mdl-layout__content">
    <div class="mdl-grid">
        <div class="mdl-cell--2-col"></div>
        <div class="mdl-cell--8-col">
            <div class="page-title-card mo-spender-title-card mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">MoSpender</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <p>
                        To make it works just create the empty BD and connect it in the
                        <strong>lib/Pages/MoSpenderController/getDataBase()</strong> method
                    </p>
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
                    <h5>Attention!</h5>
                    <ul class='mospender-info-list mdl-list'>
                        <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">info</i>
                                One item ore one money income can has only one category!
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

            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                <div class="mdl-tabs__tab-bar">
                    <a href="#transform-form-panel" class="mdl-tabs__tab is-active"><i class="material-icons">shopping_basket</i> Transform Form</a>
                    <a href="#money-income-panel" class="mdl-tabs__tab"><i class="material-icons">attach_money</i> Money Income</a>
                    <a href="#archive-panel" class="mdl-tabs__tab"><i class="material-icons">folder</i> Archive!</a>
                </div><!--/.mdl-tabs__tab-bar-->

                <div class="mdl-tabs__panel is-active" id="transform-form-panel">
                    <h4>Add your items from text notes to great DB!</h4>
                    <!-- Form for adding data from note to DB -->
                    <form id="form-to-add-data-from-note">
                        <!--Name-->
                        <div class="spender_item_name_wrapper">
                            <div class="mdl-textfield mdl-js-textfield ">
                                <input class="mdl-textfield__input" name="Name" type="text" id="spender_item_name">
                                <label class="mdl-textfield__label" for="spender_item_name">Item Name</label>
                                <span class="mdl-textfield__error"></span>
                            </div>
                        </div>

                        <!--Price-->
                        <div class="spender_item_price_wrapper">
                            <div class="mdl-textfield mdl-js-textfield ">
                                <input class="mdl-textfield__input" type="text" name="Price" pattern="-?[0-9]*(\.[0-9]+)?" id="spender_item_price">
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
                        </div>

                        <!--Tags-->
                        <div class="spender_item_tags_wrapper">
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" name="Tags" type="text" id="spender_item_tags">
                                <label class="mdl-textfield__label" for="spender_item_tags">Item Tags</label>
                            </div>
                            <div class="mdl-tooltip" for="spender_item_tags">
                                Enter the comma (',')<br>separated values
                            </div>
                        </div>

                        <!--Category-->
                        <?php
                            $allCategories = $variables["allCategories"];
                            $categoriesQuantity = count($allCategories);
                        ?>
                        <div class="spender_item_category_wrapper">
                            <?php
                                if ($categoriesQuantity > 0):
                            ?>
                                <?php $i = 1; foreach ($allCategories as $category): ?>
                                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="spender_item_category_<?php echo $category['id']; ?>">
                                        <input type="checkbox"
                                           id="spender_item_category_<?php echo $category['id']; ?>"
                                           name="spender_item_category"
                                           class="mdl-checkbox__input spender_item_category"
                                           onclick="selectOnlyThis(this, 'spender_item')"
                                           value="<?php echo $category['name']; ?>"
                                        >
                                        <span class="mdl-checkbox__label"><?php echo $category['name']; ?></span>

                                        <!-- Show field for error message only in the end of category list -->
                                        <?php if ($i == $categoriesQuantity): ?>
                                            <span class="mdl-textfield__error"></span>
                                        <?php endif; ?>
                                    </label>
                                <?php $i++; endforeach; ?>
                            <?php endif; ?>

                            <!--/.New category-->
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" name="New_Category" type="text" onchange="uncheckCheckboxes('spender_item')" id="spender_item_new_category">
                                <label class="mdl-textfield__label" for="spender_item_new_category">New Category</label>
                            </div>
                            <div class="mdl-tooltip" for="spender_item_new_category">
                                Enter the new category name<br>if there is no one
                            </div>
                        </div><!--/.spender_item_category_wrapper-->

                        <div class="spender_item_date_wrapper">
                            <!--Day-->
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" name="Day" pattern="-?[0-9]*(\.[0-9]+)?" id="spender_item_day">
                                <label class="mdl-textfield__label" for="spender_item_day">Day</label>
                                <span class="mdl-textfield__error">Input is not a number!</span>
                            </div>

                            <!--Month-->
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" name="Month" pattern="-?[0-9]*(\.[0-9]+)?" id="spender_item_month">
                                <label class="mdl-textfield__label" for="spender_item_month">Month</label>
                                <span class="mdl-textfield__error">Input is not a number!</span>
                            </div>

                            <!-- Year -->
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" name="Year" pattern="-?[0-9]*(\.[0-9]+)?" id="spender_item_year">
                                <label class="mdl-textfield__label" for="spender_item_year">Year</label>
                                <span class="mdl-textfield__error">Input is not a number!</span>
                            </div>
                        </div>

                        <div id="sender-item-adding-progress" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div>
                        <br>
                    </form>
                    <br>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
                            onclick="addSpenderItemToDB()">
                        Add MoSpender Item!
                    </button>
                    <!-- End Form for adiing data -->
                </div>

                <div class="mdl-tabs__panel" id="money-income-panel">
                    <h4>Money income!</h4>
                    <form id="form-to-add-money-income">

                        <div class="money_income_reason_wrapper">
                            <div class="mdl-textfield mdl-js-textfield ">
                                <input class="mdl-textfield__input" type="text" name="Reason" id="money_income_reason">
                                <label class="mdl-textfield__label" for="money_income_name">Money income reason</label>
                                <span class="mdl-textfield__error"></span>
                            </div>
                        </div><!--/.money_income_name_wrapper-->

                        <!-- Quantity -->
                        <div class="money_income_quantity_wrapper">
                            <div class="mdl-textfield mdl-js-textfield ">
                                <input class="mdl-textfield__input" type="text" name="Quantity" pattern="-?[0-9]*(\.[0-9]+)?" id="money_income_quantity">
                                <label class="mdl-textfield__label" for="money_income_quantity">Quantity</label>
                                <span class="mdl-textfield__error">Input is not a number!</span>
                            </div>

                            <!--Currency radio buttons-->
                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="money_quantity_currency_dollar">
                                <input type="radio" id="money_quantity_currency_dollar" class="mdl-radio__button" name="money_quantity_currency" value="USD">
                                <span class="mdl-radio__label">Dollar</span>
                            </label>
                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="money_quantity_currency_hryvnia">
                                <input type="radio" id="money_quantity_currency_hryvnia" class="mdl-radio__button" name="money_quantity_currency" value="UAH" checked>
                                <span class="mdl-radio__label">Hryvnia</span>
                            </label>
                        </div><!--/.money_income_quantity_wrapper-->

                        <div class="money_income_category_wrapper">

                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="money_income_category_1">
                                <input type="checkbox" id="money_income_category_1" class="mdl-checkbox__input money_income_category" onclick="selectOnlyThis(this, 'money_income')" name="money_income_category" value="1">
                                <span class="mdl-checkbox__label">One</span>
                            </label>
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="money_income_category_2">
                                <input type="checkbox" id="money_income_category_2" class="mdl-checkbox__input money_income_category" onclick="selectOnlyThis(this, 'money_income')" name="money_income_category" value="2">
                                <span class="mdl-checkbox__label">Two</span>
                            </label>
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="money_income_category_3">
                                <input type="checkbox" id="money_income_category_3" class="mdl-checkbox__input money_income_category" onclick="selectOnlyThis(this, 'money_income')" name="money_income_category" value="3">
                                <span class="mdl-checkbox__label">Three</span>
                                <span class="mdl-textfield__error"></span>
                            </label>

                            <!--/.New category-->
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" name="new_category" onchange="uncheckCheckboxes('money_income')" id="money_income_new_category">
                                <label class="mdl-textfield__label" for="money_income_new_category">New Money Category</label>
                            </div>
                            <div class="mdl-tooltip" for="money_income_new_category">
                                Enter the new category name<br>if there is no one
                            </div>
                        </div><!--/.money_income_category_wrapper-->

                        <div class="money_income_date_wrapper">
                            <!--Day-->
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" name="Day" pattern="-?[0-9]*(\.[0-9]+)?" id="money_income_day">
                                <label class="mdl-textfield__label" for="money_income_day">Day</label>
                                <span class="mdl-textfield__error">Input is not a number!</span>
                            </div>

                            <!--Month-->
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" name="Month" pattern="-?[0-9]*(\.[0-9]+)?" id="money_income_month">
                                <label class="mdl-textfield__label" for="money_income_month">Month</label>
                                <span class="mdl-textfield__error">Input is not a number!</span>
                            </div>

                            <!-- Year -->
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" name="ear" pattern="-?[0-9]*(\.[0-9]+)?" id="money_income_year">
                                <label class="mdl-textfield__label" for="money_income_year">Year</label>
                                <span class="mdl-textfield__error">Input is not a number!</span>
                            </div>
                        </div><!--/.money_income_date_wrapper-->
                        <div id="money-income-adding-progress" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div>
                        <br>
                    </form>
                    <br>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
                            onclick="addMoney()">
                        Add Money!
                    </button>
                </div>

                <div class="mdl-tabs__panel" id="archive-panel">
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
                </div><!--/#archive-panel-->
            </div><!--/.mdl-tabs-->

            <div id="mospender-snackbar" class="mdl-js-snackbar mdl-snackbar">
                <div class="mdl-snackbar__text"></div>
                <button class="mdl-snackbar__action" type="button"></button>
            </div>

            <!--JAVASCRIPT FUNCTIONS-->
            <script type="text/javascript">
                /* Function to add money income to DB */
                function addMoney () {
                    $('#money-income-adding-progress').css('display', 'block');

                    var formToAddMoney = '#form-to-add-money-income';

                    var moneyReason = $(formToAddMoney + ' #money_income_reason').val();
                    var moneyQuantity = $(formToAddMoney + ' #money_income_quantity').val();
                    var moneyCurrency = $(formToAddMoney + ' input[name=money_quantity_currency]:checked').val();
                    var moneyCategory = $(formToAddMoney + ' input[name=money_income_category]:checked').val();
                    var moneyNewCategory = $(formToAddMoney + ' #money_income_new_category').val();

                    var moneyDay = $(formToAddMoney + ' #money_income_day').val();
                    var moneyMonth = $(formToAddMoney + ' #money_income_month').val();
                    var moneyYear = $(formToAddMoney + ' #money_income_year').val();

                    if (validateMoneyForm(formToAddMoney, moneyNewCategory)) {
                        var url = '/addMoneyIncome';
                        var data = 'moneyReason=' + moneyReason +
                            '&moneyQuantity=' + moneyQuantity +
                            '&moneyCurrency=' + moneyCurrency +
                            '&moneyCategory=' + moneyCategory +
                            '&moneyNewCategory=' + moneyNewCategory +
                            '&moneyDay=' + moneyDay +
                            '&moneyMonth=' + moneyMonth +
                            '&moneyYear=' + moneyYear;

                        $.ajax({
                            url: url,
                            type: "POST",
                            data: data,
                            success: function (response) {
                                showMdlSnackbar(response, 'success', '#mospender-snackbar');
                                $('#money-income-adding-progress').css('display', 'none');
                                cleanForm(formToAddMoney);
                            },
                            error: function (response) {
                                showMdlSnackbar(response, 'error', '#mospender-snackbar');
                                $('#money-income-adding-progress').css('display', 'none');
                                cleanForm(formToAddMoney);
                            }
                        });
                    }
                }

                function validateMoneyForm (form, newCategory) {

                    var moneyCategory = $(form + ' .money_income_category');
                    var categoryValidation;

                    // Don't validate the categories checkboxes when the new category is adding
                    if (!newCategory) {
                        categoryValidation = validate(moneyCategory, null, null, true);
                    } else {
                        categoryValidation = validate(moneyCategory, null, null, false);
                    }

                    var reason = $(form + ' #money_income_reason');
                    var moneyQuantity = $(form + ' #money_income_quantity');
                    var moneyDay = $(form + ' #money_income_day');
                    var moneyMonth = $(form + ' #money_income_month');
                    var moneyYear = $(form + ' #money_income_year');

                    var reasonValidation = validate(reason, 0, 50, true);
                    var quantityValidation = validate(moneyQuantity, null, null, true);
                    var dayValidation = validate(moneyDay, null, null, true);
                    var monthValidation = validate(moneyMonth, null, null, true);
                    var yearValidation = validate(moneyYear, null, null, true);

                    if (categoryValidation && reasonValidation && quantityValidation && dayValidation && monthValidation && yearValidation) {
                        return true;
                    }
                }

                function addSpenderItemToDB () {
                    $('#sender-item-adding-progress').css('display', 'block');

                    var formToAddItems = '#form-to-add-data-from-note';

                    var ItemName = $(formToAddItems + ' #spender_item_name').val();
                    var ItemPrice = $(formToAddItems + ' #spender_item_price').val();
                    var ItemPriceCurrency = $(formToAddItems + ' input[name=spender_currency]:checked').val();
                    var ItemTags = $(formToAddItems + ' #spender_item_tags').val();
                    var ItemCategories = $(formToAddItems + ' input[name=spender_item_category]:checked').val();
                    var ItemNewCategory = $(formToAddItems + ' #spender_item_new_category').val();
                    var ItemDay = $(formToAddItems + ' #spender_item_day').val();
                    var ItemMonth = $(formToAddItems + ' #spender_item_month').val();
                    var ItemYear = $(formToAddItems + ' #spender_item_year').val();

                    if (validateMoSpenderForm(ItemNewCategory)) {

                        var url = '/addSpenderItem';
                        var data = 'itemName=' + ItemName +
                            '&itemPrice=' + ItemPrice +
                            '&itemPriceCurrency=' + ItemPriceCurrency +
                            '&itemTags=' + ItemTags +
                            '&itemCategories=' + ItemCategories +
                            '&itemNewCategory=' + ItemNewCategory +
                            '&itemDay=' + ItemDay +
                            '&itemMonth=' + ItemMonth +
                            '&itemYear=' + ItemYear;

                        $.ajax({
                            url: url,
                            type: "POST",
                            data: data,
                            success: function (response) {
                                showMdlSnackbar(response, 'success', '#mospender-snackbar');
                                $('#sender-item-adding-progress').css('display', 'none');
                                cleanForm(formToAddItems);
                            },
                            error: function (response) {
                                showMdlSnackbar(response, 'error', '#mospender-snackbar');
                                $('#sender-item-adding-progress').css('display', 'none');
                                cleanForm(formToAddItems);
                            }
                        });
                    }
                }

                /* Function to validate moSpender form before saving */
                function validateMoSpenderForm (newCategory) {
                    var formToAddItems = '#form-to-add-data-from-note';

                    var spenderCategory = $(formToAddItems + ' .spender_item_category');
                    var categoryValidation;

                    // Don't validate the categories checkboxes when the new category is adding
                    if (!newCategory) {
                        categoryValidation = validate(spenderCategory, null, null, true);
                    } else {
                        categoryValidation = validate(spenderCategory, null, null, false);
                    }

                    var spenderName = $(formToAddItems + ' #spender_item_name');
                    var spenderPrice = $(formToAddItems + ' #spender_item_price');
                    var spenderDay = $(formToAddItems + ' #spender_item_day');
                    var spenderMonth = $(formToAddItems + ' #spender_item_month');

                    var nameValidation = validate(spenderName, 0, 50, true);
                    var priceValidation = validate(spenderPrice, null, null, true);
                    var dayValidation = validate(spenderDay, null, null, true);
                    var monthValidation = validate(spenderMonth, null, null, true);

                    if (nameValidation && priceValidation && dayValidation && monthValidation && categoryValidation) {
                        return true;
                    }
                }
            </script>
            <!-- End JavaScript -->

        </div>
        <div class="mdl-cell--2-col"></div>
    </div>
</main>