<title>Thermal Bonding View</title>

<?php
$prod_id = base64_decode($_GET['id']);
include 'includes/header.php';

$sql = $user->ViewEditchecklist2($prod_id);
while ($row = mysqli_fetch_array($sql)) {
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="float-sm-right">
                            <?php
                            if ($_SESSION['account_type'] == 'QA' || $_SESSION['account_type'] == 'Admin' || $_SESSION['account_type'] == 'QA Manager') {
                                if ($row['status'] == "Approved") { ?>
                                    <a type="button" class="btn btn-danger mr-1 fas far fa-arrow-alt-circle-left btnReject" title="Reject Record">Reject</a>
                                <?php } else { ?>
                                    <a type="button" class="btn btn-primary mr-1 fas fa-check-circle btnApprove" title="Approve Record">Approve</a>
                            <?php }
                            } ?>
                        </ol>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="background-color:rgb(27, 102, 201); color: white;">
                                <h3 class="card-title" style="font-weight: bold;">AUDIT LIST</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label>Work Order</label>
                                            <input type="text" class="form-control" id="workorder" placeholder="Enter Work Order" value="<?php echo $row['workorder']; ?>" readonly disabled>
                                            <input type="text" class="form-control" id="prod_id" value="<?php echo $prod_id ?>" hidden readonly disabled>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Date</label>
                                            <input type="text" class="form-control" id="date" placeholder="Enter Product Description" value="<?php echo date("F j, Y"); ?>" value="<?php echo $row['date']; ?>" readonly disabled>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Time</label>
                                            <input type="datetime-local" class="form-control" id="time" value="<?php echo $row['time']; ?>" readonly disabled>
                                        </div>

                                        <div class="col-sm">
                                            <label>Shift</label>
                                            <select class="form-control" id="shift" readonly disabled>
                                                <option value="AM" <?php echo ($row['shift'] == 'AM') ? 'selected' : ''; ?>>AM</option>
                                                <option value="PM" <?php echo ($row['shift'] == 'PM') ? 'selected' : ''; ?>>PM</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label>Operator/s Name</label>
                                            <input type="text" class="form-control" id="operatorName" placeholder="Enter Operator Name" value="<?php echo $row['operatorName']; ?>" readonly disabled>
                                        </div>

                                        <div class="col-sm">
                                            <label>Assigned Team Leader</label>
                                            <select class="form-control" id="teamLead" value="<?php echo $row['teamLead']; ?>" readonly disabled>
                                                <option value="asd">asd</option>
                                                <option value="dsa">dsa</option>
                                            </select>
                                        </div>

                                        <div class="col-sm">
                                            <label>Machine No.</label>
                                            <select name="cars" class="form-control" id="machineNo" readonly disabled>
                                                <?php for ($i = 1; $i <= 6; $i++) { ?>
                                                    <option value="<?php echo $i; ?>" <?php echo ($row['machineNo'] == $i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control" id="product" placeholder="Enter Product Name" value="<?php echo $row['product']; ?>" readonly disabled>
                                        </div>

                                        <?php $qual = isset($_GET['qual']) ? $_GET['qual'] : ''; ?>

                                        <div class="col-sm">
                                            <label>Type</label>
                                            <select id="type" class="form-control" readonly disabled>
                                                <option value="In-Process Audit" <?php echo ($qual == 'In-Process Audit') ? 'selected' : ''; ?>>In-Process Audit</option>
                                                <option value="Start-up Qualification" <?php echo ($qual == 'Start-up Qualification') ? 'selected' : ''; ?>>Start-up Qualification</option>
                                                <option value="Product Change" <?php echo ($qual == 'Product Change') ? 'selected' : ''; ?>>Product Change</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label class="mr-1">Quality</label>
                                            <input type="text" id="InspectedBY" value="<?php echo $_SESSION['name']; ?>" class="form-control" value="<?php echo $row['InspectedBY']; ?>" readonly disabled>
                                        </div>

                                        <div class="col-sm">
                                            <label class="mr-1">Maintenance</label>
                                            <select class="form-control" id="maintenancecheced" data-placeholder="Maintenance By" style="width: 100%;" readonly disabled>
                                                <?php
                                                $sql = $user->selectMaintenance();
                                                while ($list1 = mysqli_fetch_array($sql)) { ?>
                                                    <option value="<?php echo $list1['employeeID']; ?>" <?php echo ($row['maintenancecheced'] == $list1['employeeID']) ? 'selected' : ''; ?>>
                                                        <?php echo $list1['fullName']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- <?php if ($type == "In-Process Audit") {     ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm">
                                                <label>Operator(s)</label>
                                                <input type="text" class="form-control template" id="myTextbox" placeholder="Enter Operator(s)">
                                            </div>
                                            <div class="col-sm">
                                                <label>Time</label>
                                                <input type="datetime-local" class="form-control trans_num" id="myTextbox2">
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="background-color:rgb(27, 102, 201); color: white;">
                                <h3 class="card-title" style="font-weight: bold;">IN-PROCESS AUDIT</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label>Handle Part Number</label>
                                            <input type="text" class="form-control" id="handle" placeholder="Enter Handle" value="<?php echo $row['handle']; ?>" readonly disabled>
                                        </div>

                                        <div class="col-sm">
                                            <label>Substrate Material Part NUmber</label>
                                            <input type="text" class="form-control" id="substrate" placeholder="Enter Handle" value="<?php echo $row['substrate']; ?>" readonly disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="col-sm">
                                                <label>Handle Tree Color</label>
                                                <select class="form-control" id="handleTreeColor" readonly disabled>
                                                    <option value="Light green" <?php echo ($row['handleTreeColor'] == 'Light green') ? 'selected' : ''; ?>>Light Green</option>
                                                    <option value="Orange" <?php echo ($row['handleTreeColor'] == 'Orange') ? 'selected' : ''; ?>>Orange</option>
                                                    <option value="Blue" <?php echo ($row['handleTreeColor'] == 'Blue') ? 'selected' : ''; ?>>Blue</option>
                                                    <option value="Light blue" <?php echo ($row['handleTreeColor'] == 'Light blue') ? 'selected' : ''; ?>>Light Blue</option>
                                                    <option value="White" <?php echo ($row['handleTreeColor'] == 'White') ? 'selected' : ''; ?>>White</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <label>Substrate Material Lot Number</label>
                                            <input type="text" class="form-control" id="substrateLotNum" placeholder="Enter Substrate Material Lot Number" value="<?php echo $row['substrateLotNum']; ?>" readonly disabled>
                                        </div>

                                        <div class="col-sm">
                                            <label>Handle Tree Material Lot Number</label>
                                            <input type="text" class="form-control" id="handleTreeMaterialNum" placeholder="Enter Tree Material Number" value="<?php echo $row['handleTreeMaterialNum']; ?>" readonly disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label>Swab Handle with Texwipe Logo?</label>
                                            <select class="form-control" id="texwipeLogo" readonly disabled>
                                                <option value="Yes" <?php echo ($row['texwipeLogo'] == 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                <option value="No" <?php echo ($row['texwipeLogo'] == 'No') ? 'selected' : ''; ?>>No</option>
                                            </select>
                                        </div>

                                        <div class="col-sm">
                                            <label>Remarks</label>
                                            <input type="text" class="form-control" id="remarksInprocess" placeholder="Enter Remarks" value="<?php echo $row['remarksInprocess']; ?>" readonly disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="background-color:rgb(27, 102, 201); color: white;">
                                <h3 class="card-title" style="font-weight: bold;">THERMAL BONDING MACHINE PARAMETERS</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <br><label style="margin-left: 20px;">HEATER TEMPERATURE UPPER AND LOWER</label>
                                            </div>

                                            <div class="col-sm">
                                                <label>Minumum</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="TempMin" value="<?php echo htmlspecialchars($user->value1actual($row['TempUpnLowRange'])); ?>" readonly disabled>
                                                    <span class="input-group-text" style="pointer-events: none">°C</span>
                                                </div>
                                            </div>

                                            <div class="col-sm">
                                                <label>Maximum</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="TempMax" value="<?php echo htmlspecialchars($user->value2actual($row['TempUpnLowRange'])); ?>" readonly disabled>
                                                    <span class="input-group-text" style="pointer-events: none">°C</span>
                                                </div>
                                            </div>

                                            <div class="col-sm">
                                                <label>Actual</label><br>
                                                <input type="text" class="form-control" id="actTempUpnLow" placeholder="Enter Actual" value="<?php echo $row['actTempUpnLow']; ?>" readonly disabled>
                                            </div>

                                            <div class="col-sm">
                                                <label>Remarks</label>
                                                <input type="text" class="form-control" id="TempUpnLow" placeholder="" value="<?php echo $row['TempUpnLow']; ?>" readonly disabled>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2">
                                                <br><label style="margin-left: 20px;">Heating Time</label>
                                            </div>

                                            <div class="col-sm"><br>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="HeatMin" value="<?php echo htmlspecialchars($user->value1actual($row['HeatingTimeRange'])); ?>" readonly disabled>
                                                    <span class="input-group-text" style="pointer-events: none">secs</span>
                                                </div>
                                            </div>

                                            <div class="col-sm"><br>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="HeatMax" value="<?php echo htmlspecialchars($user->value2actual($row['HeatingTimeRange'])); ?>" readonly disabled>
                                                    <span class="input-group-text" style="pointer-events: none">secs</span>
                                                </div>
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" class="form-control" id="actHeatingTime" placeholder="Enter Actual" value="<?php echo $row['actHeatingTime']; ?>" readonly disabled>
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" class="form-control" id="HeatingTime" placeholder="" disabled value="<?php echo $row['HeatingTime']; ?>" readonly disabled>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label style="margin-left: 20px;"><br>Heater Open and Swab Handle Fixture Closing</label>
                                            </div>

                                            <div class="col-sm"><br>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="SwabMin" value="<?php echo htmlspecialchars($user->value1actual($row['SwabHandleFixtureRange'])); ?>" readonly disabled>
                                                    <span class="input-group-text" style="pointer-events: none">secs</span>
                                                </div>
                                            </div>

                                            <div class="col-sm"><br>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="SwabMax" value="<?php echo htmlspecialchars($user->value2actual($row['SwabHandleFixtureRange'])); ?>" readonly disabled>
                                                    <span class="input-group-text" style="pointer-events: none">secs</span>
                                                </div>
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" class="form-control" id="actSwabHandleFixture" placeholder="Enter Actual" value="<?php echo $row['actSwabHandleFixture']; ?>" readonly disabled>
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" class="form-control" id="SwabHandleFixture" placeholder="" disabled value="<?php echo $row['SwabHandleFixture']; ?>" readonly disabled>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label style="margin-left: 20px;"><br>Fixture Closing Time</label>
                                            </div>

                                            <div class="col-sm"><br>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="FixtureMin" value="<?php echo htmlspecialchars($user->value1actual($row['FixtureClosingTimeRange'])); ?>" readonly disabled>
                                                    <span class="input-group-text" style="pointer-events: none">secs</span>
                                                </div>
                                            </div>

                                            <div class="col-sm"><br>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="FixtureMax" value="<?php echo htmlspecialchars($user->value2actual($row['FixtureClosingTimeRange'])); ?>" readonly disabled>
                                                    <span class="input-group-text" style="pointer-events: none">secs</span>
                                                </div>
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" class="form-control" id="actFixtureClosingTime" placeholder="Enter Actual" value="<?php echo $row['actFixtureClosingTime']; ?>" readonly disabled>
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" class="form-control" id="FixtureClosingTime" placeholder="" disabled value="<?php echo $row['FixtureClosingTime']; ?>" readonly disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <script>
            function applyStyle(elementId, value) {
                var element = document.getElementById(elementId);
                if (value.toLowerCase() === 'passed') {
                    element.style.backgroundColor = 'green';
                } else if (value.toLowerCase() === 'failed') {
                    element.style.backgroundColor = 'red';
                }
                element.style.color = 'white';
                element.style.fontWeight = 'bold';
            }

            // Apply styles based on the PHP values
            applyStyle('TempUpnLow', "<?php echo $row['TempUpnLow']; ?>");
            applyStyle('HeatingTime', "<?php echo $row['HeatingTime']; ?>");
            applyStyle('SwabHandleFixture', "<?php echo $row['SwabHandleFixture']; ?>");
            applyStyle('FixtureClosingTime', "<?php echo $row['FixtureClosingTime']; ?>");
        </script>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="background-color:rgb(27, 102, 201); color: white;">
                                <h3 class="card-title" style="font-weight: bold;">FUNCTIONALITY</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label style="margin-left: 20px;">Visual Inspection (20 HT)</label>
                                            </div>

                                            <div class="col-sm-2">
                                                <select class="form-control" id="visualInpection" readonly disabled>
                                                    <option value="Passed" <?php echo ($row['visualInpection'] == 'Passed') ? 'selected' : ''; ?>>PASSED</option>
                                                    <option value="Failed" <?php echo ($row['visualInpection'] == 'Failed') ? 'selected' : ''; ?>>FAILED</option>
                                                </select>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm">
                                                    <input type="text" id="remarksVisual" class="form-control actualDataLoop result" placeholder="Enter Remarks" value="<?php echo $row['remarksVisual']; ?>" readonly disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label style="margin-left: 20px;"><br>Resistance of Substrate to Handle Tip (5 locations)</label>
                                            </div>

                                            <div class="col-sm-2"><br>
                                                <select class="form-control" id="resistanceInpection" readonly disabled>
                                                    <option value="Passed" <?php echo ($row['resistanceInpection'] == 'Passed') ? 'selected' : ''; ?>>PASSED</option>
                                                    <option value="Failed" <?php echo ($row['resistanceInpection'] == 'Failed') ? 'selected' : ''; ?>>FAILED</option>
                                                </select>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm"><br>
                                                    <input type="text" id="remarksResistance" class="form-control actualDataLoop result" placeholder="Enter Remarks" value="<?php echo $row['remarksResistance']; ?>" readonly disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2">
                                            </div>

                                            <div class="col-sm-2"><br>
                                                <select class="form-control" id="productionStats" readonly disabled>
                                                    <option value="Continue Production" <?php echo ($row['productionStats'] == 'Continue Production') ? 'selected' : ''; ?>>Continue Production</option>
                                                    <option value="Stop Production" <?php echo ($row['productionStats'] == 'Stop Production') ? 'selected' : ''; ?>>Stop Production</option>
                                                </select>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm"><br>
                                                    <input type="text" id="remarksProduction" class="form-control actualDataLoop result" placeholder="Enter Remarks" value="<?php echo $row['remarksProduction']; ?>" readonly disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <label style="color: red; margin-left: 30px;"> NOTE:</label><br>
                                            <label style="color: red; margin-left: 100px;">Process Inspection:<br>
                                                Any non conformance found requires immediate correction of process, quarantine of affected lot and follow non-conforming SOP.
                                            </label><br><br>

                                            <label style="color: red; margin-left: 100px;">Process and Visual Inspection of Product for each Operator: <br>
                                                QA shall conduct verification if found one (1) reject during visual inspection for each operator. Operator shall do 100% re inspection if found another one (1) similar reject. QA will then verify the re worked products as well as finished goods (if there is any). Follow Non–conforming SOP if reject are still found.
                                            </label><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    <?php }    ?>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li><a type="button" class="btn btn-primary mr-1 fas fa-check-circle btnSave"> Submit </a></li> -->
                        <li><a type="button" class="btn btn-danger mr-1 fas far fa-arrow-alt-circle-left btnBack"> Back </a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    </div>

    <div class="modal fade" id="approveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #111E6C; color: white;">
                    <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                </div>

                <div class="modal-body">
                    Do you to submit this checklist ?
                    <input type="text" id="status" value="Approved" hidden readonly disabled>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataSubmitApprove">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="rejectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #111E6C; color: white;">
                    <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                </div>

                <div class="modal-body">
                    Do you to submit this checklist ?
                    <input type="text" id="status" value="Pending" hidden readonly disabled>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataSubmitReject">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php
    include 'includes/footer.php';
    include  'includes/validation.php';
    ?>

    <script>
        function checkTemperatureRange(inputId, minId, maxId, resultId) {
            document.getElementById(inputId).addEventListener('input', function() {
                // Use min and max input values from the form
                const min = parseFloat(document.querySelector(`#${minId}`).value);
                const max = parseFloat(document.querySelector(`#${maxId}`).value);
                const actual = parseFloat(document.querySelector(`#${inputId}`).value);

                // Determine whether the actual value falls within the range
                const result = (!isNaN(actual) && actual >= min && actual <= max) ? 'PASSED' : actual ? 'FAILED' : '';

                // Get the result element
                const resultElement = document.querySelector(`#${resultId}`);

                // Display the result
                resultElement.value = result;
                resultElement.style.fontWeight = result ? 'bold' : '';
                resultElement.style.backgroundColor = result === 'PASSED' ? 'green' : result === 'FAILED' ? 'red' : '';
                resultElement.style.color = result ? 'white' : '';
            });
        }

        // Call the function for each check with the updated IDs
        checkTemperatureRange('actTempUpnLow', 'TempMin', 'TempMax', 'TempUpnLow');
        checkTemperatureRange('actHeatingTime', 'HeatMin', 'HeatMax', 'HeatingTime');
        checkTemperatureRange('actSwabHandleFixture', 'SwabMin', 'SwabMax', 'SwabHandleFixture');
        checkTemperatureRange('actFixtureClosingTime', 'FixtureMin', 'FixtureMax', 'FixtureClosingTime');

        function compareNumbers(groupIndex) {
            let number1 = parseFloat(document.getElementById("actualDataLoopa" + groupIndex + "1").value) - 0.1;
            let number2 = parseFloat(document.getElementById("actualDataLoopa" + groupIndex + "2").value) + 0.1;
            var number3 = parseFloat(document.getElementById("actualDataLoopa" + groupIndex + "3").value);
            var resultElement = document.getElementById("actualDataLoopResult" + groupIndex);

            if (number3 == "") {
                resultElement.value = "test";
            } else if (isNaN(number2)) {
                if (number3 > number1) {
                    resultElement.value = "Good";
                } else {
                    resultElement.value = "Out of specs";
                }
            } else if ((number1 < number3 && number3 < number2) || (number2 < number3 && number3 < number1)) {
                resultElement.value = "Good";
            } else {
                resultElement.value = "Out of specs";
            }
        }

        $('.select2').select2()

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $(document).on('click', '.btnBack', function() {
            window.location.href = "checklist";
        });

        $(document).on('click', '.btnApprove', function() {
            $("#approveModal").modal("show");
        });

        $(document).on('click', '.btnReject', function() {
            $("#rejectModal").modal("show");
        });

        $(document).on('click', '#dataSubmitApprove ,#dataSubmitReject', function() {
            $("#dataSubmitApprove ,#dataSubmitReject").attr("disabled", true);

            var pick = "18";
            var prod_id = $.trim(encodeURI($("#prod_id").val()));
            var stats = $(this).attr('id') === 'dataSubmitApprove' ? 'Approved' : 'Pending';
            var status = stats;
            var workorder = $.trim(encodeURI($("#workorder").val()));
            var date = $.trim(encodeURI($("#date").val()));
            var time = $.trim(encodeURI($("#time").val()));
            var shift = $.trim(encodeURI($("#shift").val()));
            var operatorName = $.trim(encodeURI($("#operatorName").val()));
            var teamLead = $.trim(encodeURI($("#teamLead").val()));
            var machineNo = $.trim(encodeURI($("#machineNo").val()));
            var product = $.trim(encodeURI($("#product").val()));
            var type = $.trim(encodeURI($("#type").val()));
            var InspectedBY = $.trim(encodeURI($("#InspectedBY").val()));
            var maintenancecheced = $.trim(encodeURI($("#maintenancecheced").val()));
            var handle = $.trim(encodeURI($("#handle").val()));
            var substrate = $.trim(encodeURI($("#substrate").val()));
            var handleTreeColor = $.trim(encodeURI($("#handleTreeColor").val()));
            var substrateLotNum = $.trim(encodeURI($("#substrateLotNum").val()));
            var handleTreeMaterialNum = $.trim(encodeURI($("#handleTreeMaterialNum").val()));
            var texwipeLogo = $.trim(encodeURI($("#texwipeLogo").val()));
            var remarksInprocess = $.trim(encodeURI($("#remarksInprocess").val()));

            let TempInputs = document.querySelectorAll('input[id="TempMin"], input[id="TempMax"]');
            let arrTemp = [];
            TempInputs.forEach((textbox) => {
                arrTemp.push(textbox.value);
            });
            var TempMin = $.trim(encodeURI($("#TempMin").val()));
            var TempMax = $.trim(encodeURI($("#TempMax").val()));
            var actTempUpnLow = $.trim(encodeURI($("#actTempUpnLow").val()));
            var TempUpnLow = $.trim(encodeURI($("#TempUpnLow").val()));

            let HeatInputs = document.querySelectorAll('input[id="HeatMin"], input[id="HeatMax"]');
            let arrHeat = [];
            HeatInputs.forEach((textbox) => {
                arrTemp.push(textbox.value);
            });
            var HeatMin = $.trim(encodeURI($("#HeatMin").val()));
            var HeatMax = $.trim(encodeURI($("#HeatMax").val()));
            var actHeatingTime = $.trim(encodeURI($("#actHeatingTime").val()));
            var HeatingTime = $.trim(encodeURI($("#HeatingTime").val()));

            let SwabInputs = document.querySelectorAll('input[id="SwabMin"], input[id="SwabMax"]');
            let arrSwab = [];
            SwabInputs.forEach((textbox) => {
                arrTemp.push(textbox.value);
            });
            var SwabMin = $.trim(encodeURI($("#SwabMin").val()));
            var SwabMax = $.trim(encodeURI($("#SwabMax").val()));
            var actSwabHandleFixture = $.trim(encodeURI($("#actSwabHandleFixture").val()));
            var SwabHandleFixture = $.trim(encodeURI($("#SwabHandleFixture").val()));

            let FixtureInputs = document.querySelectorAll('input[id="FixtureMin"], input[id="FixtureMax"]');
            let arrFixture = [];
            FixtureInputs.forEach((textbox) => {
                arrTemp.push(textbox.value);
            });
            var FixtureMin = $.trim(encodeURI($("#FixtureMin").val()));
            var FixtureMax = $.trim(encodeURI($("#FixtureMax").val()));
            var actFixtureClosingTime = $.trim(encodeURI($("#actFixtureClosingTime").val()));
            var FixtureClosingTime = $.trim(encodeURI($("#FixtureClosingTime").val()));

            var productionStats = $.trim(encodeURI($("#productionStats").val()));
            var remarksProduction = $.trim(encodeURI($("#remarksProduction").val()));
            var visualInpection = $.trim(encodeURI($("#visualInpection").val()));
            var remarksVisual = $.trim(encodeURI($("#remarksVisual").val()));
            var resistanceInpection = $.trim(encodeURI($("#resistanceInpection").val()));
            var remarksResistance = $.trim(encodeURI($("#remarksResistance").val()));

            var fd = new FormData();
            fd.append('pick', pick);
            fd.append('prod_id', prod_id);
            fd.append('status', status);
            fd.append('workorder', workorder);
            fd.append('date', date);
            fd.append('time', time);
            fd.append('shift', shift);
            fd.append('operatorName', operatorName);
            fd.append('teamLead', teamLead);
            fd.append('machineNo', machineNo);
            fd.append('product', product);
            fd.append('type', type);
            fd.append('InspectedBY', InspectedBY);
            fd.append('maintenancecheced', maintenancecheced);
            fd.append('handle', handle);
            fd.append('substrate', substrate);
            fd.append('handleTreeColor', handleTreeColor);
            fd.append('substrateLotNum', substrateLotNum);
            fd.append('handleTreeMaterialNum', handleTreeMaterialNum);
            fd.append('texwipeLogo', texwipeLogo);
            fd.append('remarksInprocess', remarksInprocess);
            fd.append('arrTemp', arrTemp);
            fd.append('actTempUpnLow', actTempUpnLow);
            fd.append('TempUpnLow', TempUpnLow);
            fd.append('arrHeat', arrHeat);
            fd.append('actHeatingTime', actHeatingTime);
            fd.append('HeatingTime', HeatingTime);
            fd.append('arrSwab', arrSwab);
            fd.append('actSwabHandleFixture', actSwabHandleFixture);
            fd.append('SwabHandleFixture', SwabHandleFixture);
            fd.append('arrFixture', arrFixture);
            fd.append('actFixtureClosingTime', actFixtureClosingTime);
            fd.append('FixtureClosingTime', FixtureClosingTime);
            fd.append('productionStats', productionStats);
            fd.append('remarksProduction', remarksProduction);
            fd.append('visualInpection', visualInpection);
            fd.append('remarksVisual', remarksVisual);
            fd.append('resistanceInpection', resistanceInpection);
            fd.append('remarksResistance', remarksResistance);

            // for (let pair of fd.entries()) {
            //     console.log(pair[0] + ": " + pair[1]);
            // }

            $.ajax({
                url: "../pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(result) {
                    if ($.trim(result) != 0) {
                        $.notify("Account Created Successfully ", "success");
                        setTimeout(function() {
                            window.location.href = "checklist";
                        }, 2000);
                    } else {
                        $.notify("Problem Encounter! please contact your administrator", "error");
                        $("#dataSubmitDelete").attr("disabled", false);
                    }
                }
            });
        });

        function cuttonforce() {
            var cuttingforce1 = document.getElementsByClassName("cuttingforce1");
            var cuttingforce2 = document.getElementsByClassName("cuttingforce2");
            var cuttingforce3 = document.getElementsByClassName("cuttingforce3");
            var cuttingforcevalidation = document.getElementsByClassName("cuttingforcevalidation");

            cuttingforcevalidation.textContent = "Out of specs";
        }

        $(document).on('click', '#toggleButton', function() {
            var textbox = document.getElementById("myTextbox");
            var textbox2 = document.getElementById("myTextbox2");
            textbox.disabled = !textbox.disabled;
            textbox2.disabled = !textbox2.disabled;
        });
    </script>