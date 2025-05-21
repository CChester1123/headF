<title>View Product</title>
<?php
$prod_id = base64_decode($_GET['id']);
include 'includes/header.php';

$sql = $user->ViewEditProduct($prod_id);
while ($row = mysqli_fetch_array($sql)) {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <input type="text" class="form-control" id="deptType" placeholder="Enter Product Description" value="<?php echo $deptType = $row['department']; ?>" readonly hidden>
            <?php if ($deptType == "Head Forming") { ?>
              <h1 style="font-weight: bold;">HEAD FORMING PRODUCT VIEW</h1>
            <?php } else if ($deptType == "Thermal Bonding") { ?>
              <h1 style="font-weight: bold;">THERMAL BONDING PRODUCT VIEW</h1>
            <?php } else { ?>
              <h1 style="font-weight: bold;">SWAB ASSEMBLY PRODUCT VIEW</h1>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm">
                      <label>Product Name</label>
                      <input type="text" class="form-control" id="product" placeholder="Enter Product Name" value="<?php echo $row['productname']; ?>" readonly disabled>
                    </div>

                    <div class="col-sm">
                      <label>Product Description</label>
                      <input type="text" class="form-control" id="productDesc" placeholder="Enter Product Description" value="<?php echo $row['productDesc']; ?>" readonly disabled>
                    </div>

                    <div class="col-sm" style="margin-top: 0px;">
                      <label for="deptType"><?php echo htmlspecialchars($row['department']); ?></label>
                      <select class="form-control" id="status" value="<?php echo $row['status']; ?>" readonly disabled>
                        <option value="Active" <?php echo ($row['status'] == 'Active') ? 'selected' : ''; ?>>Active</option>
                        <option value="Inactive" <?php echo ($row['status'] == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
                      </select>
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
              <div class="card-header" style="background-color: #111E6C; color: white;">
                <h3 class="card-title">RAW MATERIAL </h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm">
                      <label>Handle</label>
                      <input type="text" class="form-control" id="handle" placeholder="Enter Handle" value="<?php echo $row['handle']; ?>" readonly disabled>
                    </div>

                    <div class="col-sm">
                      <label>Substrate</label>
                      <input type="text" class="form-control" id="subtrate" placeholder="Enter Substrate" value="<?php echo $row['substrate']; ?>" readonly disabled>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm">
                      <label>Handle Tree Color</label>
                      <?php if ($deptType == "Head Forming") { ?>
                        <select class="form-control" id="handleColor" readonly disabled>
                          <option value="Light green" <?php echo ($row['handleTreeColor'] == 'Light green') ? 'selected' : ''; ?>>Light Green</option>
                          <option value="Orange" <?php echo ($row['handleTreeColor'] == 'Orange') ? 'selected' : ''; ?>>Orange</option>
                          <option value="Blue" <?php echo ($row['handleTreeColor'] == 'Blue') ? 'selected' : ''; ?>>Blue</option>
                          <option value="Light Blue" <?php echo ($row['handleTreeColor'] == 'Light Blue') ? 'selected' : ''; ?>>Light Blue</option>
                          <option value="White" <?php echo ($row['handleTreeColor'] == 'White') ? 'selected' : ''; ?>>White</option>
                        </select>
                      <?php } elseif ($deptType == "Thermal Bonding") { ?>
                        <select class="form-control" id="handleColor" readonly disabled>
                          <option value="Light green" <?php echo ($row['handleTreeColor'] == 'Light green') ? 'selected' : ''; ?>>Light Green</option>
                          <option value="Orange" <?php echo ($row['handleTreeColor'] == 'Orange') ? 'selected' : ''; ?>>Orange</option>
                          <option value="Blue" <?php echo ($row['handleTreeColor'] == 'Blue') ? 'selected' : ''; ?>>Blue</option>
                          <option value="Light Blue" <?php echo ($row['handleTreeColor'] == 'Light Blue') ? 'selected' : ''; ?>>Light Blue</option>
                          <option value="White" <?php echo ($row['handleTreeColor'] == 'White') ? 'selected' : ''; ?>>White</option>
                        </select>
                      <?php } else if ($deptType == "Swab Assembly") { ?>
                        <select class="form-control" id="handleColor" readonly disabled>
                          <option value="Light Green" <?php echo ($row['handleTreeColor'] == 'Light Green') ? 'selected' : ''; ?>>Light Green</option>
                          <option value="Black" <?php echo ($row['handleTreeColor'] == 'Black') ? 'selected' : ''; ?>>Black</option>
                          <option value="Light Blue" <?php echo ($row['handleTreeColor'] == 'Light Blue') ? 'selected' : ''; ?>>Light Blue</option>
                          <option value="Brown" <?php echo ($row['handleTreeColor'] == 'Brown') ? 'selected' : ''; ?>>Brown</option>
                          <option value="White" <?php echo ($row['handleTreeColor'] == 'White') ? 'selected' : ''; ?>>White</option>
                        </select>
                      <?php } ?>
                    </div>

                    <div class="col-sm">
                      <label>Substrate Material Lot Number</label>
                      <input type="text" class="form-control" id="substrateLotNum" placeholder="Enter Substrate Material Lot Number" value="<?php echo $row['substrateMatLotNum']; ?>" readonly disabled>
                    </div>

                    <div class="col-sm">
                      <label>Handle Tree Material Lot Number</label>
                      <input type="text" class="form-control" id="handleTreeMaterialNum" placeholder="Enter Tree Material Number" value="<?php echo $row['handleTreeMatLotNum']; ?>" readonly disabled>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm">
                      <label>Handle Tree Material Type</label>
                      <input type="text" class="form-control" id="machineTreeMatType" placeholder="Enter Handle Tree Material Type" value="<?php echo $row['machineTreeMatType']; ?>" readonly disabled>
                    </div>

                    <div class="col-sm">
                      <label>Substrate Material Type</label>
                      <input type="text" class="form-control" id="substrateType" placeholder="Enter Handle Material Type" value="<?php echo $row['substrateType']; ?>" readonly disabled>
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
            <?php
            if ($deptType == "Head Forming") {
              echo '<div class="card">
            <div class="card-header" style="background-color: #111E6C; color: white;">
              <h3 class="card-title">STANDARD PARAMETER</h3>
            </div>

            <div class="card-body">
              <div class="form-group">
                <label style="color: #111E6C;">HEAD FORMING MACHINE</label>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Cutting Force (ton)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="cuttingforce" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1Actual($row['cuttingforceRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="cuttingforce" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2Actual($row['cuttingforceRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Sealing Time (sec)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="sealingtime" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1Actual($row['sealingtimeRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="sealingtime" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['sealingtimeRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Cutting Speed (mm/s)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="cuttingspeed" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1Actual($row['cuttingspeedRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="cuttingspeed" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2Actual($row['cuttingspeedRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Approaching Position (mm/s)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="approachingposition" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1Actual($row['approachingpositionRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="approachingposition" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2Actual($row['approachingpositionRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Sealing Position Speed (mm/s)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="sealingpositionspeed" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['sealingpositionspeedRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="sealingpositionspeed" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['sealingpositionspeedRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Sealing Position (mm/s)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="sealingposition" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['sealingpositionRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="sealingposition" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['sealingpositionRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Mode</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-5">
                          Position
                        </div>
                        <div class="col-sm-5">
                          <input type="checkbox" value="Position" class="form-control" ' . (htmlspecialchars($user->value1actual($row['mode'])) == 'Position' ? 'checked' : '') . ' readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-5">
                          Pressure
                        </div>
                        <div class="col-sm-5">
                          <input type="checkbox" value="Pressure" class="form-control" ' . (htmlspecialchars($user->value1actual($row['mode'])) == 'Pressure' ? 'checked ' : '') . (htmlspecialchars($user->value2actual($row['mode'])) != null ? 'checked ' : '') . ' readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Mold Open Speed (mm/s)</label>
                  </div>
                  <div class="col-sm-8">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm">

                          <input type="text" class="form-control" id="moldopenspeed" placeholder="Enter Mold Open Speed (mm/s)" value="' . htmlspecialchars($user->value1actual($row['moldopenspeedRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Water Temperature (°C)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="watertemp" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['watertempRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="watertemp" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['watertempRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Air Pressure (psi)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="airpressure" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['airpressureRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="airpressure" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['airpressureRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Upper Heater Temperature (°C)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="upperheatertemp" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['upperheattempRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="upperheatertemp" placeholder="Enter Maximum"  value="' . htmlspecialchars($user->value2actual($row['upperheattempRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Lower Heater Temperature (°C)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="lowerheatertemp" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['lowerheattempRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="lowerheatertemp" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['lowerheattempRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Upper Mold Temperature (°C)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="uppermoldtemp" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['uppermoldtempRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="uppermoldtemp" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['uppermoldtempRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Lower Mold Temperature (°C)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="lowermoldtemp" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['lowermoldtempRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="lowermoldtemp" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['lowermoldtempRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>';
            } else if ($deptType == "Thermal Bonding") {
              echo '<div class="card">
            <div class="card-header" style="background-color: #111E6C; color: white;">
              <h3 class="card-title">STANDARD PARAMETER </h3>
            </div>

            <div class="card-body">
              <div class="form-group">
                <label style="color: #111E6C;">THERMAL BONDING MACHINE</label>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Heater Temperature Upper and Lower</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="heaterTempUpnLow" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['heaterTempUpnLowRange'])) . '" readonly disabled> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="heaterTempUpnLow" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['heaterTempUpnLowRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Heating Time</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="heatingTime" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['heatingTimeRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="heatingTime" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value2actual($row['heatingTimeRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Heater Open And Swab Handle Fixture Closing</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="heaterSwabHandleFixture" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['heaterSwabHandleFixtureRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="heaterSwabHandleFixture" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['heaterSwabHandleFixtureRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Fixture Closing Time</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="fixtureClosingTime" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['fixtureClosingTimeRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="fixtureClosingTime" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['fixtureClosingTimeRange'])) . '" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          </div>';
            }
            ?>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php
            if ($deptType == "Head Forming") {
              echo '
    <div class="card">
        <div class="card-header" style="background-color: #111E6C; color: white;">
            <h3 class="card-title"> DIMENSIONS </h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label style="margin-left: 20px;">Total Length (head+subtrate)(mm)</label>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Min
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="totalLength" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['totallengthRange'])) . '" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Max
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="totalLength" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['totallengthRange'])) . '" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <br>

                <!-- Repeat the same structure for other fields -->
                <!-- Swab Head Length -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label style="margin-left: 20px;">Swab Head Length (mm)</label>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Min
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="swabheadlength" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['swabheadlengthRange'])) . '" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Max
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="swabheadlength" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['swabheadlengthRange'])) . '" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Swab Head Width -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label style="margin-left: 20px;">Swab Head Width (mm)</label>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Min
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="swabheadwidth" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['swabheadwidthRange'])) . '" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Max
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="swabheadwidth" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['swabheadwidthRange'])) . '" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Swab Head Thickness -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label style="margin-left: 20px;">Swab HeadThickness (mm)</label>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Min
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="swabheadthickness" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['swabheadthicknessRange'])) . '" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Max
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="swabheadthickness" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['swabheadthicknessRange'])) . '" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>

                <!-- Swab Handle Width -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label style="margin-left: 20px;">Swab Handle Width (mm)</label>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Min
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="swabhandlewidth" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['swabhandlewidthRange'])) . '" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Max
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="swabhandlewidth" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['swabhandlewidthRange'])) . '" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Swab Handle Thickness -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label style="margin-left: 20px;">Swab Handle Thickness (mm)</label>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Min
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="swabhandlethickness" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['swabhandlethicknessRange'])) . '" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Max
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="swabhandlethickness" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['swabhandlethicknessRange'])) . '" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Swab Handle Diameter -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label style="margin-left: 20px;">Swab handle Diameter (mm)</label>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Min
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="swabhandlediameter" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['swabheaddiameterRange'])) . '" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Max
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="swabhandlediameter" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['swabheaddiameterRange'])) . '" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Swab Dimension Specs -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label style="margin-left: 20px;">Swab Dimension Specs (1ht, 5 tips)</label>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Min
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="substrateDimention" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['swabdimensionspecsRange'])) . '" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Max
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="substrateDimention" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['swabdimensionspecsRange'])) . '" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pull / Seal Strength Specs -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label style="margin-left: 20px;">Pull / Seal Strength Specs (1ht, 5 tips) </label>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Min
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="pullSeatTest" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['swabdimensionspecsRange'])) . '" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Max
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="pullSeatTest" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['pull/sealstrengthspecsRange'])) . '" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';
            }
            ?>
          </div>
        </div>
      </div>
    </section>

    <?php if ($deptType == "Swab Assembly") {
      echo '<section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header" style="background-color: #111E6C; color: white;">
                      <h3 class="card-title">PARAMETER</h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-sm">
                              <label style="margin-left: 20px;">Pull Testing</label>
                            </div>
                            <div class="col-sm">
                              <div class="container">
                                <div class="row">
                                  <div class="col-sm-2">
                                    Min
                                  </div>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pulltestingMin" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['pulltestingMin'])) . '" readonly disabled>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm">
                              <div class="container">
                                <div class="row">
                                  <div class="col-sm-2">
                                  </div>
                                  <div class="col-sm-9">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  </section>';
    } ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header" style="background-color: #111E6C; color: white;">
                <h3 class="card-title"> FUNCTIONALITY </h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-4">
                        <label style="margin-left: 20px;">No. of Tips per HT</label>
                      </div>

                      <div class="col-sm">
                        <input type="number" class="form-control" id="noHandleperHT" placeholder="Enter Handles" value="<?php echo htmlspecialchars($user->value1actual($row['noofsample'])); ?>" readonly disabled>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm">
                        <input type="text" list="employees" name="pulltest" class="form-control emp_id" id="pulltestdesc"
                          value="<?php echo htmlspecialchars($user->value1actual($row['pulltestdesc'])); ?>" readonly disabled>
                        <datalist id="employees">
                          <option value="Pull Test" <?php echo ($row['pulltestdesc'] == 'Pull Test') ? 'selected' : ''; ?>>Pull Test</option>
                          <option value="Seal Strength" <?php echo ($row['pulltestdesc'] == 'Seal Strength') ? 'selected' : ''; ?>>Seal Strength</option>
                        </datalist>
                      </div>

                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Min
                            </div>

                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="pulltest" placeholder="Enter Minimum" value="<?php echo htmlspecialchars($user->value1actual($row['pullTest'])); ?>" readonly disabled>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Max
                            </div>

                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="pulltest" placeholder="Enter Maximum" value="<?php echo htmlspecialchars($user->value2actual($row['pullTest'])); ?>" readonly disabled>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm">
                        <label style="margin-left: 20px;">Swab Head Pulling</label>
                      </div>

                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Min
                            </div>

                            <div class="col-sm-9">
                              <select class="form-control" id="swabheadpulling" value="<?php echo htmlspecialchars($user->value1actual($row['swabheadpullingRange'])); ?>" readonly disabled>
                                <option value="N/A" <?php echo ($user->value1actual($row['swabheadpullingRange']) == 'N/A') ? 'selected' : ''; ?>>N/A</option>
                                <option value="GOOD" <?php echo ($user->value1actual($row['swabheadpullingRange']) == 'GOOD') ? 'selected' : ''; ?>>GOOD</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Max
                            </div>

                            <div class="col-sm-9">
                              <select class="form-control" id="swabheadpulling" value="<?php echo htmlspecialchars($user->value2actual($row['swabheadpullingRange'])); ?>" readonly disabled>
                                <option value="N/A" <?php echo ($user->value2actual($row['swabheadpullingRange']) == 'N/A') ? 'selected' : ''; ?>>N/A</option>
                                <option value="GOOD" <?php echo ($user->value2actual($row['swabheadpullingRange']) == 'GOOD') ? 'selected' : ''; ?>>GOOD</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm">
                        <label style="margin-left: 20px;">Swab Head Popping</label>
                      </div>

                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Min
                            </div>

                            <div class="col-sm-9">
                              <select class="form-control" id="swabheadpopping" value="<?php echo htmlspecialchars($user->value1actual($row['swabheadpoppingRange'])); ?>" readonly disabled>
                                <option value="N/A" <?php echo ($user->value1actual($row['swabheadpoppingRange']) == 'N/A') ? 'selected' : ''; ?>>N/A</option>
                                <option value="GOOD" <?php echo ($user->value1actual($row['swabheadpoppingRange']) == 'GOOD') ? 'selected' : ''; ?>>GOOD</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Max
                            </div>

                            <div class="col-sm-9">
                              <select class="form-control" id="swabheadpopping" value="<?php echo htmlspecialchars($user->value2actual($row['swabheadpoppingRange'])); ?>" readonly disabled>
                                <option value="N/A" <?php echo ($user->value2actual($row['swabheadpoppingRange']) == 'N/A') ? 'selected' : ''; ?>>N/A</option>
                                <option value="GOOD" <?php echo ($user->value2actual($row['swabheadpoppingRange']) == 'GOOD') ? 'selected' : ''; ?>>GOOD</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li><a type="button" class="btn btn-primary mr-1 fas fa-check-circle btnSave"> Save </a></li> -->
              <li><a type="button" class="btn btn-danger mr-1 fas far fa-arrow-alt-circle-left btnBack"> Back </a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php } ?>

<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #111E6C; color: white;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
      </div>

      <div class="modal-body">
        Do you to create this product ?
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="dataSubmitDelete">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
</div>

<?php include 'includes/footer.php'; ?>

<script>
  $(document).on('click', '.btnBack', function() {
    window.location.href = "products2";
  });
</script>