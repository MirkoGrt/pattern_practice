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

/* Function to custom validate BASE MDL form */
function validate (field, min, max, setRequired) {
    var defaultErrorLength = 23;
    var fieldName = field.attr('name');

    var mdlErrorMessage = field.siblings('.mdl-textfield__error');
    var ErrorMessageText = mdlErrorMessage.text();

    // validate checkbox
    if (setRequired && field.attr('type') == 'checkbox' && field.is(':checked') == false) {
        if (ErrorMessageText.length < defaultErrorLength) {
            mdlErrorMessage.text(fieldName + ' is the required field!' + ' - ' + ErrorMessageText).css('visibility', 'visible');
        }
        return false;
    }
    // validate require
    else if (setRequired && field.val() == 0) {
        if (ErrorMessageText.length < defaultErrorLength) {
            mdlErrorMessage.text(fieldName + ' is the required field!' + ' - ' + ErrorMessageText).css('visibility', 'visible');
        }
        return false;
    }
    // validate max
    else if (max != null && field.val() > max) {
        if (ErrorMessageText.length < defaultErrorLength) {
            mdlErrorMessage.text('The maximum is ' + max + ' characters!' + ' - ' + ErrorMessageText).css('visibility', 'visible');
        }
        return false;
    }
    // validate min
    else if (min != null && field.val() < min) {
        if (ErrorMessageText.length < defaultErrorLength) {
            mdlErrorMessage.text('The minimum is ' + min + ' characters!' + ' - ' + ErrorMessageText).css('visibility', 'visible');
        }
        return false;
    }
    // validation success
    else {
        mdlErrorMessage.text('').css('visibility', 'hidden');
        return true;
    }
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