/* Function to validate event form before saving */
function validateEventForm () {
    var eventTitle = $('#event-form input[name="event-title"]');
    var eventDetails = $('#event-form textarea[name="event-details"]');

    var titleValidation = validate(eventTitle, 0, 20, true);
    var detailsValidation = validate(eventDetails, 0, 100, true);

    if (titleValidation && detailsValidation) {
        return true;
    }
}

/* Function to save event to DB via aJax */
function saveEvent () {
    $('#event-adding-progress').css('display', 'block');

    if (validateEventForm()) {
        var eventTimestamp = $('dialog input[name="event-timestamp"]').val();
        var eventTitle = $('dialog input[name="event-title"]').val();
        var eventDetails = $('dialog textarea[name="event-details"]').val();

        var data = 'timestamp=' + eventTimestamp + '&title=' + eventTitle + '&details=' + eventDetails;

        /* We need the 'action' parameter for router definition */
        var url = '/addEvent';
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: function (response) {
                showMdlSnackbar(response, 'success', '#event-snackbar-success');
                cleanForm('#event-form');
                $('#event-adding-progress').css('display', 'none');
            },
            error: function (response) {
                showMdlSnackbar(response, 'error', '#event-snackbar-success');
                cleanForm('#event-form');
                $('#event-adding-progress').css('display', 'none');
            }
        });
    }
}

/* Function to transfer event data to dialog popup */
function transferEventData (button) {

    /* Getting current date to show in dialog paragraf */
    var currentDateTimeStamp = button.data('current_date');
    var currentDate = new Date(currentDateTimeStamp * 1000);

    /* Transfer current timestamp to dialog hidden field */
    $('input[name="event-timestamp"]').val(currentDateTimeStamp);

    $('dialog .event-date').text(currentDate.getDate() + '/' + (currentDate.getMonth() + 1) + '/' +currentDate.getFullYear());
}

/* MDL dialog (Add event form) */
var dialog = document.querySelector('dialog');
if (! dialog.showModal) {
    dialogPolyfill.registerDialog(dialog);
}
/* hack default dialog behavior (now it is opening on class name) */
$('.show-dialog').on('click', function () {
    dialog.showModal();
    cleanForm('#event-form');
    transferEventData($(this));
});
dialog.querySelector('.close').addEventListener('click', function() {
    dialog.close();
    cleanForm('#event-form');
});

/* Function to change event status (active / not active) via checkbox in mdl menu */
function changeEventStatus (label, checkbox, eventId) {

    if (checkbox.checked) {
        $('#' + label).css('color', 'green').text('Active');
    } else {
        $('#' + label).css('color', 'red').text('Not Active');
    }

    var data = 'id=' + eventId;

    /* We need the 'action' parameter for router definition */
    var url = '/changeEventStatus';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (response) {
            showMdlSnackbar(response, 'success', '#event-snackbar-success');
        },
        error: function (response) {
            showMdlSnackbar(response, 'error', '#event-snackbar-success');
        }
    });
}

/* Function to delete event via delete button in mdl menu */
function deleteEvent (eventId) {
    var data = 'id=' + eventId;
    var deletedEvent = $('#event_' + eventId);

    /* We need the 'action' parameter for router definition */
    var url = '/deleteEvent';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (response) {
            showMdlSnackbar(response, 'success', '#event-snackbar-success');
            deletedEvent.remove();
        },
        error: function (response) {
            showMdlSnackbar(response, 'error', '#event-snackbar-success');
        }
    });
}