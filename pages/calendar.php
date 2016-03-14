<!doctype html>
<html>
    <?php require_once '../skeleton/head.php'; ?>
    <body>
        <?php require_once '../skeleton/header.php'; ?>
        <main class="android-content mdl-layout__content">
            <div class="mdl-grid">
                <div class="mdl-cell--2-col"></div>
                <div class="mdl-cell--8-col">
                    <h3>Calendar development</h3>
                    <p>The DB for this structure is in the folder "DbConnection" (practice_calendar.sql)</p>
                    <p>You need to make your own MySQL connection in the <strong>"DbConnection/connection.php"</strong> file</p>
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

                    <table class="mdl-data-table mdl-js-data-table">
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
                                class='mdl-data-table__cell--non-numeric <?php echo ($currentTimeStamp == $dayTimeStamp && $month == date('n')) ? 'cell-active-data' : ''; ?>'>
                                <button type='button'
                                        id="dialog_btn_<?php echo $i; ?>"
                                        data-current_date="<?php echo $dayTimeStamp; ?>"
                                        class='mdl-button show-dialog'>
                                    <?php echo $i; ?>
                                </button>
                            </td>
                        <?php endfor; ?>
                        </tbody>
                    </table>

                    <dialog class="mdl-dialog">
                        <h4 class="mdl-dialog__title">Some Event?</h4>
                        <div class="mdl-dialog__content">
                            <p class="event-date"></p>
                            <form name="event-form" method="post">
                                <input type="hidden" name="event-timestamp" value="" />
                                <div class="mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" name="event-title" type="text">
                                    <label class="mdl-textfield__label" for="event-title">Title...</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield">
                                    <textarea class="mdl-textfield__input" type="text" name="event-details" rows= "3"></textarea>
                                    <label class="mdl-textfield__label" for="event-details">Event details...</label>
                                </div>
                            </form>
                        </div>
                        <div class="mdl-dialog__actions">
                            <button type="button" class="mdl-button">Add Event</button>
                            <button type="button" class="mdl-button close">Close</button>
                        </div>
                    </dialog>
                    <script>
                        /* Function to transfer event data to dialog popup */
                        function transferEventData (button) {

                            /* Getting current date to show in dialog paragraf */
                            var currentDateTimeStamp = button.data('current_date');
                            var currentDate = new Date(currentDateTimeStamp * 1000);

                            /* Transfer current timestamp to dialog hidden field */
                            $('input[name="event-timestamp"]').val(currentDateTimeStamp);

                            $('dialog .event-date').text(currentDate.getDate() + '/' + (currentDate.getMonth() + 1) + '/' +currentDate.getFullYear());
                        }

                        /* MDL dialog */
                        var dialog = document.querySelector('dialog');
                        if (! dialog.showModal) {
                            dialogPolyfill.registerDialog(dialog);
                        }
                        /* hack default dialog behavior (now it is opening on class name) */
                        $('.show-dialog').on('click', function () {
                            dialog.showModal();
                            transferEventData($(this));
                        });
                        dialog.querySelector('.close').addEventListener('click', function() {
                            dialog.close();
                        });
                    </script>
                </div>
                <div class="mdl-cell--2-col"></div>
            </div>
        </main>
        <?php require_once '../skeleton/footer.php'; ?>
    </body>
</html>