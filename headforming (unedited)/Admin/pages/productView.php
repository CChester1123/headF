<title>View Product</title>
    <?php 

        $prod_id = base64_decode($_GET['id']);
        include 'includes/header.php'; 

        $sql=$user->ViewEditProduct($prod_id);
        while($row=mysqli_fetch_array($sql)){
     ?>
    

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> View Products</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label>Product Name</label>
                            <input type="text" class="form-control" id="product" placeholder="Enter Product Name" value="<?php echo $row['productname']; ?>" readonly>
                        </div>
                        <div class="col-sm">
                            <label>Product Description</label>
                            <input type="text" class="form-control" id="productDesc" placeholder="Enter Product Description" value="<?php echo $row['productDesc']; ?>" readonly>
                        </div>
                        <div class="col-sm">
                            <label>status</label>
                            <input type="text" class="form-control" id="status" placeholder="Enter Product Description" value="<?php echo $row['status']; ?>" readonly>
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
              <!-- /.card-header -->
              <div class="card-body">

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label>Handle</label>
                            <input type="text" class="form-control" id="handle" placeholder="Enter Handle" value="<?php echo $row['handle']; ?>" readonly>
                        </div>
                        <div class="col-sm">
                            <label>Substrate</label>
                            <input type="text" class="form-control" id="subtrate" placeholder="Enter Substrate" value="<?php echo $row['substrate']; ?>" readonly>
                        </div>
                    </div>
                </div>                          

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm">
                                <label>Handle Tree Color</label>
                                <input type="text" class="form-control" id="handleColor" placeholder="Enter Handle Color"  value="<?php echo $row['handleColor']; ?>" readonly >
                            </div>

                            <div class="col-sm">
                                <label>Substrate Material Lot Number</label>
                                <input type="text" class="form-control" id="substrateLotNum" placeholder="Enter Substrate Material Lot Number" value="<?php echo $row['substrateLotNum']; ?>"readonly>
                            </div>
                            <div class="col-sm">
                                <label>Handle Tree Material Lot Number</label>
                                <input type="text" class="form-control" id="handleTreeMaterialNum" placeholder="Enter Tree Material Number" value="<?php echo $row['handleTreeMaterialNum']; ?>"  readonly>
                            </div> 

                        </div>
                    </div>          

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm">
                                <label>Handle Tree Material Type</label>
                                <input type="text" class="form-control" id="machineTreeMatType" placeholder="Enter Handle Tree Material Type" value="<?php echo $row['machineTreeMatType']; ?>" readonly >
                            </div>

                            <div class="col-sm">
                                <label>Substrate Material Type</label>
                                <input type="text" class="form-control" id="substrateType" placeholder="Enter Handle Material Type" value="<?php echo $row['substrateType']; ?>" readonly>
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
                <h3 class="card-title">STANDARD PARAMETER </h3>
              </div>

              <div class="card-body">
                <div class="form-group">
                    <label style="color: #111E6C;">HEADFORMING MACHINE</label>
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
                                 <input type="text" class="form-control" id="cuttingforce" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['cuttingforceRange']);?>" readonly>
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
                                 <input type="text" class="form-control" id="cuttingforce" placeholder="Enter Maximum"  value="<?php echo $user->value2Actual($row['cuttingforceRange']);?>" readonly >
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
                                 <input type="text" class="form-control" id="sealingtime" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['sealingtimeRange']);?>" readonly >
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
                                 <input type="text" class="form-control" id="sealingtime" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['sealingtimeRange']);?>" readonly >
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
                                 <input type="text" class="form-control" id="cuttingspeed" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['cuttingspeedRange']);?>" readonly>
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
                                 <input type="text" class="form-control" id="cuttingspeed" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['cuttingspeedRange']);?>" readonly>
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
                                 <input type="text" class="form-control" id="approachingposition" placeholder="Enter Minimum"  value="<?php echo $user->value1Actual($row['approachingpositionRange']);?>" readonly>
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
                                 <input type="text" class="form-control" id="approachingposition" placeholder="Enter Maximum"  value="<?php echo $user->value2Actual($row['approachingpositionRange']);?>" readonly>
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
                                 <input type="text" class="form-control" id="sealingpositionspeed" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['sealingpositionspeedRange']);?>" readonly>
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
                                 <input type="text" class="form-control" id="sealingpositionspeed" placeholder="Enter Maximum"  value="<?php echo $user->value2Actual($row['sealingpositionspeedRange']);?>" readonly>
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
                                 <input type="text" class="form-control" id="sealingposition" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['sealingpositionRange']);?>" readonly>
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
                                 <input type="text" class="form-control" id="sealingposition" placeholder="Enter Maximum"  value="<?php echo $user->value2Actual($row['sealingpositionRange']);?>" readonly>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div> 

