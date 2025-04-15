<title>View Product</title>

<?php 
    $prod_id = base64_decode($_GET['Productid']);
    $type = $_GET['type'];
    if( $type == "" || $prod_id == ""){
        header("Location: checklist2");
    }
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
            <h1> Create checklist <?php echo $type; ?> </h1>
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
                            <label>Work ORder</label>
                            <input type="text" class="form-control" id="workorder" placeholder="Enter Work Order">
                        </div>                       
                        <div class="col-sm">
                            <label>Date</label>
                            <input type="text" class="form-control" id="date" placeholder="Enter Product Description" value="<?php echo date("F j, Y"); ?>" disabled>
                        </div>
                    </div>
                </div>    

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label>Product Description</label>
                            <input type="text" class="form-control" id="productDesc" placeholder="Enter Product Description" value="<?php echo $row['productDesc']; ?>" disabled>
                        </div>
                        <div class="col-sm ">
                            <label>Machine No.</label>
                            <!-- <input type="number" class="form-control" id="machineNo" placeholder="Enter Machine No." > -->
                            <select name="cars" class="form-control" id="machineNo">
                                <?php for($i=1; $i<=15; $i++){?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                </div>   

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label>Product Name</label>
                            <input type="text" class="form-control" id="product" placeholder="Enter Product Name" value="<?php echo $row['productname']; ?>" disabled>
                        </div> 
                        <div class="col-sm">
                            <label>Type</label>
                            <input type="text" class="form-control" id="type" placeholder="Enter Product Name" value="<?php echo $type; ?>" disabled>
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
                <h3 class="card-title">PRE-INSTALLMENT REQUIREMENT </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label>Handle</label>
                            <input type="text" class="form-control" id="handle" placeholder="Enter Handle" value="<?php echo $row['handle']; ?>" disabled>
                        </div>
                        <div class="col-sm">
                            <label>Machine  to be used</label>
                            <select class="form-control" id="machinetobeused" >
                                <option value="Headforming">Headforming</option>
                                <option value="Thermal bonding">Thermal bonding</option>
                                <option value="Thermal bonding">7 Slot/ 8 Slot</option>
                            </select>
                        </div>
                    </div>
                </div>          

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label>Substrate No</label>
                            <input type="text" class="form-control" id="substrate" placeholder="Enter Handle" value="<?php echo $row['substrate']; ?>" disabled>
                        </div>
                        <div class="col-sm">
                            <label>Operation</label>
                            <select class="form-control" id="operation" >
                                <option value="Single">Single</option>
                                <option value="Dual">Dual</option>
                            </select>
                        </div>
                    </div>
                </div>         

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label>No maintenance tools left behind after set up?</label>
                        </div>
                        <div class="col-sm-3">
                            <input type="checkbox" id="maintenance" name="maintenance" value="checked">
                        </div>
                    </div>
                </div>            

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label>Remarks</label>
                        </div>
                        <div class="col-sm-6">
                            <textarea id="preinstallremarks" class="form-control"   name="w3review" rows="4" cols="50" width="100%"></textarea>
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
                <h3 class="card-title">MACHINE PARAMETER </h3>
              </div>

              <div class="card-body">
                <div class="form-group">
         

                    <div class="row">
                        <div class="col-sm">
                           <label style="color: #111E6C;">HEADFORMING MACHINE</label>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <center> <label style="color: #111E6C;">MINIMUM</label> </center>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <center> <label style="color: #111E6C;">MAXIMUM</label> </center>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                               
                                 <center> <label style="color: #111E6C;">ACTUAL</label> </center>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 
                                 <center> <label style="color: #111E6C;">REMARKS</label> </center>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>   

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                           <label style="margin-left: 20px;">Cutting Force (ton)</label>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control cuttingforce-value" id="cuttingforce" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['cuttingforceRange']);?>" disabled onkeyup="validateInputs('cuttingforce')">
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control cuttingforce-value" id="cuttingforce" placeholder="Enter Maximum"  value="<?php echo $user->value2Actual($row['cuttingforceRange']);?>" disabled onkeyup="validateInputs('cuttingforce')">
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control cuttingforce-value" id="cuttingforce" placeholder="Enter Actual" placeholder="Enter Actual" onkeyup="validateCutting()" >
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <center> <p id="cuttingforcevalidation"></p> </center>
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
                                <div class="col-sm">
                                 <input type="text" class="form-control sealingtime-value" id="sealingtime" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['sealingtimeRange']);?>" disabled >
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control sealingtime-value" id="sealingtime" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['sealingtimeRange']);?>" disabled >
                                </div>
                              </div>
                            </div>
                        </div>

                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control sealingtime-value" id="sealingtime" placeholder="Enter Actual" placeholder="Enter Actual"onkeyup="validatesealingtimer()" >
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <center> <p id="sealingtimevalidation"></p> </center>
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
                                <div class="col-sm">
                                 <input type="text" class="form-control cuttingspeed-value" id="cuttingspeed" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['cuttingspeedRange']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
  
                                <div class="col-sm">
                                 <input type="text" class="form-control cuttingspeed-value" id="cuttingspeed" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['cuttingspeedRange']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control cuttingspeed-value" id="cuttingspeed" placeholder="Enter Actual" placeholder="Enter Actual" onkeyup="validatecuttingspeed()">
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <center> <p id="cuttingspeedvalidation"></p> </center>
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
                                <div class="col-sm">
                                 <input type="text" class="form-control approachingposition-value" id="approachingposition" placeholder="Enter Minimum"  value="<?php echo $user->value1Actual($row['approachingpositionRange']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control approachingposition-value" id="approachingposition" placeholder="Enter Maximum"  value="<?php echo $user->value2Actual($row['approachingpositionRange']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control approachingposition-value" id="approachingposition" placeholder="Enter Actual" placeholder="Enter Actual" onkeyup="validateapproachingposition()">
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <center id="approachingpositionvalidation">  </center>                                 
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
                                <div class="col-sm">
                                 <input type="text" class="form-control sealingpositionspeed-value" id="sealingpositionspeed" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['sealingpositionspeedRange']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control sealingpositionspeed-value" id="sealingpositionspeed" placeholder="Enter Maximum"  value="<?php echo $user->value2Actual($row['sealingpositionspeedRange']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control sealingpositionspeed-value" id="sealingpositionspeed" placeholder="Enter Actual" placeholder="Enter Actual" onkeyup="validatesealingpositionspeed()">
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                    <center id="sealingpositionspeedvalidation">  </center>   
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
                                <div class="col-sm">
                                 <input type="text" class="form-control sealingposition-value" id="sealingposition" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['sealingpositionRange']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control sealingposition-value" id="sealingposition" placeholder="Enter Maximum"  value="<?php echo $user->value2Actual($row['sealingpositionRange']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control sealingposition-value" id="sealingposition" placeholder="Enter Actual" placeholder="Enter Actual"onkeyup="validatesealingposition()">
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                    <center id="sealingpositionvalidation">  </center>   
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
                                <div class="col-sm">
                                 <input type="text" class="form-control Position-value" id="Mode" placeholder="Enter Minimum" value="<?php if($user->value1Actual($row['mode']) == "Position") { echo $user->value1Actual($row['mode']) ; } ?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control Position-value" id="Mode" placeholder="Enter Maximum"  value="<?php if($user->value2Actual($row['mode']) == "Pressure") { echo $user->value2Actual($row['mode']); } ?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>


                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control Position-value" id="Mode" placeholder="Enter Actual" placeholder="Enter Actual" onkeyup="validateMode()">
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                    <center id="Modevalidation">  </center>                              
                                </div>
                              </div>
                            </div>
                        </div>


                    </div>
                </div> 

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                           <label style="margin-left: 20px;">Mold Open Speed (mm/s)</label>
                        </div>
                        <div class="col-sm-5">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                               
                                 <input type="text" class="form-control moldopenspeed-value" id="moldopenspeed" placeholder="Enter Mold Open Speed (mm/s)" value="<?php echo $row['moldopenspeedRange'];?>" disabled >
                                </div>
                              </div>
                            </div>
                        </div>

                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control moldopenspeed-value" id="moldopenspeed" placeholder="Enter Actual" placeholder="Enter Actual"  onkeyup="validatemoldopenspeed()">
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                    <center id="moldopenspeedvalidation">  </center>     
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
                                <div class="col-sm">
                                 <input type="text" class="form-control watertemp-value" id="watertemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['watertempRange']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control watertemp-value" id="watertemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['watertempRange']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>


                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control watertemp-value" id="watertemp" placeholder="Enter Actual" placeholder="Enter Actual" onkeyup="validatewatertemp()">
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                    <center id="watertempvalidation">  </center>     
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
                                <div class="col-sm">
                                 <input type="text" class="form-control airpressure-value" id="airpressure" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['airpressureRange']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control airpressure-value" id="airpressure" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['airpressureRange']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control airpressure-value" id="airpressure" placeholder="Enter Actual" placeholder="Enter Actual" onkeyup="validateairpressure()">
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                    <center id="airpressurevalidation">  </center>     
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
                                <div class="col-sm">
                                 <input type="text" class="form-control upperheatertemp-value" id="upperheatertemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['upperheattempRange']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control upperheatertemp-value" id="upperheatertemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['upperheattempRange']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>


                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control upperheatertemp-value" id="upperheatertemp" placeholder="Enter Actual" placeholder="Enter Actual" onkeyup="validateupperheatertemppressure()">
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                    <center id="upperheatertempvalidation">  </center>     
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
                                <div class="col-sm">
                                 <input type="text" class="form-control lowerheatertemp-value" id="lowerheatertemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['lowerheattempRange']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control lowerheatertemp-value" id="lowerheatertemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['lowerheattempRange']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>


                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control lowerheatertemp-value" id="lowerheatertemp" placeholder="Enter Actual" placeholder="Enter Actual" onkeyup="validateupperheatertemppressure()">
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                    <center id="lowerheatertempvalidation">  </center>    
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
                                <div class="col-sm">
                                 <input type="text" class="form-control uppermoldtemp-value" id="uppermoldtemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['uppermoldtempRange']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control uppermoldtemp-value" id="uppermoldtemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['uppermoldtempRange']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control uppermoldtemp-value" id="uppermoldtemp" placeholder="Enter Actual" placeholder="Enter Actual" onkeyup="validateuppermoldtemp()">
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                    <center id="uppermoldtempvalidation">  </center>   
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
                                <div class="col-sm">
                                 <input type="text" class="form-control lowermoldtemp-value" id="lowermoldtemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['lowermoldtempRange']);?>" disabled >
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control lowermoldtemp-value" id="lowermoldtemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['lowermoldtempRange']);?>" disabled >
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control lowermoldtemp-value" id="lowermoldtemp" placeholder="Enter Actual" placeholder="Enter Actual" onkeyup="validatelowermoldtemp()">
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                    <center id="lowermoldtempvalidation">  </center>  
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


<?php if($type == "Start-up qualification" || $type == "Product Change" ) ?>
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
                            <div class="col-sm-2">
                               <label style="margin-left: 20px;">Total Length (head+subtrate)(mm)</label>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control totalLength-value" id="totalLength" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['totallengthRange']);?>" disabled >
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control totalLength-value" id="totalLength" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['totallengthRange']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control totalLength-value" id="totalLength" placeholder="Enter Actual"  onkeyup="validatetotalLength()">
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control totalLength-value" id="totalLength" placeholder="Enter Actual" onkeyup="validatetotalLength()">
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control totalLength-value" id="totalLength" placeholder="Enter Actual"onkeyup="validatetotalLength()">
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control totalLength-value" id="totalLength" placeholder="Enter Actual" onkeyup="validatetotalLength()">
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control totalLength-value" id="totalLength" placeholder="Enter Actual" onkeyup="validatetotalLength()">
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="form-group">
                        <div class="row justify-content-center">
                            <center id="totalLengthvalidation"> </center>  
                        </div>
                    </div>
                    <br>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                               <label style="margin-left: 20px;">Swab Head Length (mm)</label>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadlength-value" id="swabheadlength" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['swabheadlengthRange']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadlength-value" id="swabheadlength" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['swabheadlengthRange']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadlength-value" id="swabheadlength" placeholder="Enter Actual" onkeyup="validateswabheadlength()">
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadlength-value" id="swabheadlength" placeholder="Enter Actual" onkeyup="validateswabheadlength()">
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadlength-value" id="swabheadlength" placeholder="Enter Actual" onkeyup="validateswabheadlength()">
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadlength-value" id="swabheadlength" placeholder="Enter Actual" onkeyup="validateswabheadlength()">
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadlength-value" id="swabheadlength" placeholder="Enter Actual" onkeyup="validateswabheadlength()">
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>   

                    <div class="form-group">
                        <div class="row justify-content-center">
                            <center id="swabheadlengthvalidation"> </center>  
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                               <label style="margin-left: 20px;">Swab Head Width (mm)</label>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadwidth-value" id="swabheadwidth" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['swabheadwidthRange']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadwidth-value" id="swabheadwidth" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['swabheadwidthRange']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>


                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadwidth-value" id="swabheadwidth" placeholder="Enter Actual" onkeyup="validatesswabheadwidth()">
                                    </div>
                                  </div>
                                </div>
                            </div>


                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadwidth-value" id="swabheadwidth" placeholder="Enter Actual" onkeyup="validatesswabheadwidth()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadwidth-value" id="swabheadwidth" placeholder="Enter Actual" onkeyup="validatesswabheadwidth()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadwidth-value" id="swabheadwidth" placeholder="Enter Actual" onkeyup="validatesswabheadwidth()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadwidth-value" id="swabheadwidth" placeholder="Enter Actual" onkeyup="validatesswabheadwidth()">
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>  

                    <div class="form-group">
                        <div class="row justify-content-center">
                            <center id="swabheadwidthvalidation"> </center>  
                        </div>
                    </div>
                    <br>
                                       
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                               <label style="margin-left: 20px;">Swab HeadThickness (mm)</label>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadthickness-value" id="swabheadthickness" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['swabheadthicknessRange']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadthickness-value" id="swabheadthickness" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['swabheadthicknessRange']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadthickness-value" id="swabheadthickness" placeholder="Enter Actual" onkeyup="validateswabheadthickness()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadthickness-value" id="swabheadthickness" placeholder="Enter Actual" onkeyup="validateswabheadthickness()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadthickness-value" id="swabheadthickness" placeholder="Enter Actual" onkeyup="validateswabheadthickness()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadthickness-value" id="swabheadthickness" placeholder="Enter Actual" onkeyup="validateswabheadthickness()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadthickness-value" id="swabheadthickness" placeholder="Enter Actual" onkeyup="validateswabheadthickness()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row justify-content-center">
                            <center id="swabheadthicknessvalidation"> </center>  
                        </div>
                    </div>
                    <br>
                                       
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                               <label style="margin-left: 20px;">Swab Handle Width (mm)</label>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlewidth-value" id="swabhandlewidth" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['swabhandlewidthRange']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlewidth-value" id="swabhandlewidth" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['swabhandlewidthRange']);?>" disabled>
                                    </div>
                                  </div>

                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlewidth-value" id="swabhandlewidth" placeholder="Enter Actual" onkeyup="validateswabhandlewidth()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlewidth-value" id="swabhandlewidth" placeholder="Enter Actual" onkeyup="validateswabhandlewidth()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlewidth-value" id="swabhandlewidth" placeholder="Enter Actual" onkeyup="validateswabhandlewidth()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlewidth-value" id="swabhandlewidth" placeholder="Enter Actual" onkeyup="validateswabhandlewidth()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlewidth-value" id="swabhandlewidth" placeholder="Enter Actual" onkeyup="validateswabhandlewidth()">
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="form-group">
                        <div class="row justify-content-center">
                            <center id="swabhandlewidthvalidation"> </center>  
                        </div>
                    </div>
                    <br>
                                       
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                               <label style="margin-left: 20px;">Swab Handle Thickness (mm)</label>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlethickness-value" id="swabhandlethickness" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['swabhandlethicknessRange']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlethickness-value" id="swabhandlethickness" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['swabhandlethicknessRange']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlethickness-value" id="swabhandlethickness" placeholder="Enter Actual" onkeyup="validateswabhandlethickness()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlethickness-value" id="swabhandlethickness" placeholder="Enter Actual" onkeyup="validateswabhandlethickness()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlethickness-value" id="swabhandlethickness" placeholder="Enter Actual" onkeyup="validateswabhandlethickness()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlethickness-value" id="swabhandlethickness" placeholder="Enter Actual" onkeyup="validateswabhandlethickness()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlethickness-value" id="swabhandlethickness" placeholder="Enter Actual" onkeyup="validateswabhandlethickness()">
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>  

                    <div class="form-group">
                        <div class="row justify-content-center">
                            <center id="swabhandlethicknesshvalidation"> </center>  
                        </div>
                    </div>
                    <br>
                                       
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                               <label style="margin-left: 20px;">Swab handle Diameter (mm)</label>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlediameter-value" id="swabhandlediameter" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['swabheaddiameterRange']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlediameter-value" id="swabhandlediameter" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['swabheaddiameterRange']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlediameter-value" id="swabhandlediameter" placeholder="Enter Actual" onkeyup="validateswabhandlediameter()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlediameter-value" id="swabhandlediameter" placeholder="Enter Actual" onkeyup="validateswabhandlediameter()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlediameter-value" id="swabhandlediameter" placeholder="Enter Actual" onkeyup="validateswabhandlediameter()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlediameter-value" id="swabhandlediameter" placeholder="Enter Actual" onkeyup="validateswabhandlediameter()">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlediameter-value" id="swabhandlediameter" placeholder="Enter Actual" onkeyup="validateswabhandlediameter()">
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="form-group">
                        <div class="row justify-content-center">
                            <center id="swabhandlediameterhvalidation"> </center>  
                        </div>
                    </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>  
