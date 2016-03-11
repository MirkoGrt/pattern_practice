<!doctype html>
<html>
    <?php require_once '../skeleton/head.php'; ?>
    <body>
        <?php require_once '../skeleton/header.php'; ?>
        <main class="android-content mdl-layout__content">
            <h1>Calendar development</h1>
            <p>The DB for this structure is in the folder "DbConnection" (practice_calendar.sql)</p>
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
            <table border="1">
                <tr>
                    <td>
                        <input type="button" value="prev" name="previous-btn"
                               onclick="goPrevMonth(<?php echo $month . ',' . $year; ?>)"
                        />
                    </td>
                    <td colspan="5">
                        <?php echo $currentMonth . " / " . $year; ?>
                    </td>
                    <td>
                        <input type="button" value="next" name="next-btn"
                               onclick="goNextMonth(<?php echo $month . ',' . $year; ?>)"
                        />
                    </td>
                </tr>
                <tr>
                    <td>Sun</td>
                    <td>Mon</td>
                    <td>Tue</td>
                    <td>Wed</td>
                    <td>Thu</td>
                    <td>Fri</td>
                    <td>Sat</td>
                </tr>
                <tr>
                    <?php
                        for ($i = 1; $i < $numDays + 1; $i++, $counter++) {
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
                            if ($counter % 7 == 0) {
                                echo "<tr></tr>";
                            }
                            echo "<td align='center'><a href=''>{$i}</a></td>";
                        }
                    ?>
                </tr>
            </table>
            <hr>
            <form name="event-form" method="post">
            <table border="1">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="event-title" />
                    </td>
                </tr>
                <tr>
                    <td>Detail</td>
                    <td>
                        <textarea name="event-details" cols="20" rows="3"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Add Event" />
                    </td>
                </tr>
            </table>
        </form>
        </main>
        <?php require_once '../skeleton/footer.php'; ?>
    </body>
</html>