<!--                 <div class="form-group">
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
                                    <input type="checkbox" value="Position" class="form-control" <?php if($user->value1Actual($row['mode']) == "Position") { echo "checked" ; } ?> disabled>
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
                                    <input type="checkbox" value = "Pressure" class="form-control" <?php if($user->value2Actual($row['mode']) == "Pressure") { echo "checked" ; } ?> disabled> 
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
                               
                                 <input type="text" class="form-control" id="moldopenspeed" placeholder="Enter Mold Open Speed (mm/s)" value="<?php echo $row['moldopenspeedRange'];?>" readonly >
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
                                 <input type="text" class="form-control" id="watertemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['watertempRange']);?>" readonly>
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
                                 <input type="text" class="form-control" id="watertemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['watertempRange']);?>" readonly>
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
                                 <input type="text" class="form-control" id="airpressure" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['airpressureRange']);?>" readonly>
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
                                 <input type="text" class="form-control" id="airpressure" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['airpressureRange']);?>" readonly>
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
                                 <input type="text" class="form-control" id="upperheatertemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['upperheattempRange']);?>" readonly>
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
                                 <input type="text" class="form-control" id="upperheatertemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['upperheattempRange']);?>" readonly>
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
                                 <input type="text" class="form-control" id="lowerheatertemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['lowerheattempRange']);?>" readonly>
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
                                 <input type="text" class="form-control" id="lowerheatertemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['lowerheattempRange']);?>" readonly>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div> 
 -->
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
                                 <input type="text" class="form-control" id="uppermoldtemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['uppermoldtempRange']);?>" readonly>
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
                                 <input type="text" class="form-control" id="uppermoldtemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['uppermoldtempRange']);?>" readonly>
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
                                 <input type="text" class="form-control" id="lowermoldtemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['lowermoldtempRange']);?>" readonly >
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
                                 <input type="text" class="form-control" id="lowermoldtemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['lowermoldtempRange']);?>" readonly >
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

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
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
                                     <input type="text" class="form-control" id="totalLength" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['totallengthRange']);?>" readonly >
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
                                     <input type="text" class="form-control" id="totalLength" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['totallengthRange']);?>" readonly>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div> <br>
                    
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
                                     <input type="text" class="form-control" id="swabheadlength" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['swabheadlengthRange']);?>" readonly>
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
                                     <input type="text" class="form-control" id="swabheadlength" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['swabheadlengthRange']);?>" readonly>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>  

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
                                     <input type="text" class="form-control" id="swabheadwidth" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['swabheadwidthRange']);?>" readonly>
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
                                     <input type="text" class="form-control" id="swabheadwidth" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['swabheadwidthRange']);?>" readonly>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                                       
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
                                     <input type="text" class="form-control" id="swabheadthickness" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['swabheadthicknessRange']);?>" readonly>
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
                                     <input type="text" class="form-control" id="swabheadthickness" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['swabheadthicknessRange']);?>" readonly>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                                       
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
                                     <input type="text" class="form-control" id="swabhandlewidth" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['swabhandlewidthRange']);?>" readonly>
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
                                     <input type="text" class="form-control" id="swabhandlewidth" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['swabhandlewidthRange']);?>" readonly>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                                       
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
                                     <input type="text" class="form-control" id="swabhandlethickness" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['swabhandlethicknessRange']);?>" readonly>
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
                                     <input type="text" class="form-control" id="swabhandlethickness" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['swabhandlethicknessRange']);?>" readonly>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                                       
                    <div class="form-group" >
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
                                     <input type="text" class="form-control" id="swabhandlediameter" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['swabheaddiameterRange']);?>" readonly>
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
                                     <input type="text" class="form-control" id="swabhandlediameter" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['swabheaddiameterRange']);?>" readonly>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
 <!--                    </div> 
                    <br><hr> -->


                </div>   

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
                                     <input type="text" class="form-control" id="substrateDimention" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['substrateDimention']);?>" readonly>
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
                                     <input type="text" class="form-control" id="substrateDimention" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['substrateDimention']);?>" readonly>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div> 

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
                                     <input type="text" class="form-control" id="pullSeatTest" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['pullSeatTest']);?>" readonly>
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
                                     <input type="text" class="form-control" id="pullSeatTest" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['pullSeatTest']);?>" readonly>
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
<!--  -->
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
                               <label style="margin-left: 20px;" >No. of Tips per HT</label>
                            </div>
                            <div class="col-sm">
                               <input type="text" class="form-control" id="noHandleperHT" placeholder="Enter Handles" value="<?php echo $row['noofsample']; ?>" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm">
                                <input type="text" list="employees" name="pulltest" class="form-control emp_id" id="pulltest" value="<?php

                                    $string = $user->value1Actual($row['pulltestdesc']);
                                 $search = ['&gt;', '&ge;', '=&gt;', '&amp;gt;'];
