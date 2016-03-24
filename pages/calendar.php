<!doctype html>
<html>
    <?php require_once '../skeleton/head.php'; ?>
    <body>
        <?php require_once '../skeleton/header.php'; ?>

        <?php
            // Definition the Calendar class
            $calendar = new Calendar();

            // Getting all events timestamps (array)
            $allEvents = $calendar->getEventsTimestamp();
        ?>
        <main class="android-content mdl-layout__content">
            <div class="mdl-grid">
                <div class="mdl-cell--2-col"></div>
                <div class="mdl-cell--8-col">
                    <h3>Calendar development</h3>
                    <p>
                        The DB for this structure is in the folder "DbDumps" (practice_calendar.sql)
                    </p>
                    <p>
                        You need to make your own MySQL connection in the
                        <strong>"lib/Calendar.php"->initDbConnection method </strong>.
                    </p>
                    <p>
                        To make the events work please install the "practice_calendar" DB and do the custom connection.
                        Event handler (Calendar class) file is located in the <strong>"pages/calendar"</strong> folder.
                    </p>
                    <script type="text/javascript">
                        function goPrevMonth (month, year) {
                            if (month == 1) {
                                --year;
                                month = 13;
                            }
                            --month;
                            var monthString = "" + month + "";
                            if (monthString.length <= 1) {
                                monthString = "0" + month + "";
                            }
                            document.location.href = "<?php $_SERVER['PHP_SELF']; ?>?month=" + monthString + "&year=" + year;
                        }

                        function goNextMonth (month, year) {
                            if (month == 12) {
                                ++year;
                                month = 0;
                            }
                            ++month;
                            var monthString = "" + month + "";
                            if (monthString.length <= 1) {
                                monthString = "0" + month + "";
                            }
                            document.location.href = "<?php $_SERVER['PHP_SELF']; ?>?month=" + monthString + "&year=" + year;
                        }
                    </script>
                    <?php
                    // DAY
                    if (isset($_GET['day'])) {
                        $day = $_GET['day'];
                    } else {
                        $day = date('j');
                    }
                    // MONTH
                    if (isset($_GET['month'])) {
                        $month = $_GET['month'];
                    } else {
                        $month = date('n');
                    }
                    // YEAR
                    if (isset($_GET['year'])) {
                        $year = $_GET['year'];
                    } else {
                        $year = date('Y');
                    }

                    // Calendar variable
                    $currentTimeStamp = strtotime("{$year}-{$month}-{$day}");

                    // Get current month
                    $currentMonth = date('F', $currentTimeStamp);

                    // Get how many days are in the current month
                    $numDays = date('t', $currentTimeStamp);

                    // Counter for the loop
                    $counter = 0;

                    ?>

                    <table class="mdl-data-table main-calendar-table mdl-js-data-table">
                        <thead>
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">
                                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-button--mini-fab mdl-button--colored" onclick="goPrevMonth(<?php echo $month . ',' . $year; ?>)">
                                        <i class="material-icons">skip_previous</i>
                                    </button>
                                </td class="mdl-data-table__cell--non-numeric">
                                <td colspan="5">
                                    <?php echo $currentMonth . " / " . $year; ?>
                                </td>
                                <td class="mdl-data-table__cell--non-numeric">
                                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-button--mini-fab mdl-button--colored" onclick="goNextMonth(<?php echo $month . ',' . $year; ?>)">
                                        <i class="material-icons">skip_next</i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th class="mdl-data-table__cell--non-numeric">Sun</th>
                                <th class="mdl-data-table__cell--non-numeric">Mon</th>
                                <th class="mdl-data-table__cell--non-numeric">Tue</th>
                                <th class="mdl-data-table__cell--non-numeric">Wed</th>
                                <th class="mdl-data-table__cell--non-numeric">Thu</th>
                                <th class="mdl-data-table__cell--non-numeric">Fri</th>
                                <th class="mdl-data-table__cell--non-numeric">Sat</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        for ($i = 1; $i < $numDays + 1; $i++, $counter++):
                            if ($counter % 7 == 0) {
                                echo "<tr>";
                            }
                            // Timestamp for each day in month
                            $dayTimeStamp = strtotime("{$year}-{$month}-{$i}");

                            if ($i == 1) {
                                // First day in month
                                $firstDay = date('w', $dayTimeStamp);
                                for ($j = 0; $j < $firstDay; $j++, $counter++) {
                                    // blank place
                                    echo "<td></td>";
                                }
                            }
                            if (strlen($month) <= 1) {
                                $month = "0" . $month;
                            }
                            if (strlen($day) <= 1) {
                                $day = "0" . $day;
                            }
                        ?>
                            <td align='center'

                                class='events-cell mdl-data-table__cell--non-numeric <?php echo ($currentTimeStamp == $dayTimeStamp && $month == date('n')) ? 'cell-active-data' : ''; ?>'>
                                <button type='button'
                                        id="dialog_btn_<?php echo $i; ?>"
                                        data-current_date="<?php echo $dayTimeStamp; ?>"
                                        title="Add Event"
                                        class='mdl-button show-dialog'>
                                    <?php echo $i; ?>
                                </button>
                                <?php if (in_array($dayTimeStamp, $allEvents)): ?>
                                    <button class="mdl-button show-events-btn mdl-js-button mdl-button--icon mdl-button--colored"
                                            onclick="togleEventCard('card-event-<?php echo $i; ?>')"
                                            title="EVENTS HERE!">
                                        <i class="material-icons">date_range</i>
                                    </button>
                                    <div class="day-card-event  mdl-card mdl-shadow--2dp" id="card-event-<?php echo $i; ?>">
                                        <div class="mdl-card__title mdl-card--expand">
                                            <h4 class="event-title">
                                                <?php echo $calendar->getEventTitle($dayTimeStamp); ?>
                                            </h4>
                                            <p class="event-details">
                                                <?php echo $calendar->getEventDetails($dayTimeStamp); ?>
                                            </p>
                                        </div>
                                        <div class="mdl-card__actions mdl-card--border">
                                            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                                onclick="togleEventCard('card-event-<?php echo $i; ?>')">
                                                CLOSE
                                            </a>
                                            <div class="mdl-layout-spacer"></div>
                                            <i class="material-icons">event</i>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </td>
                        <?php endfor; ?>
                        </tbody>
                    </table>

                    <dialog class="mdl-dialog">
                        <h4 class="mdl-dialog__title">Some Event?</h4>
                        <div class="mdl-dialog__content">
                            <p class="event-date"></p>
                            <form id="event-form" method="post">
                                <input type="hidden" name="event-timestamp" value="" />
                                <div class="mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" name="event-title" type="text">
                                    <label class="mdl-textfield__label" for="event-title">Title...</label>
                                    <span class="mdl-textfield__error"></span>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield">
                                    <textarea class="mdl-textfield__input" type="text" name="event-details" rows= "3"></textarea>
                                    <label class="mdl-textfield__label" for="event-details">Event details...</label>
                                    <span class="mdl-textfield__error"></span>
                                </div>
                            </form>
                            <div id="event-adding-progress" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div>
                        </div>
                        <div class="mdl-dialog__actions">
                            <button type="button" onclick="saveEvent()" class="mdl-button">Add Event</button>
                            <button type="button" class="mdl-button close">Close</button>
                        </div>
                    </dialog>

                    <div id="event-snackbar-success" class="mdl-js-snackbar mdl-snackbar">
                        <div class="mdl-snackbar__text"></div>
                        <button class="mdl-snackbar__action" type="button"></button>
                    </div>

                    <script>
                        /* Function to custom validate BASE MDL form */
                        function validate (field, min, max, setRequired) {

                            var mdlErrorMessage = field.siblings('.mdl-textfield__error');

                            if (setRequired && field.val() == 0) {
                                mdlErrorMessage.text('This is the required field!').css('visibility', 'visible');
                                return false;
                            }
                             else if (field.val() > max) {
                                mdlErrorMessage.text('The maximum is ' + max + ' characters!').css('visibility', 'visible');
                                return false;
                            } else if (field.val() < min) {
                                mdlErrorMessage.text('The minimum is ' + min + ' characters!').css('visibility', 'visible');
                                return false;
                            } else {
                                mdlErrorMessage.text('').css('visibility', 'hidden');
                                return true;
                            }
                        }

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

                        /* Function to clean event form after save the event */
                        function cleanEventForm () {
                            $('#event-form').trigger('reset');
                            $('#event-form .mdl-textfield').removeClass('is-dirty');
                            $('#event-form .mdl-textfield__error').css('visibility', 'hidden');
                            $('#event-adding-progress').css('display', 'none');
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
                                var url = 'ajax_form_handler.php?action=addEvent';
                                $.ajax({
                                    url: url,
                                    type: "POST",
                                    data: data,
                                    success: function (response) {
                                        showMdlSnackbar(response, 'success');
                                        cleanEventForm();
                                        $('#event-adding-progress').css('display', 'none');
                                    },
                                    error: function (response) {
                                        showMdlSnackbar(response, 'error');
                                        cleanEventForm();
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

                        /* Function to togle "display" ('block', 'none') on card with events */
                        function togleEventCard (card) {
                            $('#' + card).toggle('display');
                        }

                        /* MDL dialog */
                        var dialog = document.querySelector('dialog');
                        if (! dialog.showModal) {
                            dialogPolyfill.registerDialog(dialog);
                        }
                        /* hack default dialog behavior (now it is opening on class name) */
                        $('.show-dialog').on('click', function () {
                            dialog.showModal();
                            cleanEventForm();
                            transferEventData($(this));
                        });
                        dialog.querySelector('.close').addEventListener('click', function() {
                            dialog.close();
                            cleanEventForm();
                        });

                        /* MDL snackbar. Showing when event is added */
                        function showMdlSnackbar (response, type) {
                            'use strict';
                            window['counter'] = 0;
                            var snackbarContainer = document.querySelector('#event-snackbar-success');
                            var data = {message: response};
                            if (type == 'error') {
                                snackbarContainer.style.backgroundColor = 'red';
                            } else if (type == 'success') {
                                snackbarContainer.style.backgroundColor = '#A2CD5A';
                            }
                            snackbarContainer.MaterialSnackbar.showSnackbar(data);
                        }
                    </script>
                </div>
                <div class="mdl-cell--2-col"></div>
            </div>
        </main>
        <?php require_once '../skeleton/footer.php'; ?>
    </body>
</html>