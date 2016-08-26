$(document).ready(function () {

    $("#form-to-add-data-from-note").validate({
        rules: {
            spender_item_name: "required",
            spender_item_price: "required",
            spender_item_new_category: {
                required: function () {
                    return !$(".spender_item_category").is(":checked");
                }
            },
            spender_item_day: {
                required: function () {
                    return !($("#spender-today-date").is(":checked") || $("#spender-previous-date").is(":checked"));
                }
            },
            spender_item_month: {
                required: function () {
                    return !($("#spender-today-date").is(":checked") || $("#spender-previous-date").is(":checked"));
                }
            },
            spender_item_year: {
                required: function () {
                    return !($("#spender-today-date").is(":checked") || $("#spender-previous-date").is(":checked"));
                }
            }
        },
        submitHandler: function() {
            addSpenderItemToDB();
        }
    });

    $("#form-to-add-money-income").validate({
        rules: {
            money_income_reason: "required",
            money_income_quantity: "required",
            money_income_new_category: {
                required: function () {
                    return !$(".money_income_category").is(":checked");
                }
            },
            money_income_day: {
                required: function () {
                    return !($("#money-income-today-date").is(":checked") || $("#money-income-previous-date").is(":checked"));
                }
            },
            money_income_month: {
                required: function () {
                    return !($("#money-income-today-date").is(":checked") || $("#money-income-previous-date").is(":checked"));
                }
            },
            money_income_year: {
                required: function () {
                    return !($("#money-income-today-date").is(":checked") || $("#money-income-previous-date").is(":checked"));
                }
            }
        },
        submitHandler: function() {
            addMoney();
        }
    });
});

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