$replace = ['>', '>=', '>','>']; // Ensure replacements match the intended symbols

$result = str_replace($search, $replace, $string);

echo $result ; ;?>" readonly>
                                
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm-2">
                                     Min
                                    </div>
                                    <div class="col-sm-9">
                                     <input type="text" class="form-control" id="pulltest" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['pullTest']);?>" readonly>
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
                                     <input type="text" class="form-control" id="pulltest" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['pullTest']);?>" readonly >
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
                                        <select class="form-control" id="swabheadpulling" disabled>
                                            <option value="<?php echo $user->value1Actual($row['swabheadpullingRange']);?>"><?php 
                                          


                                        $string =  $user->value1Actual($row['swabheadpullingRange']);
$search = ['&gt;', '&ge;', '=&gt;', '&amp;gt;'];
$replace = ['>', '>=', '=>','=>']; // Ensure replacements match the intended symbols

$result = str_replace($search, $replace, $string);

echo $result ;

?></option>
                                            <option value="N/A">N/A</option>
                                            <option value="GOOD">GOOD</option>
                                            <option value="NO-GOOD">NO-GOOD</option>
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
                                        <select class="form-control" id="swabheadpulling" disabled>
                                            <option value="<?php echo $user->value1Actual($row['swabheadpullingRange']);?>"><?php echo $user->value2Actual($row['swabheadpullingRange']);?></option>
                                            <option value="N/A">N/A</option>
                                            <option value="GOOD">GOOD</option>
                                            <option value="NO-GOOD">NO-GOOD</option>
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
                                        <select class="form-control" id="swabheadpopping" disabled>
                                            <option value="<?php echo $user->value1Actual($row['swabheadpullingRange']);?>"><?php echo $user->value1Actual($row['swabheadpoppingRange']);?></option>
                                            <option value="N/A">N/A</option>
                                            <option value="GOOD">GOOD</option>
                                            <option value="NO-GOOD">NO-GOOD</option>
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
                                        <select class="form-control" id="swabheadpopping" disabled>
                                            <option value="<?php echo $user->value1Actual($row['swabheadpullingRange']);?>"><?php echo $user->value2Actual($row['swabheadpoppingRange']);?></option>
                                            <option value="N/A">N/A</option>
                                            <option value="GOOD">GOOD</option>
                                            <option value="NO-GOOD">NO-GOOD</option>
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

<?php } ?>

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
     
          </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        
                        <li><a type="button" class="btn btn-danger mr-1 fas far fa-arrow-alt-circle-left btnBack"> Back </a></li>
                    </ol>
                </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>

       <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"style="background-color: #111E6C; color: white;">
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
    $(document).on('click','.btnBack',function(){ 
        window.location.href = "products2";
    });
</script>