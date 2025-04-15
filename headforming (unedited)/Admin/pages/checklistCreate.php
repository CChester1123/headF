192<title>View Product</title>

<?php 
    $prod_id = base64_decode($_GET['Productid']);
    $type = $_GET['type'];
    if( $type == "" || $prod_id == ""){
        header("Location: checklist");
    }
    include 'includes/header.php'; 
    $sql=$user->ViewEditProduct($prod_id);
    while($row=mysqli_fetch_array($sql)){
?>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Create checklist </h1>

                
          </div>
            <div class="col-sm-6">
              <!--       <ol class="breadcrumb float-sm-right">
                        <li><button id="toggleButton" class="form-control btn btn-info">Add Textbox</button></li>
                    </ol> -->
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
                            <label>Work Order</label>
                            <input type="text" class="form-control" id="workorder" placeholder="Enter Work Order">
                        </div>                       
                        <div class="col-sm-3">
                            <label>Date</label>
                            <input type="text" class="form-control" id="date" placeholder="Enter Product Description" value="<?php echo date("F j, Y"); ?>" disabled>
                        </div>
                        <?php if($type != 'In-Process Audit') { ?>
                        <div class="col-sm-3">
                            <label>Setup Number</label>
                            <input type="number" class="form-control" id="setUpNUmber" placeholder="Enter Start Up Num" value = "1" >
                        </div>
                                          <?php } ?>  

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
                                <?php for($i=1; $i<=16; $i++){?>
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
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label class="mr-1">Quality</label> 
                            <input type="text" id="InspectedBY" value="<?php echo $_SESSION['name'];?>"  class="form-control" readonly>
                        </div> 
                        <div class="col-sm">
                            <label class="mr-1">Production</label> 
                            <!-- <select class="select2" multiple="multiple" id="acknowledge" data-placeholder="Acknowledge By" style="width: 100%;"> -->
                            <select class="form-control" id="acknowledge" data-placeholder="Acknowledge By" style="width: 100%;">
                                <?php 
                                $sql=$user->selectTeamlead();
                                while($list=mysqli_fetch_array($sql)){?>
                                  <option value="<?php echo $list['employeeID']; ?>"><?php echo $list['fullName']; ?></option>
                                <?php } ?>  
                            </select>
                        </div>
                        <div class="col-sm">
                            <label class="mr-1">Maintenance</label> 
                           <!-- <select class="select2" multiple="multiple" id="maintenancecheced" data-placeholder="Maintenance By" style="width: 100%;"> -->
                            <select class="form-control" id="maintenancecheced" data-placeholder="Maintenance By" style="width: 100%;">
                                 <?php 
                                    $sql=$user->selectMaintenance();
                                    while($list1=mysqli_fetch_array($sql)){?>
                                        <option value="<?php echo $list1['employeeID']; ?>"><?php echo $list1['fullName']; ?></option>
                                <?php } ?>   
                            </select>
                        </div>
                    </div>
                </div>



                           <?php if($type == "In-Process Audit" ){     ?>

    
                <div class="form-group" >
                    <div class="row">
                        <div class="col-sm">
                            <label>Operator(s)</label>
                            <input type="text" class="form-control template" id="myTextbox" placeholder="Enter Operator(s)"  >
                        </div> 
                        <div class="col-sm">
                            <label>Time</label>
                            <input type="datetime-local" class="form-control trans_num" id="myTextbox2"  >
                        </div>
                    </div>
                </div>
  <?php } ?>    

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

                    <?php if($type == "Start-up qualification" ){     ?>
                        <h3 class="card-title">START-UP QUALIFICATION</h3>
                    <?php } else if ($type == "Product Change") {?>
                        <h3 class="card-title">PRODUCT CHANGE</h3>
                    <?php } else {?> 
                        <h3 class="card-title">IN-PROCESS QUALITY AUDIT</h3>
                    <?php } ?>    
               
              </div>
              <!-- /.card-header -->

              <?php //if($type == "Start-up qualification" || $type == "Product Change" ){ ?>
<!--                   <div class="card-body">   

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm">
                                <label>Handle Part Number</label>
                                <input type="text" class="form-control" id="handle" placeholder="Enter Handle" value="<?php echo $row['handle']; ?>" disabled>
                            </div>
                            <div class="col-sm">
                                <label>Machine  to be used</label>
                                <input type="text" class="form-control" id="machinetobeused" placeholder="Enter Handle" value="Headforming" >
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

                  </div> -->

              <?php // } else {?>

                <div class="card-body">   


                    <div class="form-group">
                        <div class="row">

                            <div class="col-sm">
                                <label>Machine  to be used</label>
                                <input type="text" class="form-control" id="machinetobeused" placeholder="Enter Handle" value="Headforming" >
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
                            <div class="col-sm">
                                <label>Handle Part Number</label>
                                <input type="text" class="form-control" id="handle" placeholder="Enter Handle" value="<?php echo $row['handle']; ?>" >
                            </div>


                              <div class="col-sm">
                                <label>Substrate Material Part NUmber</label>
                                <input type="text" class="form-control" id="substrate" placeholder="Enter Handle" value="<?php echo $row['substrate']; ?>" >
                            </div>

                      
                        </div>
                    </div> 

                                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm">
                                <label>Handle Tree Color</label>
                                <input type="text" class="form-control" id="handleColor" placeholder="Enter Handle Color"  value="<?php echo $row['handleColor']; ?>"   >
                            </div>

                            <div class="col-sm">
                                <label>Substrate Material Lot Number</label>
                                <input type="text" class="form-control" id="substrateLotNum" placeholder="Enter Substrate Material Lot Number" value="<?php echo $row['substrateLotNum']; ?>" >
                            </div>
                            <div class="col-sm">
                                <label>Handle Tree Material Lot Number</label>
                                <input type="text" class="form-control" id="handleTreeMaterialNum" placeholder="Enter Tree Material Number" value="<?php echo $row['handleTreeMaterialNum']; ?>"   >
                            </div> 

                        </div>
                    </div>          

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm">
                                <label>Handle Tree Material Type</label>
                                <input type="text" class="form-control" id="machineTreeMatType" placeholder="Enter Handle Tree Material Type" value="<?php echo $row['machineTreeMatType']; ?>"   >
                            </div>

                            <div class="col-sm">
                                <label>Substrate Material Type</label>
                                <input type="text" class="form-control" id="substrateType" placeholder="Enter Handle Material Type" value="<?php echo $row['substrateType']; ?>"  >
                            </div>
                        </div>
                    </div>         

                    <br>
    <!--                 <div class="form-group">
                        <div class="row">
                            <div class="col-sm">
                                <label>Swab Dimension</label>
                            </div>

                            <div class="col-sm">
                                <input type="text" class="form-control" id="substrateDimention" placeholder="Enter Substrate Dimention Actual" value="" >
                            </div>

                            <div class="col-sm">
                                <input type="text" class="form-control" id="substrateDimention" placeholder="Enter Substrate Dimention Remarks" value="" >
                            </div>
                        </div>
                    </div>  -->         <?php if($type == "Start-up qualification"  ){ ?>     

           <!--          <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label>No maintenance tools left behind after set up?</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="checkbox" id="maintenance" name="maintenance" value="checked">
                            </div>
                        </div>
                    </div>    -->         
   
         <?php } ?>     
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
              <?php //} ?>
            </div>
          </div>
        </div>
      </div>
    </section>
          <?php if($type == "Start-up qualification" || $type == "Product Change" ){ ?>
       
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
                           <label style="margin-left: 20px;">Approaching Position (mm)</label>
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
                           <label style="margin-left: 20px;">Sealing Position Speed (mm)</label>
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

<!--                 <div class="form-group">
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
 -->
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
    <?php } ?>

  
        <section class="content hidden" id="sectionToToggle">   
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header" style="background-color: #111E6C; color: white;">
                    <h3 class="card-title"> DIMENSIONS </h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group">

                <div class="row">
                        <div class="col-sm">
                           <label style="color: #111E6C;"></label>
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
                               
                                 <center> <label style="color: #111E6C;">ACTUAL</label> </center>
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
                               
                                 <center> <label style="color: #111E6C;">ACTUAL</label> </center>
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
                    </div>

                        <?php if($type == "Start-up qualification" || $type == "Product Change" ){ ?>
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
                                           <label style="margin-left: 20px;">Swab Head Thickness (mm)</label>
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
                                           <label style="margin-left: 20px;">Swab Handle Diameter (mm)</label>
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
                                        <center id="validateswabhandlediameter"> </center>  
                                            <center id="validateswabhandlediameter"> </center>  
                                    </div>
                                </div>
                                <br>
                                     
                                                   

                        <?php } else { ?>
                                <div class="form-group">        
                                    <div class="row">
                                        <div class="col-sm-2">
                                           <label style="margin-left: 20px;">Swab Dimension Specs  (mm)</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['substrateDimention']);?>" disabled>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['substrateDimention']);?>" disabled>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention" placeholder="Enter Actual" onkeyup="validateSubstraateVal()">
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention" placeholder="Enter Actual" onkeyup="validateSubstraateVal()">
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention" placeholder="Enter Actual" onkeyup="validateSubstraateVal()">
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention" placeholder="Enter Actual" onkeyup="validateSubstraateVal()">
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention" placeholder="Enter Actual" onkeyup="validateSubstraateVal()">
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>      

                                <div class="form-group">
                                    <div class="row justify-content-center">
                                        <center id="substrateDimentionvalidation"> </center>  
                                    </div>
                                </div>
 <?php if($type != 'In-Process Audit') { ?>

                                <div class="form-group">        
                                    <div class="row">
                                        <div class="col-sm-2">
                                           <label style="margin-left: 20px;">Pull / Seal Strength Specs  (gms)</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control pullSeatTest-value" id="pullSeatTest" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['pullSeatTest']);?>" disabled>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control pullSeatTest-value" id="pullSeatTest" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['pullSeatTest']);?>" disabled>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control pullSeatTest-value" id="pullSeatTest" placeholder="Enter Actual" onkeyup="validatePullSeatTest()">
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control pullSeatTest-value" id="pullSeatTest" placeholder="Enter Actual" onkeyup="validatePullSeatTest()">
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control pullSeatTest-value" id="pullSeatTest" placeholder="Enter Actual" onkeyup="validatePullSeatTest()">
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control pullSeatTest-value" id="pullSeatTest" placeholder="Enter Actual" onkeyup="validatePullSeatTest()">
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control pullSeatTest-value" id="pullSeatTest" placeholder="Enter Actual" onkeyup="validatePullSeatTest()">
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>      
  <?php } ?>  
                                <div class="form-group">
                                    <div class="row justify-content-center">
                                        <center id="PullSeatTestvalidation"> </center>  
                                    </div>
                                </div>
                        <?php } ?>
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
                               <label style="margin-left: 20px;"><?php echo $row['pulltestdesc'];?>

                                <input type="text" class="form-control" id="pulltest" placeholder="Enter Minimum" value="<?php echo $row['pulltestdesc'];?>" readonly hidden>

                                 </label>
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



                    <div class="form-group" hidden>
                        <div class="row">
                            <div class="col-sm">
                               <label style="margin-left: 20px;"><?php echo $row['pulltestdesc'];?></label>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm-2">
                                     Min
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" value="<?php echo $user->value1Actual($row['pullTest']);?>">
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
                                         <input type="text" value="<?php echo $user->value2Actual($row['pullTest']);?>">
                                       
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
                                        <center> <label> Swab Head Pulling </label></center>
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
                                        <!-- <center> <label> <?php //echo $row['pulltestdesc'];?></label></center> -->
                                        <center> <label><?php //echo str_replace("&ge;",">",$user->value1Actual($row['pulltest']));


$string = $user->value1Actual($row['pulltestdesc']);

$search = ['&amp;lt;', '&amp;gt;','&ge;'];
$replace = [ '<','>','>'];

$result = str_replace($search, $replace, $string);

echo $result ;

                                    ?>
                                             
 <input type="text" class="form-control" id="pulltestdesc" placeholder="Enter Actual" placeholder="Enter Actual" value="<?php echo $result;?>" hidden>


                                         </label></center>
                                    </div>
                                  </div>
                                </div>
                            </div>


<!--                             <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                        <center> <label>Swabs Dimensions </label></center>
                                    </div>
                                  </div>
                                </div>
                            </div> -->


                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                        <center> <label>Remarks </label></center>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                  

                    <?php //if($type == "Start-up qualification" || $type == "Product Change") {


        // if($type == "Start-up qualification"  ){ 
                    $max_number = $row['noofsample']; // Maximum number to output
        // } else {
        //        $max_number = 5;
        // }        
                    $cols = 5; // Fixed number of columns
                    $rows = ceil($max_number / $cols);


                    for ($i = 1; $i <= $max_number; $i++) { ?>
                <div class="numbergroup">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                               <center> 
                                <label> 

                                <?php  
                                    $first_num = null;
                                    $last_num = null;

                                    // Nested loop to find first and last numbers of the current row

                                 // for ($j = 1; $j <=  $max_number; $j++) { 
                                    echo $i;

                                    // }
                                    // for ($j = 1; $j <= $cols; $j++) {
                                    //     // $num = ($i - 1) * $cols + $j;
                                    //     //     // echo $j;
                               
                                    //     //         if ($num <= $max_number) {
                                    //     //             if ($j === 1) {
                                    //     //                 $first_num = $num; // First number of the current row
                                    //     //             }
                                    //     //             if ($j === $cols) {
                                    //     //                 $last_num = $num; // Last number of the current row
                                    //     //             }
                                    //     //         }
                                       

                                    // }

                                    // Display the first and last numbers of the current row
                                    // echo $first_num . " to " . $last_num  ;
                                ?>

                                         <input type="text" class="form-control actualDataLoop" id="actualDataLoop" placeholder="Enter Actual" placeholder="Enter Actual"
                                        value="<?php echo $i;?>" hidden>
                                </label></center>
                            </div>
          
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control actualDataLoop" id="actualDataLoop" placeholder="Enter Actual" placeholder="Enter Actual"
                                        value="<?php echo $user->value1Actual($row['swabheadpullingRange']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control actualDataLoop" id="actualDataLoop" placeholder="Enter Actual" placeholder="Enter Actual" value="<?php echo $user->value1Actual($row['swabheadpoppingRange']); ?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control actualDataLoop" id="actualDataLoop" <?php if($i > 5){ echo "value='||'"; echo "hidden";  
                                        } else { ?> placeholder="Enter Actual"  <?php }?> >
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control actualDataLoop" id="actualDataLoop" <?php if($i > 5){  echo "value='||'"; echo "hidden";  
                                        } else { ?> placeholder="Enter Actual" <?php }?>   >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">

                                        <input type="text" value="<?php echo $user->value1Actual($row['pullTest']);?>" id="actualDataLoopa<?php echo $i; ?>1" oninput="compareNumbers(<?php echo $i; ?>)" hidden>
                                        <input type="text" value="<?php echo $user->value2Actual($row['pullTest']);?>" id="actualDataLoopa<?php echo $i; ?>2" oninput="compareNumbers(<?php echo $i; ?>)" hidden>


                                    <input type="text" class="form-control actualDataLoop" id="actualDataLoopa<?php echo $i; ?>3"   
                                    <?php 

                                    if($user->value1Actual($row['pulltestdesc']) == "Pull Test"){ 
                                        if($i > 5){ 
                                            echo "value='||'"; 
                                            echo "hidden"; 

                                        } else { ?> 
                                            placeholder="Enter Actual"  
                                            value="<?php //echo $user->value1Actual($row['pullTest']); ?>"
                                            <?php 
                                        } 
                                    } else { ?>
                                                                                    placeholder="Enter Actual" 
                                            value="<?php //echo $user->value1Actual($row['pullTest']); ?>"
                                <?php    } ?> oninput="compareNumbers(<?php echo $i; ?>)">
                                    </div>
                                  </div>
                                </div> 
                            </div>

    <!--                         <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                    <input type="text" class="form-control actualDataLoop" id="actualDataLoop"   
                                    <?php 

                                    if($user->value1Actual($row['pulltestdesc']) == "Pull Test"){ 
                                        if($i > 5){ 
                                            echo "value='||'"; 
                                            echo "hidden"; 

                                        } else { ?> 
                                            placeholder="Enter Actual"  
                                            value="<?php //echo $user->value1Actual($row['pullTest']); ?>"
                                            <?php 
                                        } 
                                    } else { ?>
                                                                                    placeholder="Enter Actual" 
                                            value="<?php //echo $user->value1Actual($row['pullTest']); ?>"
                                <?php    } ?> >
                                    </div>
                                  </div>
                                </div> 
                            </div> -->


                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <!-- <input type="text" class="form-control actualDataLoop result" id="actualDataLoopResult<?php echo $i; ?>" placeholder="Enter Remarks" > -->
                                       <input type="text" id="actualDataLoopResult<?php echo $i; ?>" class="form-control actualDataLoop result" placeholder="Enter Remarks" >

                                     <!-- <div id="actualDataLoopResult<?php echo $i; ?>"></div> -->
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                            
                </div>



                   <?php echo "<br>"; } ?>

                   <?php if($type != "In-Process Audit" ){ ?> 
                                         <?php if($type == "Start-up qualification" ){     ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                        <label style="color: red; margin-left: 30px;"> NOTE:</label><br>
                                        <label style="color: red; margin-left: 100px;"> 1. 100% Location sampling for manual swabs head pulling and swabs head popping as applicable.</label><br>
                                        <label style="color: red; margin-left: 100px;"> 2. Five (5) locations sampling for swab head inserting, swab head swabbing and pull/seal strength test for Product change.</label><br>
                 

                                    </div>
                                </div>
                           <?php }  else { ?>
                        <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                        <label style="color: red; margin-left: 30px;"> NOTE:</label><br>
                                        <label style="color: red; margin-left: 100px;"> 1. 100% Location sampling for manual swabs head pulling and swabs head popping as applicable.</label><br>
                                        <label style="color: red; margin-left: 100px;"> 2. Five (5) locations sampling for swab head inserting, swab head swabbing and pull/seal strength test for Product change.</label><br>
                 

                                    </div>
                                </div>


                    <?php  } } ?>      
                    <br>
                     
            <?php if($type == "In-Process Audit" ){     ?>
                <div class="form-group">
                    <div class="row">
                         <div class="col-sm">
                            <label> Visual Inspection (20 HT per Bakers Rack)  </label>
                        </div>
                          <div class="col-sm">
                            <input list="browser5" id="visualInspection" name="visualInspection" placeholder="Enter Actual"  class="form-control" >
                            <datalist id="browser5">
                              <option value="Passed">
                              <option value="Failed">
                            </datalist>
                            </div>
                        
                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Remarks"  class="form-control" >
                        </div>
                    </div>
                    <br>

                    <div class="row">
                         <div class="col-sm">
                            <label>Absorbency Test (3 Swabs), for polyester only </label>
                        </div>

                        <div class="col-sm">
                            <input list="browsers" id="visualInspection" name="visualInspection" placeholder="Enter Actual"  class="form-control" >
                            <datalist id="browsers">
                              <option value="Yes">
                              <option value="N/A">
                            </datalist>
                        </div>
                        
                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Remarks"  class="form-control" >
                        </div>
                    </div>
                    <br>
                    <div class="row">
                         <div class="col-sm">
                            <label>Machine Temperature Controller Calibrated? </label>
                        </div>

                        <div class="col-sm">
                            <input list="browser2" id="visualInspection" name="visualInspection" placeholder="Enter Actual"  class="form-control" >
                              <datalist id="browser2">
                              <option value="Yes">
                              <option value="No">
                            </datalist>
                        </div>
                        
                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Remarks"  class="form-control" >
                        </div>
                    </div>
                    <br>
                    <div class="row">
                         <div class="col-sm">
                            <label>Machine Temperature are within specification ? </label>
                        </div>

                        <div class="col-sm">
                            <input list="browser3" id="visualInspection" name="visualInspection" placeholder="Enter Actual"  class="form-control" >
                            <datalist id="browser3">
                              <option value="Yes">
                              <option value="Failed">
                            </datalist>
                        </div>
                        
                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Remarks"  class="form-control" >
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <label> Swab Handle with TEXWIPE logo ?   </label>
                            </div>
                              <div class="col-sm">
                                <input list="browser10" id="visualInspection" name="visualInspection" placeholder="Enter Actual"  class="form-control" >
                                <datalist id="browser10">
                                  <option value="Yes">
                                  <option value="No">
                                </datalist>
                                </div>
                            
                            <div class="col-sm">
                                <input  id="visualInspection" name="visualInspection" placeholder="Enter Remarks"  class="form-control" >
                            </div>
                        </div>
                    </odiv>
                    <br>
                </div> 
             <?php echo "<br>"; } ?>


                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label style="margin-left:20px">Remarks</label>
                        </div>
                        <div class="col-sm-6">
                            <textarea id="shotRemarks" class="form-control"   name="w3review" rows="4" cols="50" width="100%"></textarea>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>  

            <?php if($type != "In-Process Audit" ){     ?>
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
                        <!-- 
                <div class="form-group">
                   <div class="row">
                        <div class="col-sm-2">
                            <label style="margin-left:20px" class="mr-1">Inspected by:</label> 
                        </div>  
                        <div class="col-sm-6">
                           
                        </div>
                        <div class="col-sm-3">
                            
                        </div>
                    </div>    <br>
                    <div class="row">
                        <div class="col-sm-2">
                            <label style="margin-left:20px" class="mr-1">Acknowledge by:</label> 
                        </div>  
                        <div class="col-sm-6">

                    
                           
                        </div>
                        <div class="col-sm-3">
                            
                        </div>
                    </div>    

                    <br>
                    
                    <div class="row">
                        <div class="col-sm-2">
                        </div>  
                        <div class="col-sm-6">
                             

                        </div>
                        <div class="col-sm-3">
                            
                        </div>
                    </div>
                </div>  -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 
<?php } ?>