<?php ?>


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
                            <div class="col-sm-2">
                               <label style="margin-left: 20px;" >No. of Tips per HT</label>
                            </div>
                            <div class="col-sm-3">
                               <input type="text" class="form-control" id="noHandleperHT" placeholder="Enter Handles" value="<?php echo $row['noofsample']; ?>" disabled >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                               <label style="margin-left: 20px;" >Visual Inspection</label>
                            </div>
                            <div class="col-sm-3">
                             <select class="form-control" id="visualInpection" >
                                <option value="GOOD">GOOD</option>
                                <option value="NOT GOOD">NOT GOOD</option>
                            </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group" hidden>
                        <div class="row">
                            <div class="col-sm">
                               <label style="margin-left: 20px;">Pull Test</label>
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

                    <div class="form-group" hidden>
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
                                            <option value="<?php echo $user->value1Actual($row['swabheadpullingRange']);?>"><?php echo $user->value1Actual($row['swabheadpullingRange']);?></option>
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

                    <div class="form-group" hidden>
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

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm">
                               <center> <label> Sample No. </label></center>
                            </div>
          
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                        <center> <label> Swab head Pulling </label></center>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                      <center> <label> Swabs Head Popping</label></center>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                        <center> <label> Swabs Head Inserting (Wet) </label></center>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                        <center> <label>Swabs Head Swabbing (Wet) </label></center>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                        <center> <label> <?php echo $row['pulltestdesc'];?></label></center>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                  

                    <?php //if($type == "Start-up qualification" || $type == "Product Change") {
                    for($i = 1; $i <= $row['noofsample'] ; $i++) { ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                               <center> <label> <?php echo $i; ?> </label></center>
                            </div>
          
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control" id="actualDataLoop" placeholder="Enter Actual" placeholder="Enter Actual"
                                        value="<?php echo $user->value1Actual($row['swabheadpullingRange']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control" id="actualDataLoop" placeholder="Enter Actual" placeholder="Enter Actual" value="<?php echo $user->value1Actual($row['swabheadpoppingRange']); ?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control" id="actualDataLoop" <?php if($i > 5){ echo "hidden"; } else { ?> placeholder="Enter Actual"  <?php }?> >
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control" id="actualDataLoop" <?php if($i > 5){ echo "hidden"; } else { ?> placeholder="Enter Actual"  <?php }?>   >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                    <input type="text" class="form-control" id="actualDataLoop"   
                                    <?php 

                                    if($user->value1Actual($row['pulltestdesc']) == "Pull Test"){ 
                                        if($i > 5){ 
                                            echo "hidden"; 
                                        } else { ?> 
                                            placeholder="Enter Actual"  
                                            value="<?php echo $user->value1Actual($row['pullTest']); ?>"
                                            <?php 
                                        } 
                                    } else { ?>
                                                                                    placeholder="Enter Actual" 
                                            value="<?php echo $user->value1Actual($row['pullTest']); ?>"
                                <?php    } ?> >
                                    </div>
                                  </div>
                                </div> 
                            </div>
                        </div>
                            
                   <?php echo "<br>"; } ?>

                <div class="form-group">
                    <div class="row">
                         <div class="col-sm">
                            <p style="color: red">     NOTE: Pull test = 100% location sampling</p>
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
                <h3 class="card-title"> FIRST 100 SHOTS PRODUCTION </h3>
              </div>
              <div class="card-body">
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label style="margin-left:20px">Result</label>
                        </div>    
                        <div class="col-sm-2">
                           <input type="radio" id="option2" name="options" value="Passed"> Passed
                        </div>  
                        <div class="col-sm">
                           <input type="radio" id="option2" name="options" value="Failed"> Failed
                        </div>  
                    </div>
                </div>   

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label style="margin-left:20px">Remarks</label>
                        </div>
                        <div class="col-sm-6">
                            <textarea id="shotproductionremarks" class="form-control"   name="w3review" rows="4" cols="50" width="100%"></textarea>
                        </div>
                    </div>
                </div>   

                <div class="form-group">
                   <div class="row">
                        <div class="col-sm-2">
                            <label style="margin-left:20px" class="mr-1">Inspected by:</label> 
                        </div>  
                        <div class="col-sm-6">
                            <input type="text" id="InspectedBY" value="<?php echo $_SESSION['name'];?>"  class="form-control" readonly>
                        </div>
                        <div class="col-sm-3">
                            <label style="margin-left:20px" class="mr-1">Quality</label> 
                        </div>
                    </div>    <br>
                    <div class="row">
                        <div class="col-sm-2">
                            <label style="margin-left:20px" class="mr-1">Acknowledge by:</label> 
                        </div>  
                        <div class="col-sm-6">

                    
                            <select class="select2" multiple="multiple" id="acknowledge" data-placeholder="Acknowledge By" style="width: 100%;">
                                <?php 
                                $sql=$user->selectTeamlead();
                                while($list=mysqli_fetch_array($sql)){?>
                                  <option value="<?php echo $list['employeeID']; ?>"><?php echo $list['fullName']; ?></option>
                                <?php } ?>  
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label style="margin-left:20px" class="mr-1">Production</label> 
                        </div>
                    </div>    

                    <br>
                    
                    <div class="row">
                        <div class="col-sm-2">
                        </div>  
                        <div class="col-sm-6">
                             <select class="select2" multiple="multiple" id="maintenancecheced" data-placeholder="Maintenance By" style="width: 100%;">
                                 <?php 
                                    $sql=$user->selectMaintenance();
                                    while($list1=mysqli_fetch_array($sql)){?>
                                        <option value="<?php echo $list1['employeeID']; ?>"><?php echo $list1['fullName']; ?></option>
                                <?php } ?>   
                            </select>


                        </div>
                        <div class="col-sm-3">
                            <label style="margin-left:20px" class="mr-1">Maintenance</label> 
                        </div>
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
                    Do you to create this checklist ?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataSubmitDelete">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>
