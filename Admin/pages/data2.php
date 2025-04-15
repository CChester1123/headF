<?php
require 'config2.php';

$yearSelected = $_GET['yearSelected'];
$deptSelected = $_GET['deptSelected'];

if ($deptSelected == 'Thermal Bonding') {
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: Attachment; Filename = Thermal Bonding ($yearSelected).xls");
?>
    <table border="1">
        <tr>
            <td>#</td>
            <td>Handle Part Number</td>
            <td>Work Order</td>
            <td>Date</td>
            <td>Machine Number</td>
            <td>Quality By</td>
            <td>Heater Temperature Upper And Lower</td>
            <td>Actual</td>
            <td>Passed/Failed</td>
            <td>Heating Time</td>
            <td>Actual</td>
            <td>Passed/Failed</td>
            <td>Heater Open And Swab Handle Fixture Closing</td>
            <td>Actual</td>
            <td>Passed/Failed</td>
            <td>Fixture Closing Time</td>
            <td>Actual</td>
            <td>Passed/Failed</td>
        </tr>

        <?php
        $i = 1;
        $rows = mysqli_query($conn2, "SELECT * FROM tbl_thermalbonding WHERE YEAR(STR_TO_DATE(date, '%M %d, %Y')) = $yearSelected AND (status != '0' OR status IS NULL)");
        foreach ($rows as $row):
        ?>

            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row["handle"]; ?></td>
                <td><?php echo $row["workorder"]; ?></td>
                <td><?php echo $row["date"]; ?></td>
                <td><?php echo $row["machineNo"]; ?></td>
                <td><?php echo $row["InspectedBY"]; ?></td>
                <td><?php echo $row["TempUpnLowRange"]; ?></td>
                <td><?php echo $row["actTempUpnLow"]; ?></td>
                <td><?php echo $row["TempUpnLow"]; ?></td>
                <td><?php echo $row["HeatingTimeRange"]; ?></td>
                <td><?php echo $row["actHeatingTime"]; ?></td>
                <td><?php echo $row["HeatingTime"]; ?></td>
                <td><?php echo $row["SwabHandleFixtureRange"]; ?></td>
                <td><?php echo $row["actSwabHandleFixture"]; ?></td>
                <td><?php echo $row["SwabHandleFixture"]; ?></td>
                <td><?php echo $row["FixtureClosingTimeRange"]; ?></td>
                <td><?php echo $row["actFixtureClosingTime"]; ?></td>
                <td><?php echo $row["FixtureClosingTime"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php
} elseif ($deptSelected == 'Swab Assembly') {
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: Attachment; Filename = Swab Assembly ($yearSelected).xls");
?>
    <table border="1">
        <tr>
            <td>#</td>
            <td>Handle Part Number</td>
            <td>Work Order</td>
            <td>Date</td>
            <td>Machine Number</td>
            <td>Quality By</td>
            <td>Pull Testing (Min)</td>
            <td>Sample 1</td>
            <td>Sample 2</td>
            <td>Sample 3</td>
            <td>Sample 4</td>
            <td>Sample 5</td>
            <td>Passed/Failed</td>
        </tr>

        <?php
        $i = 1;
        $rows = mysqli_query($conn2, "SELECT * FROM tbl_swabassembly WHERE YEAR(STR_TO_DATE(date, '%M %d, %Y')) = $yearSelected AND (status != '0' OR status IS NULL)");
        foreach ($rows as $row):
            $pullTestingSamples = explode(',', $row['pulltestingSample']);
        ?>

            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row["handle"]; ?></td>
                <td><?php echo $row["workorder"]; ?></td>
                <td><?php echo $row["date"]; ?></td>
                <td><?php echo $row["machineNo"]; ?></td>
                <td><?php echo $row["InspectedBY"]; ?></td>
                <td><?php echo $row["pulltestingMin"]; ?></td>
                <td><?php echo $pullTestingSamples[0]; ?></td>
                <td><?php echo $pullTestingSamples[1]; ?></td>
                <td><?php echo $pullTestingSamples[2]; ?></td>
                <td><?php echo $pullTestingSamples[3]; ?></td>
                <td><?php echo $pullTestingSamples[4]; ?></td>
                <td><?php echo $row["remarksPullTesting"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php
}
?>