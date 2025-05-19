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
            <h1> Edit Products</h1>
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
                            <input type="text" class="form-control" id="product" placeholder="Enter Product Name" value="<?php echo $row['productname']; ?>" >
                        </div>
                        <div class="col-sm">
                            <label>Product Description</label>
                            <input type="text" class="form-control" id="productDesc" placeholder="Enter Product Description" value="<?php echo $row['productDesc']; ?>" >
                        </div>
                        <div class="col-sm">
                            <label>status</label>
                            <select class="form-control" id="status" >            
                                <option value="Active"  <?php if($row['status'] == 'Active'){ echo "Selected"; }?> >Active</option>
                                <option value="Inactive" <?php if($row['status'] == 'Inactive'){ echo "Selected"; }?>>Inactive</option>
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
              <!-- /.card-header -->
              <div class="card-body">

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label>Handle</label>
                            <input type="text" class="form-control" id="handle" placeholder="Enter Handle" value="<?php echo $row['handle']; ?>" >
                        </div>
                        <div class="col-sm">
                            <label>Substrate</label>
                            <input type="text" class="form-control" id="subtrate" placeholder="Enter Substrate" value="<?php echo $row['substrate']; ?>" >
                        </div>
                    </div>
                </div>       

                                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm">
                                <label>Handle Tree Color</label>
                                <input type="text" class="form-control" id="handleColor" placeholder="Enter Handle Color"  value="<?php echo $row['handleColor']; ?>"  >
                            </div>

                            <div class="col-sm">
                                <label>Substrate Material Lot Number</label>
                                <input type="text" class="form-control" id="substrateLotNum" placeholder="Enter Substrate Material Lot Number" value="<?php echo $row['substrateLotNum']; ?>">
                            </div>
                            <div class="col-sm">
                                <label>Handle Tree Material Lot Number</label>
                                <input type="text" class="form-control" id="handleTreeMaterialNum" placeholder="Enter Tree Material Number" value="<?php echo $row['handleTreeMaterialNum']; ?>"  >
                            </div> 

                        </div>
                    </div>          

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm">
                                <label>Handle Tree Material Type</label>
                                <input type="text" class="form-control" id="machineTreeMatType" placeholder="Enter Handle Tree Material Type" value="<?php echo $row['machineTreeMatType']; ?>"  >
                            </div>

                            <div class="col-sm">
                                <label>Substrate Material Type</label>
                                <input type="text" class="form-control" id="substrateType" placeholder="Enter Handle Material Type" value="<?php echo $row['substrateType']; ?>" >
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
                                 <input type="text" class="form-control" id="cuttingforce" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['cuttingforceRange']);?>" >
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
                                 <input type="text" class="form-control" id="cuttingforce" placeholder="Enter Maximum"  value="<?php echo $user->value2Actual($row['cuttingforceRange']);?>"  >
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
                                 <input type="text" class="form-control" id="sealingtime" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['sealingtimeRange']);?>"  >
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
                                 <input type="text" class="form-control" id="sealingtime" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['sealingtimeRange']);?>"  >
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
                                 <input type="text" class="form-control" id="cuttingspeed" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['cuttingspeedRange']);?>" >
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
                                 <input type="text" class="form-control" id="cuttingspeed" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['cuttingspeedRange']);?>" >
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
                                 <input type="text" class="form-control" id="approachingposition" placeholder="Enter Minimum"  value="<?php echo $user->value1Actual($row['approachingpositionRange']);?>" >
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
                                 <input type="text" class="form-control" id="approachingposition" placeholder="Enter Maximum"  value="<?php echo $user->value2Actual($row['approachingpositionRange']);?>" >
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
                                 <input type="text" class="form-control" id="sealingpositionspeed" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['sealingpositionspeedRange']);?>" >
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
                                 <input type="text" class="form-control" id="sealingpositionspeed" placeholder="Enter Maximum"  value="<?php echo $user->value2Actual($row['sealingpositionspeedRange']);?>" >
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
                                 <input type="text" class="form-control" id="sealingposition" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['sealingpositionRange']);?>" >
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
                                 <input type="text" class="form-control" id="sealingposition" placeholder="Enter Maximum"  value="<?php echo $user->value2Actual($row['sealingpositionRange']);?>" >
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
                                    <input type="checkbox" value="Position" class="form-control" <?php if($user->value1Actual($row['mode']) == "Position") { echo "checked" ; } ?> >
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
                                    <input type="checkbox" value = "Pressure" class="form-control" <?php if($user->value2Actual($row['mode']) == "Pressure") { echo "checked" ; } ?> > 
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
                               
                                 <input type="text" class="form-control" id="moldopenspeed" placeholder="Enter Mold Open Speed (mm/s)" value="<?php echo $row['moldopenspeedRange'];?>"  >
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
                                 <input type="text" class="form-control" id="watertemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['watertempRange']);?>" >
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
                                 <input type="text" class="form-control" id="watertemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['watertempRange']);?>" >
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
                                 <input type="text" class="form-control" id="airpressure" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['airpressureRange']);?>" >
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
                                 <input type="text" class="form-control" id="airpressure" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['airpressureRange']);?>" >
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
                                 <input type="text" class="form-control" id="upperheatertemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['upperheattempRange']);?>" >
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
                                 <input type="text" class="form-control" id="upperheatertemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['upperheattempRange']);?>" >
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
                                 <input type="text" class="form-control" id="lowerheatertemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['lowerheattempRange']);?>" >
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
                                 <input type="text" class="form-control" id="lowerheatertemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['lowerheattempRange']);?>" >
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>  -->

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
                                 <input type="text" class="form-control" id="uppermoldtemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['uppermoldtempRange']);?>" >
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
                                 <input type="text" class="form-control" id="uppermoldtemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['uppermoldtempRange']);?>" >
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
                                 <input type="text" class="form-control" id="lowermoldtemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['lowermoldtempRange']);?>"  >
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
                                 <input type="text" class="form-control" id="lowermoldtemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['lowermoldtempRange']);?>"  >
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
                                     <input type="text" class="form-control" id="totalLength" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['totallengthRange']);?>"  >
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
                                     <input type="text" class="form-control" id="totalLength" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['totallengthRange']);?>" >
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
                                     <input type="text" class="form-control" id="swabheadlength" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['swabheadlengthRange']);?>" >
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
                                     <input type="text" class="form-control" id="swabheadlength" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['swabheadlengthRange']);?>" >
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
                                     <input type="text" class="form-control" id="swabheadwidth" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['swabheadwidthRange']);?>" >
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
                                     <input type="text" class="form-control" id="swabheadwidth" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['swabheadwidthRange']);?>" >
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
                                     <input type="text" class="form-control" id="swabheadthickness" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['swabheadthicknessRange']);?>" >
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
                                     <input type="text" class="form-control" id="swabheadthickness" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['swabheadthicknessRange']);?>" >
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
                                     <input type="text" class="form-control" id="swabhandlewidth" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['swabhandlewidthRange']);?>" >
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
                                     <input type="text" class="form-control" id="swabhandlewidth" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['swabhandlewidthRange']);?>" >
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
                                     <input type="text" class="form-control" id="swabhandlethickness" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['swabhandlethicknessRange']);?>" >
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
                                     <input type="text" class="form-control" id="swabhandlethickness" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['swabhandlethicknessRange']);?>" >
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
                                     <input type="text" class="form-control" id="swabhandlediameter" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['swabheaddiameterRange']);?>" >
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
                                     <input type="text" class="form-control" id="swabhandlediameter" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['swabheaddiameterRange']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
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
                                     <input type="text" class="form-control" id="substrateDimention" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['substrateDimention']);?>">
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
                                     <input type="text" class="form-control" id="substrateDimention" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['substrateDimention']);?>">
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
                                     <input type="text" class="form-control" id="pullSeatTest" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['pullSeatTest']);?>">
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
                                     <input type="text" class="form-control" id="pullSeatTest" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['pullSeatTest']);?>">
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <br><hr>

                    <div class="form-group">
                        <label style="color: #111E6C;">FUNCTIONALITY</label>
                    </div>   

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                               <label style="margin-left: 20px;" >No. of Tips per HT</label>
                            </div>
                            <div class="col-sm">
                               <input type="number" class="form-control" id="noHandleperHT" placeholder="Enter Handles" value="<?php echo $row['noofsample']; ?>" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm">


                            <input type="text" list="employees" name="pulltest" class="form-control emp_id" id="pulltestdesc" value="Pull Test">
                                <datalist id="employees">
                                     <option value="<?php echo $row['pulltestdesc']; ?>"  selected> <?php echo $row['pulltestdesc']; ?>
                                    <option value="Pull Test"  selected> Pull Test </option>
                                    <option value="Seal Strength"  > Seal Strength </option>                            
                                <datalist>


                              <!--   <select name="pulltest" class="form-control emp_id" id="pulltestdesc" >
                                                                         <option value="<?php echo $row['pulltestdesc']; ?>"  selected> <?php echo $row['pulltestdesc']; ?> </option>
                                     <option value="Pull Test"  > Pull Test </option>
                                    <option value="Seal Strength"  > Seal Strength </option>        
                                </select> -->
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm-2">
                                     Min
                                    </div>
                                    <div class="col-sm-9">
                                     <input type="text" class="form-control" id="pulltest" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['pullTest']);?>" >
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
                                     <input type="text" class="form-control" id="pulltest" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['pullTest']);?>"  >
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
                                        <select class="form-control" id="swabheadpulling" >
                                            <option value="<?php echo $user->value1Actual($row['swabheadpullingRange']);?>"><?php echo $user->value1Actual($row['swabheadpullingRange']);?></option>
                                            <option value="N/A">N/A</option>
                                            <option value="GOOD">GOOD</option>
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
                                        <select class="form-control" id="swabheadpulling" >
                                            <option value="<?php echo $user->value1Actual($row['swabheadpullingRange']);?>"><?php echo $user->value2Actual($row['swabheadpullingRange']);?></option>
                                            <option value="N/A">N/A</option>
                                            <option value="GOOD">GOOD</option>
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
                                        <select class="form-control" id="swabheadpopping" >
                                            <option value="<?php echo $user->value1Actual($row['swabheadpullingRange']);?>"><?php echo $user->value1Actual($row['swabheadpoppingRange']);?></option>
                                            <option value="N/A">N/A</option>
                                            <option value="GOOD">GOOD</option>
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
                                        <select class="form-control" id="swabheadpopping" >
                                            <option value="<?php echo $user->value1Actual($row['swabheadpullingRange']);?>"><?php echo $user->value2Actual($row['swabheadpoppingRange']);?></option>
                                            <option value="N/A">N/A</option>
                                            <option value="GOOD">GOOD</option>
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
                        <li><a type="button" class="btn btn-primary mr-1 fas fa-check-circle btnSave"> Save </a></li>              
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
                    Do you to save this product ?
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

    $(document).on('click','.btnSave',function(){ 

       $("#deleteModal").modal("show");
    });

    $(document).on('click','#dataSubmitDelete',function(){   
        $("#dataSubmitDelete").attr("disabled", true);  
        var pick = '7';

        var prod_id = "<?php echo $prod_id;?>";
        var product = $.trim(encodeURI($("#product").val()));
        var productDesc = $.trim(encodeURI($("#productDesc").val()));
        var handle = $.trim(encodeURI($("#handle").val()));
        var subtrate = $.trim(encodeURI($("#subtrate").val()));
        var pulltestdesc = $.trim(encodeURI($("#pulltestdesc").val()));
        var status  = $.trim(encodeURI($("#status").val()));
                

        let cuttingforceText = document.querySelectorAll('input[id="cuttingforce"]');
        let arrcuttingforce = [];
        cuttingforceText.forEach((textbox) => {
            arrcuttingforce.push(textbox.value);
        });

        let sealingtimeText = document.querySelectorAll('input[id="sealingtime"]');
        let arrsealingtime = [];
        sealingtimeText.forEach((textbox) => {
            arrsealingtime.push(textbox.value);
        });

        let cuttingspeedText = document.querySelectorAll('input[id="cuttingspeed"]');
        let arrcuttingspeed = [];
        cuttingspeedText.forEach((textbox) => {
            arrcuttingspeed.push(textbox.value);
        });

        let approachingpositionText = document.querySelectorAll('input[id="approachingposition"]');
        let arrapproachingposition = [];
        approachingpositionText.forEach((textbox) => {
            arrapproachingposition.push(textbox.value);
        });

        let sealingpositionspeedText = document.querySelectorAll('input[id="sealingpositionspeed"]');
        let arrsealingpositionspeed = [];
        sealingpositionspeedText.forEach((textbox) => {
            arrsealingpositionspeed.push(textbox.value);
        });

        let sealingpositionText = document.querySelectorAll('input[id="sealingposition"]');
        let arrsealingposition = [];
        sealingpositionText.forEach((textbox) => {
            arrsealingposition.push(textbox.value);
        });

        let arrCheckbox = [];
        let checkboxes = document.querySelectorAll("input[type='checkbox']:checked");
        checkboxes.forEach((item)=>{
           arrCheckbox.push(item.value);
        }) 

        var moldopenspeed = $.trim(encodeURI($("#moldopenspeed").val()));

        let watertempText = document.querySelectorAll('input[id="watertemp"]');
        let arrwatertemp = [];
        watertempText.forEach((textbox) => {
            arrwatertemp.push(textbox.value);
        });

        let airpressureText = document.querySelectorAll('input[id="airpressure"]');
        let arrairpressure = [];
        airpressureText.forEach((textbox) => {
            arrairpressure.push(textbox.value);
        });

        let upperheatertempText = document.querySelectorAll('input[id="upperheatertemp"]');
        let arrupperheatertemp = [];
        upperheatertempText.forEach((textbox) => {
            arrupperheatertemp.push(textbox.value);
        });

        let lowerheatertempText = document.querySelectorAll('input[id="lowerheatertemp"]');
        let arrlowerheatertemp = [];
        lowerheatertempText.forEach((textbox) => {
            arrlowerheatertemp.push(textbox.value);
        });

        let uppermoldtempText = document.querySelectorAll('input[id="uppermoldtemp"]');
        let arruppermoldtemp = [];
        uppermoldtempText.forEach((textbox) => {
            arruppermoldtemp.push(textbox.value);
        });

        let lowermoldtempText = document.querySelectorAll('input[id="lowermoldtemp"]');
        let arrlowermoldtemp = [];
        lowermoldtempText.forEach((textbox) => {
            arrlowermoldtemp.push(textbox.value);
        });

        let totalLengthText = document.querySelectorAll('input[id="totalLength"]');
        let arrtotalLength = [];
        totalLengthText.forEach((textbox) => {
            arrtotalLength.push(textbox.value);
        });

        let swabheadlengthText = document.querySelectorAll('input[id="swabheadlength"]');
        let arrswabheadlength = [];
        swabheadlengthText.forEach((textbox) => {
            arrswabheadlength.push(textbox.value);
        });

        let swabheadwidthText = document.querySelectorAll('input[id="swabheadwidth"]');
        let arrswabheadwidth = [];
        swabheadwidthText.forEach((textbox) => {
            arrswabheadwidth.push(textbox.value);
        });

        let swabheadthicknessText = document.querySelectorAll('input[id="swabheadthickness"]');
        let arrswabheadthickness = [];
        swabheadthicknessText.forEach((textbox) => {
            arrswabheadthickness.push(textbox.value);
        });

        let swabhandlewidthText = document.querySelectorAll('input[id="swabhandlewidth"]');
        let arrswabhandlewidth = [];
        swabhandlewidthText.forEach((textbox) => {
            arrswabhandlewidth.push(textbox.value);
        });

        let swabhandlethicknessText = document.querySelectorAll('input[id="swabhandlethickness"]');
        let arrswabhandlethickness = [];
        swabhandlethicknessText.forEach((textbox) => {
            arrswabhandlethickness.push(textbox.value);
        });

        let swabhandlediameterText = document.querySelectorAll('input[id="swabhandlediameter"]');
        let arrswabhandlediameter = [];
        swabhandlediameterText.forEach((textbox) => {
            arrswabhandlediameter.push(textbox.value);
        });

        var noHandleperHT = $.trim(encodeURI($("#noHandleperHT").val()));
        
        let pulltestText = document.querySelectorAll('input[id="pulltest"]');
        let arrpulltest = [];
        pulltestText.forEach((textbox) => {
            arrpulltest.push(textbox.value);
        });

        let swabheadpullingSelects = document.querySelectorAll('select[id="swabheadpulling"]');
        let arrswabheadpulling = [];
        swabheadpullingSelects.forEach((select) => {
            arrswabheadpulling.push(select.value);
        });


        let swabheadpoppingSelects = document.querySelectorAll('select[id="swabheadpopping"]');
        let arrswabheadpopping = [];
        swabheadpoppingSelects.forEach((select) => {
            arrswabheadpopping.push(select.value);
        });


      let substrateDimensionText = document.querySelectorAll('input[id="substrateDimention"]');
        let substrateDimensionforce = [];
        substrateDimensionText.forEach((textbox) => {
            substrateDimensionforce.push(textbox.value);
        });
        


        let pullSeatTestText = document.querySelectorAll('input[id="pullSeatTest"]');
        let pullSeatTestforce = [];
        pullSeatTestText.forEach((textbox) => {
            pullSeatTestforce.push(textbox.value);
        });
        


        var handleColor = $.trim(encodeURI($("#handleColor").val()));
        var substrateLotNum = $.trim(encodeURI($("#substrateLotNum").val()));
        var handleTreeMaterialNum = $.trim(encodeURI($("#handleTreeMaterialNum").val()));
        var machineTreeMatType = $.trim(encodeURI($("#machineTreeMatType").val()));
        var substrateType = $.trim(encodeURI($("#substrateType").val()));


        var fd = new FormData(); 
        fd.append('pick',pick);
        fd.append('prod_id',prod_id);

        fd.append('product', product);
        fd.append('productDesc', productDesc);
        fd.append('handle', handle);
        fd.append('subtrate', subtrate);
                    fd.append('pulltestdesc', pulltestdesc);    
        fd.append('status', status);        

        fd.append('arrcuttingforce', arrcuttingforce);
        fd.append('arrsealingtime', arrsealingtime);
        fd.append('arrcuttingspeed', arrcuttingspeed);
        fd.append('arrapproachingposition', arrapproachingposition);
        fd.append('arrsealingpositionspeed', arrsealingpositionspeed);
        fd.append('arrsealingposition', arrsealingposition);
        fd.append('arrCheckbox', arrCheckbox);
        fd.append('moldopenspeed', moldopenspeed);
        fd.append('arrwatertemp', arrwatertemp);
        fd.append('arrairpressure', arrairpressure);
        fd.append('arrupperheatertemp', arrupperheatertemp);
        fd.append('arrlowerheatertemp', arrlowerheatertemp);
        fd.append('arruppermoldtemp', arruppermoldtemp);
        fd.append('arrlowermoldtemp', arrlowermoldtemp);        

        fd.append('arrtotalLength', arrtotalLength);
        fd.append('arrswabheadlength', arrswabheadlength);
        fd.append('arrswabheadwidth', arrswabheadwidth);
        fd.append('arrswabheadthickness', arrswabheadthickness);
        fd.append('arrswabhandlewidth', arrswabhandlewidth);
        fd.append('arrswabhandlethickness', arrswabhandlethickness);
        fd.append('arrswabhandlediameter', arrswabhandlediameter);      

        fd.append('noHandleperHT', noHandleperHT);
        fd.append('arrpulltest', arrpulltest);
        fd.append('arrswabheadpulling', arrswabheadpulling);
        fd.append('arrswabheadpopping', arrswabheadpopping);

        fd.append('substrateDimensionforce', substrateDimensionforce);
        fd.append('pullSeatTestforce', pullSeatTestforce);

            fd.append('handleColor', handleColor);
            fd.append('substrateLotNum', substrateLotNum);
            fd.append('handleTreeMaterialNum', handleTreeMaterialNum);
            fd.append('machineTreeMatType', machineTreeMatType);
            fd.append('substrateType', substrateType);

         $.ajax({
             url: "../pages/codes/admin_control.php",
             data: fd,
             processData: false,
             contentType: false,
             type:'POST',
             success:function(result){
                 if($.trim(result)!=0){ 
                     $.notify("Edited  Successfully ","success");   
                     setTimeout(function() { 
                         window.location.href = "productView?id=" + '<?php echo $_GET['id']; ?>';
                      }, 2000);
                 }else {
                     $.notify("Problem Encounter! please contact your administrator","error");                           
                     $("#dataSubmitDelete").attr("disabled", false);
                 }
             }
         });
    });
</script>