</div>
<?php   include 'includes/footer.php';
        include  'includes/validation.php';
?>
<script>

    $('.select2').select2()

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })


    $(document).on('click','.btnBack',function(){ 
        window.location.href = "checklist2";
    });

    $(document).on('click','.btnSave',function(){ 

       $("#deleteModal").modal("show");
    });

    $(document).on('click','#dataSubmitDelete',function(){   
        $("#dataSubmitDelete").attr("disabled", true);  

        var pick = "9";

        var workorder = $.trim(encodeURI($("#workorder").val()));
        var date = $.trim(encodeURI($("#date").val()));
        var productDesc = $.trim(encodeURI($("#productDesc").val()));
        var machineNo = $.trim(encodeURI($("#machineNo").val()));
        var product = $.trim(encodeURI($("#product").val()));
        var type = $.trim(encodeURI($("#type").val()));

        var handle = $.trim(encodeURI($("#handle").val()));
        var machinetobeused = $.trim(encodeURI($("#machinetobeused").val()));
        var substrate = $.trim(encodeURI($("#substrate").val()));
        var operation = $.trim(encodeURI($("#operation").val()));
        var maintenance = $.trim(encodeURI($("#maintenance").val()));
        var preinstallremarks = $.trim(encodeURI($("#preinstallremarks").val()));

        var status = "Pending";

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

        // let arrCheckbox = [];
        // let checkboxes = document.querySelectorAll("input[type='checkbox']:checked");
        // checkboxes.forEach((item)=>{
        //    arrCheckbox.push(item.value);
        // }) 

        let ModeText = document.querySelectorAll('input[id="Mode"]');
        let arrMode = [];
        ModeText.forEach((textbox) => {
            arrMode.push(textbox.value);
        });

        let moldopenspeedText = document.querySelectorAll('input[id="moldopenspeed"]');
        let arrmoldopenspeed = [];
       moldopenspeedText.forEach((textbox) => {
            arrmoldopenspeed.push(textbox.value);
        });

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
//
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
//
        var noHandleperHT = $.trim(encodeURI($("#noHandleperHT").val()));
        var visualInpection = $.trim(encodeURI($("#visualInpection").val()));

        let actualDataLoopText = document.querySelectorAll('input[id="actualDataLoop"]');
        let arractualDataLoop = [];
        actualDataLoopText.forEach((textbox) => {
            arractualDataLoop.push(textbox.value);
        });
//        
        var selectedoption = document.querySelector('input[name="options"]:checked');

        var shotproductionremarks = $.trim(encodeURI($("#shotproductionremarks").val()));
        var InspectedBY = $.trim(encodeURI($("#InspectedBY").val()));
        var acknowledge = $.trim(encodeURI($("#acknowledge").val()));
        var maintenancecheced = $.trim(encodeURI($("#maintenancecheced").val()));


        var fd = new FormData(); 
        fd.append('pick',pick);
        fd.append('status',status);

        fd.append('workorder', workorder);
        fd.append('date', date);
        fd.append('productDesc', productDesc);
        fd.append('machineNo', machineNo);
        fd.append('product', product);
        fd.append('type',type );
        fd.append('handle', handle);
        fd.append('machinetobeused', machinetobeused);
        fd.append('substrate', substrate);
        fd.append('operation', operation);
        fd.append('maintenance', maintenance);
        fd.append('preinstallremarks', preinstallremarks);

        fd.append('arrcuttingforce', arrcuttingforce);
        fd.append('arrsealingtime', arrsealingtime);
        fd.append('arrcuttingspeed', arrcuttingspeed);
        fd.append('arrapproachingposition', arrapproachingposition);
        fd.append('arrsealingpositionspeed', arrsealingpositionspeed);
        fd.append('arrsealingposition', arrsealingposition);
        fd.append('arrMode', arrMode);
        fd.append('arrmoldopenspeed', arrmoldopenspeed);
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

        fd.append('noHandleperHT',noHandleperHT );
        fd.append('visualInpection',visualInpection );
        fd.append('arractualDataLoop',arractualDataLoop );

        fd.append('selectedoption',selectedoption);
        fd.append('shotproductionremarks',shotproductionremarks);
        fd.append('InspectedBY',InspectedBY);
        fd.append('acknowledge',acknowledge);
        fd.append('maintenancecheced',maintenancecheced);
        
        $.ajax({
             url: "../pages/codes/admin_control.php",
             data: fd,
             processData: false,
             contentType: false,
             type:'POST',
             success:function(result){
                 if($.trim(result)!=0){ 
                     $.notify("Account Created Successfully ","success");   
                     setTimeout(function() { 
                         window.location.href = "checklist2";
                      }, 2000);
                 }else {
                     $.notify("Problem Encounter! please contact your administrator","error");                           
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
        // if(cuttingforce1 <= cuttingforce3 && cuttingforce2 >= cuttingforce3){
        //  cuttingforcevalidation.textContent = "within specs";
        // } else {
        //  cuttingforcevalidation.textContent = "Out of specs";        
        // }
    }


</script>