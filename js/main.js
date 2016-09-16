// Function equal to PHP var_dump();
function dump(obj) {
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }

    var pre = document.createElement('pre');
    pre.innerHTML = out;
    return pre;
}

// Function to make a random id
function makeId() {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

    for( var i = 0; i < 5; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}

// Constructor for prototype lesson
function person (name, age, color) {
    this.name = name;
    this.age = age;
    this.color = color;
}

// Function to print array in div. (For merge sorting)
function arrayToDiv (array, div) {
    var divHtml="";
    jQuery.each(array, function(i, val) {
        divHtml += val + " - ";
        if (i == array.length - 1) {
            divHtml += "<br />";
        }
    });
    div.append(divHtml);
}

// Function to show/hide patterns diagrams
function togglePatternDiagram (pattern) {
    $('.' + pattern + '-diagram').toggle('display');
}

/* Function to clean MDL form after action */
function cleanForm (form) {
    $(form).trigger('reset');
    $(form + ' .mdl-textfield').removeClass('is-dirty');
    $(form + ' .mdl-textfield__error').css('visibility', 'hidden');
    $(form + ' .mdl-progress').css('display', 'none');

    // Uncheck all checkboxes
    $(form + ' input[type=checkbox]').each(function () {
        $(this).parent('label').removeClass('is-checked');
        $(this).attr('checked', false);
    });
}

/* MDL snackbar. Showing when form is confirmed */
function showMdlSnackbar (response, type, id) {
    'use strict';
    window['counter'] = 0;
    var snackbarContainer = document.querySelector(id);
    var data = {message: response};
    if (type == 'error') {
        snackbarContainer.style.backgroundColor = 'red';
    } else if (type == 'success') {
        snackbarContainer.style.backgroundColor = '#A2CD5A';
    }
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
}

/*
    Functions to check only one checkbox at the time (for categories on the moSpender page)

*/
function selectOnlyThis (checkbox, className) {
    // clean the new category if select category from the list
    var newCategoryInput = $('input#' + className + '_new_category');
    newCategoryInput.val('').parent('div').removeClass('is-dirty');
    
    // check only one category from the list
    var inputsToCheckOut = $('input.' + className + '_category').not(checkbox);
    inputsToCheckOut.each(function () {
        $(this).parent('label').removeClass('is-checked');
        $(this).attr('checked', false);
    });
}

/*
* Function to check out categories if new category is inputted (for categories on the moSpender page)
* */
function uncheckCheckboxes (className) {
    var checkboxes = $('input.' + className + '_category');
    checkboxes.each(function () {
        $(this).parent('label').removeClass('is-checked');
        $(this).attr('checked', false);
    });
}

/*
* Function for logout user
* */

function logout () {
    var data = {
    };
    $.ajax({
        type: "POST",
        url: '/logout',
        data: data,
        dataType: 'json',
        success: function (response) {
            window.location.href = window.location.origin;
        },
        error: function () {

        }
    });
}