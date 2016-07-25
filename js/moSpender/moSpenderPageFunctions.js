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
    var TodayDate = $(formToAddMoney + ' #money-income-today-date').is(':checked');
    var PreviousDate = $(formToAddMoney + ' #money-income-previous-date').is(':checked');

    // if today date checkbox is checked - set today date
    if (TodayDate) {
        var date = new Date();
        moneyYear = date.getFullYear();
        moneyMonth = date.getMonth() + 1;
        moneyDay = date.getDate();
    }

    // Write date to local storage (for prev date checkbox)
    if (moneyDay && moneyMonth && moneyYear) {
        localStorage.setItem('moneyDay', moneyDay);
        localStorage.setItem('moneyMonth', moneyMonth);
        localStorage.setItem('moneyYear', moneyYear);
        $('#money-income-previous-date-label').text('Prev Date -' + localStorage.getItem('moneyDay') + '-' + localStorage.getItem('moneyMonth') + '-' + localStorage.getItem('moneyYear'));
    }

    // If Previous date checkbox is checked - get item data from local storage
    if (PreviousDate) {
        moneyYear = localStorage.getItem('itemYear');
        moneyMonth = localStorage.getItem('itemMonth');
        moneyDay = localStorage.getItem('itemDay');
    }

    if (validateMoneyForm(formToAddMoney, moneyNewCategory, TodayDate, PreviousDate)) {
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

function validateMoneyForm (form, newCategory, todayDate, previousDate) {

    var moneyCategory = $(form + ' .money_income_category');
    var reason = $(form + ' #money_income_reason');
    var moneyQuantity = $(form + ' #money_income_quantity');
    var moneyDay = $(form + ' #money_income_day');
    var moneyMonth = $(form + ' #money_income_month');
    var moneyYear = $(form + ' #money_income_year');

    var categoryValidation = validate(moneyCategory, null, null, true);
    var dayValidation = validate(moneyDay, null, null, true);
    var monthValidation = validate(moneyMonth, null, null, true);
    var yearValidation = validate(moneyYear, null, null, true);

    // Don't validate the categories checkboxes when the new category is adding
    if (newCategory) {
        categoryValidation = validate(moneyCategory, null, null, false);
    }

    // Don't validate date inputs if today date is checked
    if (todayDate || previousDate) {
        dayValidation = validate(moneyDay, null, null, false);
        monthValidation = validate(moneyMonth, null, null, false);
        yearValidation = validate(moneyYear, null, null, false);
    }

    var reasonValidation = validate(reason, 0, 50, true);
    var quantityValidation = validate(moneyQuantity, null, null, true);


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

    var TodayDate = $(formToAddItems + ' #spender-today-date').is(':checked');
    var PreviousDate = $(formToAddItems + ' #spender-previous-date').is(':checked');

    // if today date checkbox is checked - set today date
    if (TodayDate) {
        var date = new Date();
        ItemYear = date.getFullYear();
        ItemMonth = date.getMonth() + 1;
        ItemDay = date.getDate();
    }

    // Write date to local storage (for prev date checkbox)
    if (ItemDay && ItemMonth && ItemYear) {
        localStorage.setItem('itemDay', ItemDay);
        localStorage.setItem('itemMonth', ItemMonth);
        localStorage.setItem('itemYear', ItemYear);
        $('#spender-previous-date-label').text('Prev Date -' + localStorage.getItem('itemDay') + '-' + localStorage.getItem('itemMonth') + '-' + localStorage.getItem('itemYear'));
    }

    // If Previous date checkbox is checked - get item data from local storage
    if (PreviousDate) {
        ItemYear = localStorage.getItem('itemYear');
        ItemMonth = localStorage.getItem('itemMonth');
        ItemDay = localStorage.getItem('itemDay');
    }

    if (validateMoSpenderForm(ItemNewCategory, TodayDate, PreviousDate)) {

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
function validateMoSpenderForm (newCategory, todayDate, previousDate) {
    var formToAddItems = '#form-to-add-data-from-note';

    var spenderName = $(formToAddItems + ' #spender_item_name');
    var spenderPrice = $(formToAddItems + ' #spender_item_price');
    var spenderDay = $(formToAddItems + ' #spender_item_day');
    var spenderMonth = $(formToAddItems + ' #spender_item_month');
    var spenderYear = $(formToAddItems + ' #spender_item_year');

    var nameValidation = validate(spenderName, 0, 50, true);
    var priceValidation = validate(spenderPrice, null, null, true);
    var dayValidation = validate(spenderDay, null, null, true);
    var monthValidation = validate(spenderMonth, null, null, true);
    var yearValidation = validate(spenderYear, null, null, true);

    var spenderCategory = $(formToAddItems + ' .spender_item_category');
    var categoryValidation = validate(spenderCategory, null, null, true);

    // Don't validate the categories checkboxes when the new category is adding
    if (newCategory) {
        categoryValidation = validate(spenderCategory, null, null, false);
    }

    // Don't validate date inputs if today date or previous is checked
    if (todayDate || previousDate) {
        dayValidation = validate(spenderDay, null, null, false);
        monthValidation = validate(spenderMonth, null, null, false);
        yearValidation = validate(spenderYear, null, null, false);
    }

    if (nameValidation && priceValidation && dayValidation && monthValidation && yearValidation && categoryValidation) {
        return true;
    }
}

/* Functions for showing previous dates from local storage in checkbox labels when page is loaded */
if (localStorage.getItem('itemYear') && localStorage.getItem('itemMonth') && localStorage.getItem('itemDay')) {
    $('#spender-previous-date-label').text('Prev Date: ' + localStorage.getItem('itemDay') + '-' + localStorage.getItem('itemMonth') + '-' + localStorage.getItem('itemYear'));
} else {
    $('#spender-previous-date-label').text('No previous date');
}

if (localStorage.getItem('moneyYear') && localStorage.getItem('moneyMonth') && localStorage.getItem('moneyDay')) {
    $('#money-income-previous-date-label').text('Prev Date: ' + localStorage.getItem('moneyDay') + '-' + localStorage.getItem('moneyMonth') + '-' + localStorage.getItem('moneyYear'));
} else {
    $('#money-income-previous-date-label').text('No previous date');
}