<?php }    ?>

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                        <li><a type="button" class="btn btn-primary mr-1 fas fa-check-circle btnSave"> Submit </a></li>
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
                    Do you to submit this checklist ?
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


    function compareNumbers(groupIndex) {   
        let number1 = parseFloat(document.getElementById("actualDataLoopa" + groupIndex + "1").value)-0.1;
        let number2 = parseFloat(document.getElementById("actualDataLoopa" + groupIndex + "2").value)+0.1;
        var number3 = parseFloat(document.getElementById("actualDataLoopa" + groupIndex + "3").value);
        var resultElement = document.getElementById("actualDataLoopResult" + groupIndex);   

        if(number3 == ""){
               resultElement.value = "test";
        } else if(isNaN(number2)){     
           if(number3 > number1) {
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


    $(document).on('click','.btnBack',function(){ 
        window.location.href = "checklist";
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



        var handleColor = $.trim(encodeURI($("#handleColor").val()));
        var handleTreeMaterialNum = $.trim(encodeURI($("#handleTreeMaterialNum").val()));
        var machineTreeMatType = $.trim(encodeURI($("#machineTreeMatType").val()));
        var substrateType = $.trim(encodeURI($("#substrateType").val()));
                                    
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


        let pulltestText = document.querySelectorAll('input[id="pulltest"]');
        let arrpulltest = [];
        pulltestText.forEach((textbox) => {
            arrpulltest.push(textbox.value);
        });
//
        var noHandleperHT = $.trim(encodeURI($("#noHandleperHT").val()));
        var visualInpection = $.trim(encodeURI($("#visualInpection").val()));

        // let actualDataLoopText = document.querySelectorAll('input[id="actualDataLoop"]');
        let actualDataLoopText = document.querySelectorAll('.actualDataLoop');
        let arractualDataLoop = [];
        actualDataLoopText.forEach((textbox) => {
            arractualDataLoop.push(textbox.value);
        });
//        

        let visualInspectionText = document.querySelectorAll('input[id="visualInspection"]');
        let visualInspectionLoop = [];
       visualInspectionText.forEach((textbox) => {
           visualInspectionLoop.push(textbox.value);
        });
        



               const options = document.getElementsByName('options');
            let selectedValue = '';

            for (const option of options) {
                if (option.checked) {
                    selectedValue = option.value;

                }
            }


        var shotproductionremarks = $.trim(encodeURI($("#shotproductionremarks").val()));
        var InspectedBY = $.trim(encodeURI($("#InspectedBY").val()));
        var acknowledge = $.trim(encodeURI($("#acknowledge").val()));
        var maintenancecheced = $.trim(encodeURI($("#maintenancecheced").val()));

        var setUpNUmber = $.trim(encodeURI($("#setUpNUmber").val()));

        var template = $.trim(encodeURI($(".template").val()));
        var trans_num = $.trim(encodeURI($(".trans_num").val()));

        var shotRemarks = $.trim(encodeURI($("#shotRemarks").val()));

        var substrateLotNum = $.trim(encodeURI($("#substrateLotNum").val()));
        var pulltestdesc = $.trim(encodeURI($("#pulltestdesc").val()));




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

        fd.append('arrpulltest',arrpulltest );


        fd.append('selectedoption',selectedValue);
        fd.append('shotproductionremarks',shotproductionremarks);
        fd.append('InspectedBY',InspectedBY);
        fd.append('acknowledge',acknowledge);
        fd.append('maintenancecheced',maintenancecheced);
        
        fd.append('setUpNUmber',setUpNUmber);

        fd.append('template',template);
        fd.append('trans_num',trans_num);


        fd.append('handleColor',handleColor);
        fd.append('handleTreeMaterialNum',handleTreeMaterialNum);
        fd.append('machineTreeMatType',machineTreeMatType);
        fd.append('substrateType',substrateType);
        fd.append('substrateDimensionforce',substrateDimensionforce);

        

        fd.append('visualInspectionLoop',visualInspectionLoop);

      fd.append('pullSeatTestforce',pullSeatTestforce);


        fd.append('shotRemarks',shotRemarks);
        fd.append('substrateLotNum',substrateLotNum);


        fd.append('pulltestdesc',pulltestdesc );

// alert(handleColor + " || " +
// handleTreeMaterialNum + " || " +
// machineTreeMatType + " || " +
// substrateType + " || " +
// substrateDimensionforce + " || " +
// visualInspectionLoop);

        $.ajax({
             url: "../pages/codes/admin_control.php",
             data: fd,
             processData: false,
             contentType: false,
             type:'POST',
             success:function(result){

                // alert(result);
                 if($.trim(result)!=0){ 
                     $.notify("Account Created Successfully ","success");   
                     setTimeout(function() { 
                         window.location.href = "checklist";
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
        
    // document.getElementById("toggleButton").addEventListener("click", function() {
    //     var textbox = document.getElementById("myTextbox");
    //             var textbox2 = document.getElementById("myTextbox2");
    //     textbox.disabled = !textbox.disabled;
    //     textbox.disabled2 = !textbox.disabled2;
    // });

    $(document).on('click','#toggleButton',function(){ 
                var textbox = document.getElementById("myTextbox");
                var textbox2 = document.getElementById("myTextbox2");
        textbox.disabled = !textbox.disabled;
        textbox2.disabled = !textbox2.disabled;
   });


</script>