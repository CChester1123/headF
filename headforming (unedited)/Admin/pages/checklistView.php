<title>View Product</title>
    <?php 

        $prod_id = base64_decode($_GET['id']);
        include 'includes/header.php'; 

        $sql=$user->ViewEditchecklist($prod_id);
        while($row=mysqli_fetch_array($sql)){
     ?>
    

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> View checklist </h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

                <?php if($_SESSION['emp_id'] ==  $row['acknowledge'] &&  $row['status_TL'] != "Approve" ||  $_SESSION['emp_id'] == $row['maintenancecheced'] && $row['status_maintenance'] != "Approve" || $_SESSION['account_type'] == "Admin" || $_SESSION['account_type'] == "QA Manager") { ?>
                    <?php if($row['status'] == "Pending" ||$row['status'] == "" ) { ?>
                        <li><a type="button" class="btn btn-primary mr-1 fas fa-check-circle btnApprove"> Approve </a></li>
                        <li><a type="button" class="btn btn-danger mr-1 fas far fa-arrow-alt-circle-left btnReject"> Reject  </a></li>
                    <?php }  else {  ?>

                        <li><a type="button" class="btn btn-success mr-1 fas fa-check-circle btnPending"> Pending </a></li>

                    <?php }   ?>
                <?php }  ?>
                </ol>
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
                            <input type="text" class="form-control" id="workorder" placeholder="Enter Work Order" value="<?php echo $row['workorder']; ?>" disabled>
                        </div>                       
                        <div class="col-sm-3">
                            <label>Date</label>
                            <input type="text" class="form-control" id="date" placeholder="Enter Product Description"value="<?php echo $row['date']; ?>" disabled>
                        </div>
 <?php if($row['type'] != 'In-Process Audit') { ?>



                                                  <div class="col-sm-3">
                            <label>Setup Number</label>
                            <input type="number" class="form-control" id="setUpNUmber" placeholder="Enter Start Up Num" value="<?php echo $row['setUpNUmber']; ?>" disabled>
                        </div>
                    </div>
  <?php } ?> 
                </div>    
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label>Product Description</label>
                            <input type="text" class="form-control" id="productDesc" placeholder="Enter Product Description" value="<?php echo $row['productDesc']; ?>" disabled>
                        </div>
                        <div class="col-sm ">
                            <label>Machine No.</label>
                            <input type="number" class="form-control" id="machineNo" placeholder="Enter Machine No."value="<?php echo $row['machineNo']; ?>" disabled>
                        </div>
                    </div>
                </div>   

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label>Product Name</label>
                            <input type="text" class="form-control" id="product" placeholder="Enter Product Name" value="<?php echo $row['product']; ?>" disabled>
                        </div> 
                        <div class="col-sm">
                            <label>Type</label>
                            <input type="text" class="form-control" id="type" placeholder="Enter Product Name" value="<?php echo $row['type']; ?>" disabled>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label class="mr-1">Quality</label> 
                            <input type="text" id="InspectedBY" value="<?php echo $row['InspectedBY'];?>"  class="form-control" readonly>
                        </div> 
                        <div class="col-sm">
                            <label class="mr-1">Production</label> 
                            <select class="form-control" id="acknowledge" data-placeholder="Acknowledge By" style="width: 100%;" readonly>
                                <?php 
                                $sql=$user->selectTeamlead();
                                while($list=mysqli_fetch_array($sql)){?>
                                  <option value="<?php echo $list['employeeID']; ?>" <?php if($list['employeeID'] ==$row['acknowledge']) { echo "selected"; } ?> ><?php echo $list['fullName']; ?></option>
                                <?php } ?>  
                            </select>
                        </div>
                        <div class="col-sm">
                            <label class="mr-1">Maintenance</label> 
                            <select class="form-control" id="maintenancecheced" data-placeholder="Maintenance By" style="width: 100%;" readonly>
                                 <?php 
                                    $sql=$user->selectMaintenance();
                                    while($list1=mysqli_fetch_array($sql)){?>
                                        <option value="<?php echo $list1['employeeID']; ?>" <?php if($list1['employeeID'] ==$row['maintenancecheced']) { echo "selected"; } ?> > <?php echo $list1['fullName']; ?></option>
                                <?php } ?>    
                            </select>
                        </div>
                    </div>
                </div>

                           <?php if($row['type'] == "In-Process Audit" ){     ?>

                <div class="form-group" >
                    <div class="row">
                        <div class="col-sm">
                            <label>Operator</label>
                            <input type="text" class="form-control template" id="myTextbox" placeholder="Enter Product Name" value="<?php echo $row['template']; ?>" disabled>
                        </div> 
                        <div class="col-sm">
                            <label>Time</label>
                            <input type="text" class="form-control trans_num" id="myTextbox2" value="<?php echo $row['trans_num']; ?>" disabled>
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

                               <?php if($row['type'] == "Start-up qualification" ){     ?>
                        <h3 class="card-title">START-UP QUALIFICATION</h3>
                    <?php } else if ($type == "Product Change") {?>
                        <h3 class="card-title">PRODUCT CHANGE</h3>
                    <?php } else {?> 
                        <h3 class="card-title">IN-PROCESS QUALITY AUDIT</h3>
                    <?php } ?>    

              </div>
              <!-- /.card-header -->


        <?php //if($row['type'] == "In-Process Audit" ) { ?>

                <div class="card-body">   


                    <div class="form-group">
                        <div class="row">

                            <div class="col-sm">
                                <label>Machine  to be used</label>
                                <input type="text" class="form-control" id="machinetobeused" placeholder="Enter Handle" value="<?php echo $row['machinetobeused']; ?>" readonly>
                            </div>

                            <div class="col-sm">
                                <label>Operation</label>
                                <select class="form-control" id="operation" disabled >
                                    <option value="Single" <?php if($row['operation'] == "Single" ) { echo "selected" ; } ?> >Single</option>
                                    <option value="Dual" <?php if($row['operation'] == "Dual" ) { echo "selected" ; } ?> >Dual</option>
                                </select>
                            </div>
                        </div>
                    </div>         


                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm">
                                <label>Handle Part Number</label>
                                <input type="text" class="form-control" id="handle" placeholder="Enter Handle" value="<?php echo $row['handle']; ?>" disabled>
                            </div>

                                                 <div class="col-sm">
                                <label>Substrate Material Part NUmber</label>
                                <input type="text" class="form-control" id="substrate" placeholder="Enter Handle" value="<?php echo $row['substrate']; ?>" disabled>
                            </div>


                        </div>
                    </div> 

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm">
                                <label>Handle Tree Color</label>
                                <input type="text" class="form-control" id="handleColor" placeholder="Enter Handle Color"  value="<?php echo $row['handleColor']; ?>" disabled >
                            </div>

                            <div class="col-sm">
                                <label>Substrate Material Lot Number</label>
                                <input type="text" class="form-control" id="substrateLotNum" placeholder="Enter Substrate Material Lot Number" value="<?php echo $row['substrateLotNum']; ?>" disabled>
                            </div>

   <div class="col-sm">
                                <label>Handle Tree Material Lot Number</label>
                                <input type="text" class="form-control" id="handleTreeMaterialNum" placeholder="Enter Tree Material Number" value="<?php echo $row['handleTreeMaterialNum']; ?>"  disabled>
                            </div> 

                            
<!-- 
                            <div class="col-sm">
                                <label>Handle Tree Material Number</label>
                                <input type="text" class="form-control" id="handleTreeMaterialNum" placeholder="Enter Tree Material Number" value="<?php echo $row['handleTreeMaterialNum']; ?>" disabled >
                            </div> -->
                        </div>
                    </div>          

                    <div class="form-group">
                        <div class="row">
                     

                            <div class="col-sm">
                                <label>Handle Tree Material Type</label>
                                <input type="text" class="form-control" id="machineTreeMatType" placeholder="Enter Handle Tree Material Type" value="<?php echo $row['machineTreeMatType']; ?>" disabled >
                            </div>


                            <div class="col-sm">
                                <label>Substrate Material Type</label>
                                <input type="text" class="form-control" id="substrateType" placeholder="Enter Handle Material Type" value="<?php echo $row['substrateType']; ?>" disabled>
                            </div>
                        </div>
                    </div>         

                    <br>
                    <div class="form-group" hidden>
                        <div class="row">
                            <div class="col-sm">
                                <label>Swab Dimension</label>
                            </div>

                            <div class="col-sm">
                                <input type="text" class="form-control" id="substrateDimention" placeholder="Enter Substrate Dimention Actual" value="<?php echo $value1cutting = $user->value1Actual($row['substrateDimention']);?>" disabled >
                            </div>

                            <div class="col-sm">
                                <input type="text" class="form-control" id="substrateDimention" placeholder="Enter Substrate Dimention Remarks" value="<?php echo $value1cutting = $user->value2Actual($row['substrateDimention']);?>" disabled >
                            </div>
                        </div>
                    </div>        

              

                       <?php if($row['type'] == "Start-up qualification"  ){ ?>
  
          <!--       <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label>No maintenance tools left behind after set up?</label>
                        </div>
                        <div class="col-sm-3">
                            <input type="checkbox" id="maintenance" name="maintenance" value="checked" <?php if($row['maintenance'] == "checked") { echo "checked";}  ?>  readonly>
                        </div>
                    </div>
                </div>  -->           
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
        <?php //}else { ?>
        <!--     <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label>Handle</label>
                            <input type="text" class="form-control" id="handle" placeholder="Enter Handle" value="<?php echo $row['handle']; ?>" disabled>
                        </div>
                        <div class="col-sm">
                            <label>Machine  to be used</label>
                            <select class="form-control" id="machinetobeused" disabled>
                                 <option value="<?php echo $row['machinetobeused']; ?>"><?php echo $row['machinetobeused']; ?></option>                               
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
                            <select class="form-control" id="operation" disabled>
                                                                 <option value="<?php echo $row['operation']; ?>"><?php echo $row['operation']; ?></option>      
                                <option value="Single">Single</option>
                                <option value="Dual">Dual</option>
                            </select>
                        </div>
                    </div>
                </div>         

       
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label>Remarks</label>
                        </div>
                        <div class="col-sm-6">
                               <textarea id="preinstallremarks" class="form-control"   name="w3review" rows="4" cols="50" width="100%" readonly><?php echo $row['preinstallremarks']; ?></textarea>
                        </div>
                    </div>
                </div>   

              </div>
            </div> -->
        <?php// } ?>              

          </div>
        </div>
      </div>
    </section>
<?php if($row['type'] == 'Start-up qualification' ||$row['type'] == 'Product Change' ){ ?>
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
                                 <input type="text" class="form-control cuttingforce1" id="cuttingforce" placeholder="Enter Minimum" value="<?php echo $value1cutting = $user->value1Actual($row['arrcuttingforce']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control cuttingforce2" id="cuttingforce" placeholder="Enter Maximum"  value="<?php echo $value2cutting = $user->value2Actual($row['arrcuttingforce']);?>" disabled >
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control cuttingforce3" id="cuttingforce" placeholder="Enter Actual" placeholder="Enter Actual"  value="<?php echo$value3cutting =  $user->value3Actual($row['arrcuttingforce']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                  <center>
                                    <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation($value1cutting,$value2cutting,$value3cutting);?></div>
                                </center>
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
                                 <input type="text" class="form-control sealingtime1" id="sealingtime" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['arrsealingtime']);?>" disabled >
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control sealingtime2" id="sealingtime" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['arrsealingtime']);?>" disabled >
                                </div>
                              </div>
                            </div>
                        </div>

                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control sealingtime3" id="sealingtime" placeholder="Enter Actual"  value="<?php echo $user->value3Actual($row['arrsealingtime']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation($user->value1Actual($row['arrsealingtime']),$user->value2Actual($row['arrsealingtime']),$user->value3Actual($row['arrsealingtime']));?></div>
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
                                 <input type="text" class="form-control cuttingspeed1" id="cuttingspeed" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['arrcuttingspeed']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
  
                                <div class="col-sm">
                                 <input type="text" class="form-control cuttingspeed2" id="cuttingspeed" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['arrcuttingspeed']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control cuttingspeed3" id="cuttingspeed" placeholder="Enter Actual"value="<?php echo $user->value3Actual($row['arrcuttingspeed']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation($user->value1Actual($row['arrcuttingspeed']),$user->value2Actual($row['arrcuttingspeed']),
        $user->value3Actual($row['arrcuttingspeed']));?></div>
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
                                 <input type="text" class="form-control approachingposition1" id="approachingposition" placeholder="Enter Minimum"  value="<?php echo $user->value1Actual($row['arrapproachingposition']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control approachingposition2" id="approachingposition" placeholder="Enter Maximum"  value="<?php echo $user->value2Actual($row['arrapproachingposition']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control approachingposition3" id="approachingposition" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrapproachingposition']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation($user->value1Actual($row['arrapproachingposition']),
        $user->value2Actual($row['arrapproachingposition']),
        $user->value3Actual($row['arrapproachingposition']));?></div>
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
                                 <input type="text" class="form-control sealingpositionspeed1" id="sealingpositionspeed" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['arrsealingpositionspeed']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control sealingpositionspeed2" id="sealingpositionspeed" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['arrsealingpositionspeed']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control sealingpositionspeed3" id="sealingpositionspeed" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrsealingpositionspeed']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation($user->value1Actual($row['arrsealingpositionspeed']), 
        $user->value2Actual($row['arrsealingpositionspeed']),   
        $user->value3Actual($row['arrsealingpositionspeed']));?></div>
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
                                 <input type="text" class="form-control sealingposition2" id="sealingposition" placeholder="Enter Maximum"  value="<?php echo $user->value1Actual($row['arrsealingposition']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control sealingposition2" id="sealingposition" placeholder="Enter Maximum"  value="<?php echo $user->value2Actual($row['arrsealingposition']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control sealingposition3" id="sealingposition" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrsealingposition']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation($user->value1Actual($row['arrsealingposition']),
            $user->value2Actual($row['arrsealingposition']),
            $user->value3Actual($row['arrsealingposition']));?></div>
                                </div>
                              </div>
                            </div>
                        </div>

                    </div>
                </div> 
<!-- 
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                           <label style="margin-left: 20px;">Mode</label>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control Position1" id="Mode" placeholder="Enter Minimum" value="<?php if($user->value1Actual($row['arrMode']) == "Position") { echo $user->value1Actual($row['arrMode']) ; } ?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control Position2" id="Mode" placeholder="Enter Maximum"  value="<?php  echo $user->value2Actual($row['arrMode']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>


                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control Position3" id="Mode" placeholder="Enter Actual" placeholder="Enter Actual"value="<?php echo $user->value3Actual($row['arrMode']); ?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidationCheck($user->value1Actual($row['arrMode']),
            $user->value2Actual($row['arrMode']),
            $user->value3Actual($row['arrMode']));?></div>                                 
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
                                 <input type="text" class="form-control moldopenspeed1" id="moldopenspeed" placeholder="Enter Mold Open Speed (mm/s)" value="<?php echo $user->value1Actual($row['arrmoldopenspeed']);?>" disabled >
                                </div>
                              </div>
                            </div>
                        </div>

                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control moldopenspeed2" id="moldopenspeed" placeholder="Enter Actual" value="<?php echo $user->value2Actual($row['arrmoldopenspeed']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidationcompare($user->value1Actual($row['arrmoldopenspeed']),$user->value2Actual($row['arrmoldopenspeed']));?></div>    
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
                                 <input type="text" class="form-control watertemp1" id="watertemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['arrwatertemp']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control watertemp1" id="watertemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['arrwatertemp']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>


                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control watertemp3" id="watertemp" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrwatertemp']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation($user->value1Actual($row['arrwatertemp']),
        $user->value2Actual($row['arrwatertemp']),
        $user->value3Actual($row['arrwatertemp']));?></div>
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
                                 <input type="text" class="form-control airpressure1" id="airpressure" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['arrairpressure']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control airpressure2" id="airpressure" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['arrairpressure']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control airpressure3" id="airpressure" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrairpressure']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation($user->value1Actual($row['arrairpressure']),
        $user->value2Actual($row['arrairpressure']),
        $user->value3Actual($row['arrairpressure']));?></div>
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
                                 <input type="text" class="form-control upperheatertemp1" id="upperheatertemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['arrupperheatertemp']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control upperheatertemp2" id="upperheatertemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['arrupperheatertemp']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>


                         <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control upperheatertemp3" id="upperheatertemp" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrupperheatertemp']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation($user->value1Actual($row['arrupperheatertemp']),
        $user->value2Actual($row['arrupperheatertemp']),
        $user->value3Actual($row['arrupperheatertemp']));?></div>
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
                                 <input type="text" class="form-control lowerheatertemp1" id="lowerheatertemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['arrlowerheatertemp']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control lowerheatertemp2" id="lowerheatertemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['arrlowerheatertemp']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>


                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control lowerheatertemp3" id="lowerheatertemp" placeholder="Enter Actual"  value="<?php echo $user->value3Actual($row['arrlowerheatertemp']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                  <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation($user->value1Actual($row['arrlowerheatertemp']),
        $user->value2Actual($row['arrlowerheatertemp']),
        $user->value3Actual($row['arrlowerheatertemp']));?></div>                               
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
                                <div class="col-sm">
                                 <input type="text" class="form-control uppermoldtemp1" id="uppermoldtemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['arruppermoldtemp']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control uppermoldtemp2" id="uppermoldtemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['arruppermoldtemp']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control uppermoldtemp3" id="uppermoldtemp" placeholder="Enter Actual"value="<?php echo $user->value3Actual($row['arruppermoldtemp']);?>" disabled>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                    <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation($user->value1Actual($row['arruppermoldtemp']), $user->value2Actual($row['arruppermoldtemp']), $user->value3Actual($row['arruppermoldtemp']));?></div>     
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
                                 <input type="text" class="form-control lowermoldtemp1" id="lowermoldtemp" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['arrlowermoldtemp']);?>" disabled >
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control lowermoldtemp2" id="lowermoldtemp" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['arrlowermoldtemp']);?>" disabled >
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <input type="text" class="form-control lowermoldtemp3" id="lowermoldtemp" placeholder="Enter Actual"value="<?php echo $user->value3Actual($row['arrlowermoldtemp']);?>" disabled >
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                                                 <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation($user->value1Actual($row['arrlowermoldtemp']),
        $user->value2Actual($row['arrlowermoldtemp']),
        $user->value3Actual($row['arrlowermoldtemp']));?></div>                                  
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
  <?php if($row['type'] == "Start-up qualification" || $row['type'] == "Product Change" ){ ?>
             
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                               <label style="margin-left: 20px;">Total Length (head+substrate)(mm)</label>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control totalLength1" id="totalLength" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['arrtotalLength']);?>" disabled >
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control totalLength2" id="totalLength" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['arrtotalLength']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control totalLength3" id="totalLength" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrtotalLength']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control totalLength4" id="totalLength" placeholder="Enter Actual" value="<?php echo $user->value4Actual($row['arrtotalLength']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control totalLength5" id="totalLength" placeholder="Enter Actual" value="<?php echo $user->value5Actual($row['arrtotalLength']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control totalLength6" id="totalLength" placeholder="Enter Actual" value="<?php echo $user->value6Actual($row['arrtotalLength']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control totalLength7" id="totalLength" placeholder="Enter Actual" value="<?php echo $user->value7Actual($row['arrtotalLength']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                      <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation2($user->value1Actual($row['arrtotalLength']),
                         $user->value2Actual($row['arrtotalLength']),
                            $user->value3Actual($row['arrtotalLength']),
                            $user->value4Actual($row['arrtotalLength']),
                            $user->value5Actual($row['arrtotalLength']),
                            $user->value6Actual($row['arrtotalLength']),
                            $user->value7Actual($row['arrtotalLength']));?></div>         
                                                    </div>
                                  </div>
                                </div>
                            </div>

                        </div>
                    </div> <br>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                               <label style="margin-left: 20px;">Swab Head Length (mm)</label>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadlength1" id="swabheadlength" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['arrswabheadlength']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadlength2" id="swabheadlength" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['arrswabheadlength']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadlength3" id="swabheadlength" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrswabheadlength']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadlength4" id="swabheadlength" placeholder="Enter Actual" value="<?php echo $user->value4Actual($row['arrswabheadlength']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadlength5" id="swabheadlength" placeholder="Enter Actual" value="<?php echo $user->value5Actual($row['arrswabheadlength']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadlength6" id="swabheadlength" placeholder="Enter Actual" value="<?php echo $user->value6Actual($row['arrswabheadlength']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadlength7" id="swabheadlength" placeholder="Enter Actual" value="<?php echo $user->value7Actual($row['arrswabheadlength']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                          <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation2($user->value1Actual($row['arrswabheadlength']),
                        $user->value2Actual($row['arrswabheadlength']),
                        $user->value3Actual($row['arrswabheadlength']),
                        $user->value4Actual($row['arrswabheadlength']),
                        $user->value5Actual($row['arrswabheadlength']),
                        $user->value6Actual($row['arrswabheadlength']),
                        $user->value7Actual($row['arrswabheadlength']));?></div>                  
                                    </div>
                                  </div>
                                </div>
                            </div>

                        </div>
                    </div>  

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                               <label style="margin-left: 20px;">Swab Head Width (mm)</label>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadwidth1" id="swabheadwidth" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['arrswabheadwidth']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadwidth2" id="swabheadwidth" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['arrswabheadwidth']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>


                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadwidth3" id="swabheadwidth" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrswabheadwidth']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>


                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadwidth4" id="swabheadwidth" placeholder="Enter Actual" value="<?php echo $user->value4Actual($row['arrswabheadwidth']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadwidth5" id="swabheadwidth" placeholder="Enter Actual" value="<?php echo $user->value5Actual($row['arrswabheadwidth']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadwidth6" id="swabheadwidth" placeholder="Enter Actual" value="<?php echo $user->value6Actual($row['arrswabheadwidth']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadwidth7" id="swabheadwidth" placeholder="Enter Actual" value="<?php echo $user->value7Actual($row['arrswabheadwidth']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                   <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation2($user->value1Actual($row['arrswabheadwidth']),
                              $user->value2Actual($row['arrswabheadwidth']),
                                $user->value3Actual($row['arrswabheadwidth']),
                                $user->value4Actual($row['arrswabheadwidth']),
                                $user->value5Actual($row['arrswabheadwidth']),
                                $user->value6Actual($row['arrswabheadwidth']),
                                $user->value7Actual($row['arrswabheadwidth']));?></div>  
                                    </div>
                                  </div>
                                </div>
                            </div>

                        </div>
                    </div> 
                                       
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                               <label style="margin-left: 20px;">Swab Head Thickness (mm)</label>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadthickness1" id="swabheadthickness" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['arrswabheadthickness']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadthickness2" id="swabheadthickness" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['arrswabheadthickness']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadthickness3" id="swabheadthickness" placeholder="Enter Actual"  value="<?php echo $user->value3Actual($row['arrswabheadthickness']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadthickness4" id="swabheadthickness" placeholder="Enter Actual"  value="<?php echo $user->value4Actual($row['arrswabheadthickness']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadthickness5" id="swabheadthickness" placeholder="Enter Actual"  value="<?php echo $user->value5Actual($row['arrswabheadthickness']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadthickness6" id="swabheadthickness" placeholder="Enter Actual"  value="<?php echo $user->value6Actual($row['arrswabheadthickness']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadthickness7" id="swabheadthickness" placeholder="Enter Actual"  value="<?php echo $user->value7Actual($row['arrswabheadthickness']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation2($user->value1Actual($row['arrswabheadthickness']),
                       $user->value2Actual($row['arrswabheadthickness']),
                        $user->value3Actual($row['arrswabheadthickness']),
                        $user->value4Actual($row['arrswabheadthickness']),
                        $user->value5Actual($row['arrswabheadthickness']),
                        $user->value6Actual($row['arrswabheadthickness']),
                        $user->value7Actual($row['arrswabheadthickness']));?></div>                                     
                                    </div>
                                  </div>
                                </div>
                            </div>

                        </div>
                    </div><br>
                                       
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                               <label style="margin-left: 20px;">Swab Handle Width (mm)</label>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlewidth1" id="swabhandlewidth" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['arrswabhandlewidth']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlewidth2" id="swabhandlewidth" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['arrswabhandlewidth']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlewidth3" id="swabhandlewidth" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrswabhandlewidth']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlewidth4" id="swabhandlewidth" placeholder="Enter Actual" value="<?php echo $user->value4Actual($row['arrswabhandlewidth']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlewidth5" id="swabhandlewidth" placeholder="Enter Actual" value="<?php echo $user->value5Actual($row['arrswabhandlewidth']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlewidth6" id="swabhandlewidth" placeholder="Enter Actual" value="<?php echo $user->value6Actual($row['arrswabhandlewidth']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlewidth7" id="swabhandlewidth" placeholder="Enter Actual" value="<?php echo $user->value7Actual($row['arrswabhandlewidth']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                                                          <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation2($user->value1Actual($row['arrswabhandlewidth']),
                       $user->value2Actual($row['arrswabhandlewidth']),
                        $user->value3Actual($row['arrswabhandlewidth']),
                        $user->value4Actual($row['arrswabhandlewidth']),
                        $user->value5Actual($row['arrswabhandlewidth']),
                        $user->value6Actual($row['arrswabhandlewidth']),
                        $user->value7Actual($row['arrswabhandlewidth']));?></div>  
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                        </div>
                    </div> 
                                       
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                               <label style="margin-left: 20px;">Swab Handle Thickness (mm)</label>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlethickness1" id="swabhandlethickness" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['arrswabhandlethickness']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlethickness2" id="swabhandlethickness" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['arrswabhandlethickness']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlethickness3" id="swabhandlethickness" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrswabhandlethickness']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlethickness4" id="swabhandlethickness" placeholder="Enter Actual" value="<?php echo $user->value4Actual($row['arrswabhandlethickness']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlethickness5" id="swabhandlethickness" placeholder="Enter Actual" value="<?php echo $user->value5Actual($row['arrswabhandlethickness']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlethickness6" id="swabhandlethickness" placeholder="Enter Actual" value="<?php echo $user->value6Actual($row['arrswabhandlethickness']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlethickness7" id="swabhandlethickness" placeholder="Enter Actual" value="<?php echo $user->value7Actual($row['arrswabhandlethickness']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                        <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation2($user->value1Actual($row['arrswabhandlewidth']),
                                        $user->value2Actual($row['arrswabhandlewidth']),
                                        $user->value3Actual($row['arrswabhandlewidth']),
                                        $user->value4Actual($row['arrswabhandlewidth']),
                                        $user->value5Actual($row['arrswabhandlewidth']),
                                        $user->value6Actual($row['arrswabhandlewidth']),
                                        $user->value7Actual($row['arrswabhandlewidth']));?></div>                                       
                                    </div>
                                  </div>
                                </div>
                            </div>

                        </div>
                    </div>  
                                       
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                               <label style="margin-left: 20px;">Swab Handle Diameter (mm)</label>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlediameter1" id="swabhandlediameter" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['arrswabhandlediameter']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlediameter2" id="swabhandlediameter" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['arrswabhandlediameter']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlediameter3" id="swabhandlediameter" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrswabhandlediameter']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>


                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlediameter4" id="swabhandlediameter" placeholder="Enter Actual" value="<?php echo $user->value4Actual($row['arrswabhandlediameter']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>


                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlediameter5" id="swabhandlediameter" placeholder="Enter Actual" value="<?php echo $user->value5Actual($row['arrswabhandlediameter']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>


                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlediameter6" id="swabhandlediameter" placeholder="Enter Actual" value="<?php echo $user->value6Actual($row['arrswabhandlediameter']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>


                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlediameter7" id="swabhandlediameter" placeholder="Enter Actual" value="<?php echo $user->value7Actual($row['arrswabhandlediameter']);?>" disabled>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                                                          <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation2($user->value1Actual($row['arrswabhandlediameter']),
                                      $user->value2Actual($row['arrswabhandlediameter']),
                                        $user->value3Actual($row['arrswabhandlediameter']),
                                        $user->value4Actual($row['arrswabhandlediameter']),
                                        $user->value5Actual($row['arrswabhandlediameter']),
                                        $user->value6Actual($row['arrswabhandlediameter']),
                                        $user->value7Actual($row['arrswabhandlediameter']));?></div>        
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div> 
              </div>


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
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention"  value="<?php echo $user->value1Actual($row['substrateDimention']);?>" placeholder="Enter Minimum" value="<?php echo $user->value1Actual($row['substrateDimention']);?>" disabled>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention"  value="<?php echo $user->value2Actual($row['substrateDimention']);?>" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['substrateDimention']);?>" disabled>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention"  value="<?php echo $user->value3Actual($row['substrateDimention']);?>" placeholder="Enter Actual" onkeyup="validateSubstraateVal()" disabled>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention" value="<?php echo $user->value4Actual($row['substrateDimention']);?>"  placeholder="Enter Actual" onkeyup="validateSubstraateVal()" disabled>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention"  value="<?php echo $user->value5Actual($row['substrateDimention']);?>" placeholder="Enter Actual" onkeyup="validateSubstraateVal()" disabled>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention"  value="<?php echo $user->value6Actual($row['substrateDimention']);?>" placeholder="Enter Actual" onkeyup="validateSubstraateVal()" disabled>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention"  value="<?php echo $user->value7Actual($row['substrateDimention']);?>" placeholder="Enter Actual" onkeyup="validateSubstraateVal()" disabled>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                            <div class="col-sm">
                                               <div class="container">
                                                  <div class="row">
                                                    <div class="col-sm">
                                                      <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation2($user->value1Actual($row['substrateDimention']),
                                                            $user->value2Actual($row['substrateDimention']),
                                                            $user->value3Actual($row['substrateDimention']),
                                                            $user->value4Actual($row['substrateDimention']),
                                                            $user->value5Actual($row['substrateDimention']),
                                                            $user->value6Actual($row['substrateDimention']),
                                                            $user->value7Actual($row['substrateDimention']));?></div>         
                                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>      

                

   <?php if($row['type'] != 'In-Process Audit') { ?>
       

                                <div class="form-group">        
                                    <div class="row">
                                        <div class="col-sm-2">
                                           <label style="margin-left: 20px;">Pull / Seal Strength Specs  (mm)</label>
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
                                                 <input type="text" class="form-control pullSeatTest-value" id="pullSeatTest" placeholder="Enter Maximum" value="<?php echo $user->value2Actual($row['pullSeatTest']);?>"
disabled>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control pullSeatTest-value" id="pullSeatTest" placeholder="Enter Actual" onkeyup="validatePullSeatTest()"value="<?php echo $user->value3Actual($row['pullSeatTest']);?>"
disabled>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control pullSeatTest-value" id="pullSeatTest" placeholder="Enter Actual" onkeyup="validatePullSeatTest()"value="<?php echo $user->value4Actual($row['pullSeatTest']);?>"
disabled>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control pullSeatTest-value" id="pullSeatTest" placeholder="Enter Actual" onkeyup="validatePullSeatTest()"value="<?php echo $user->value5Actual($row['pullSeatTest']);?>"
disabled>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control pullSeatTest-value" id="pullSeatTest" placeholder="Enter Actual" onkeyup="validatePullSeatTest()"value="<?php echo $user->value6Actual($row['pullSeatTest']);?>"
disabled>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control pullSeatTest-value" id="pullSeatTest" placeholder="Enter Actual" onkeyup="validatePullSeatTest()"value="<?php echo $user->value7Actual($row['pullSeatTest']);?>"
disabled>
                                                </div>
                                              </div>
                                            </div>
                                        </div>


                                               <div class="col-sm">
                                               <div class="container">
                                                  <div class="row">
                                                    <div class="col-sm">
                                                      <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation2($user->value1Actual($row['substrateDimention']),
                                                            $user->value2Actual($row['pullSeatTest']),
                                                            $user->value3Actual($row['pullSeatTest']),
                                                            $user->value4Actual($row['pullSeatTest']),
                                                            $user->value5Actual($row['pullSeatTest']),
                                                            $user->value6Actual($row['pullSeatTest']),
                                                            $user->value7Actual($row['pullSeatTest']));?></div>         
                                                                    </div>
                                                  </div>
                                                </div>
                                            </div>


                                    </div>
                                </div>      
  <?php } ?>    
                             
                        <?php } ?>
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
                        <div class="row">
                            <div class="col-sm-2">
                               <label style="margin-left: 20px;" >No. of Tips per HT</label>
                            </div>
                            <div class="col-sm-3">
                               <input type="text" class="form-control" id="noHandleperHT" placeholder="Enter Handles" value="<?php echo $row['noHandleperHT']; ?>" disabled >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                               <label style="margin-left: 20px;" >Visual Inspection</label>
                            </div>
                            <div class="col-sm-3">
                             <select class="form-control" id="visualInpection" disabled>
                                <option value="<?php echo $row['visualInpection']; ?>"><?php echo $row['visualInpection']; ?></option>
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

                    <div class="form-group" hidden>
                        <div class="row">
                            <div class="col-sm">
                               <label style="margin-left: 20px;"></label>
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


                   <?php //if($row['type'] != "Start-up qualification" ) { ?>
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
                                        <center>
                                            <label><?php //echo str_replace("&ge;",">",$user->value1Actual($row['pulltest']));
                                                $string = $user->value1Actual($row['pulltest']);
                                                $search = ['&amp;lt;', '&amp;gt;','&ge;'];
                                                $replace = [ '<','>','>'];                                              
                                                $result = str_replace($search, $replace, $string);                                              
                                                echo $result ;
                                                ?>
                                            </label>
                                        </center>
                                    </div>
                                  </div>
                                </div>
                            </div>

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
                    <div class="form-group">
                      

                        <?php 
                            $array = explode(",", $row['arractualDataLoop']);
                            $count = count($array) /7;
                            $initialcount = (int)$count;
                            for ($i = 1; $i <= $initialcount; $i++) { ?>
                         <div class="row">
                            <?php    
                                for ($j = 1; $j <= 7; $j++) {
                                $count = ($i - 1) * 7 + $j-1 ; ?>
                                <div class="col-sm">
                                    <input type="text" class="form-control" id="actualDataLoop" placeholder="Enter Actual" value="<?php echo $user->pullTest($row['arractualDataLoop'],$count); ?>" <?php if($user->pullTest($row['arractualDataLoop'],$count)=="||") { echo "hidden"; } ?> disabled>
                                </div>
                            <?php           
                                }
                                echo "<br>";?>
                                </div>
                            <?php }
                            ?>
                        
                    </div>     
                        <br><br>
          <?php //} ?>

                  <?php if($row['type'] == "Product Change" ){     ?>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label style="color: red; margin-left: 30px$row['type'];"> NOTE:</label><br>
                                            <label style="color: red; margin-left: 100px;"> 1. 100% Location sampling for manual swabs head pulling and swabs head popping as applicable.</label><br>
                                            <label style="color: red; margin-left: 100px;"> 2. Five (5) locations sampling for swab head inserting, swab head swabbing and pull/seal strength test for Product change.</label><br>
                                        </div>
                                    </div>
                                </div>

                            <?php }  if($row['type'] == "Start-up qualification" ){     ?>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label style="color: red; margin-left: 30px$row['type'];"> NOTE:</label><br>
                                            <label style="color: red; margin-left: 100px;"> 1. 100% Location sampling for manual swabs head pulling, swabs head popping and pull/seal strength test. (as apllicable)</label><br>
                                            <label style="color: red; margin-left: 100px;"> 2. Five (5) locations sampling for swabs head inserting and swabs head swabbing.</label><br>
                                        </div>
                                    </div>
                                </div>


                           <?php } ?>      





                <?php if($row['type'] == "In-Process Audit" ) { ?>
                                <div class="form-group">
                    <div class="row">
                         <div class="col-sm">
                            <label> Visual Inspection (20 HT per Bakers Rack)  </label>
                        </div>
                         <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Actual"  class="form-control" value = "<?php echo $user->value1Actual($row['visualInspection']);?>" disabled>
                        </div>
                        
                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Remarks"  class="form-control" value = "<?php echo $user->value2Actual($row['visualInspection']);?>" disabled>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                         <div class="col-sm">
                            <label>Absorbency Test (3 Swabs), for polyester only </label>
                        </div>

                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Actual"  class="form-control" value = "<?php echo $user->value3Actual($row['visualInspection']);?>" disabled>
                        </div>
                        
                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Remarks"  class="form-control" value = "<?php echo $user->value4Actual($row['visualInspection']);?>" disabled>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                         <div class="col-sm">
                            <label>Machine TemperatureController Calibrated? </label>
                        </div>

                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Actual"  class="form-control" value = "<?php echo $user->value5Actual($row['visualInspection']);?>" disabled>
                        </div>
                        
                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Remarks"  class="form-control" value = "<?php echo $user->value6Actual($row['visualInspection']);?>" disabled>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                         <div class="col-sm">
                            <label>Machine Temperature are within specification ? </label>
                        </div>

                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Actual"  class="form-control" value = "<?php echo $user->value7Actual($row['visualInspection']);?>" disabled>
                        </div>
                        
                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Remarks"  class="form-control" value = "<?php echo $user->value8Actual($row['visualInspection']);?>" disabled>
                        </div>
                    </div>
                    <br>


                                        <div class="row">
                        <div class="col-sm">
                            <label> Swab Handle with TEXWIPE logo ?   </label>
                            </div>
  <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Actual"  class="form-control" value = "<?php echo $user->value9Actual($row['visualInspection']);?>" disabled>
                        </div>
                        
                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Remarks"  class="form-control" value = "<?php echo $user->value10Actual($row['visualInspection']);?>" disabled>
                        </div>
                        </div>
                    </div>
                    <br>
<!--                     <div class="row">
                         <div class="col-sm">
                            <label>Machine has presense of adhesive tape </label>
                        </div>

                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Actual"  class="form-control" value = "<?php echo $user->value7Actual($row['visualInspection']);?>" disabled>
                        </div>
                        
                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Remarks"  class="form-control" value = "<?php echo $user->value8Actual($row['visualInspection']);?>" disabled>
                        </div -->
                    </div>
      
                </div> 
                <?php } ?>


                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label style="margin-left:20px">Remarks</label>
                        </div>
                        <div class="col-sm-6">
                            <textarea id="shotRemarks" class="form-control"   name="w3review" rows="4" cols="50" width="100%"><?php echo $row['shotRemarks'];?></textarea>
                        </div>
                    </div>
                </div>


              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 


   
     <?php if($row['type'] != "In-Process Audit" ) { ?>

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
                           <input type="radio" id="option2" name="options" value="Passed" disabled <?php if($row['selectedoption'] == "Passed") {echo "checked";} ?> > Passed 
                        </div>  
                        <div class="col-sm">
                           <input type="radio" id="option2" name="options" value="Failed" disabled <?php if($row['selectedoption'] == "Failed") {echo "checked";} ?> > Failed
                        </div>  
                    </div>
                </div>   

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label style="margin-left:20px">Remarks</label>
                        </div>
                        <div class="col-sm-6">
                            <textarea id="shotproductionremarks" class="form-control"   name="w3review" rows="4" cols="50" width="100%" disabled><?php echo $row['shotproductionremarks']; ?></textarea>
                        </div>
                    </div>
                </div>   

              
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 

<?php  } } ?>

  </div>

    <div class="modal fade" id="approveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"style="background-color: #111E6C; color: white;">
                    <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                </div>
                <div class="modal-body">
                    Do you to approve this checklist ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnApproveReq">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="rejectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"style="background-color: red; color: white;">
                    <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                </div>
                <div class="modal-body">
                    Do you to Reject this checklist ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnRejectReq">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pendingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"style="background-color: red; color: white;">
                    <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                </div>
                <div class="modal-body">
                    Do you to change status this checklist ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnPendingReq">Yes</button>
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
    $(document).on('click','.btnBack',function(){ 
        window.location.href = "checklist2";
    });

    $(document).on('click','.btnApprove',function(){ 
       $("#approveModal").modal("show");
    });



    $(document).on('click','.btnPending',function(){ 
       $("#pendingModal").modal("show");
    });


``
    $(document).on('click','.btnReject',function(){ 
       $("#rejectModal").modal("show");
    });

    $(document).on('click','#btnApproveReq',function(){ 
        $("#btnApproveReq").attr("disabled", true);  
        
        var checklist_id = "<?php echo $prod_id;?>";
        var emp_id = "<?php echo $_SESSION['emp_id'];?>";
        var status = "Approve";
        var count = "1";
        var pick = "13";
        var fd = new FormData(); 
        fd.append('pick',pick);
        fd.append('status',status);
        fd.append('count',count);
        fd.append('checklist_id', checklist_id);
        fd.append('emp_id', emp_id);

        // alert(checklist_id);

        $.ajax({
            url: "../pages/codes/admin_control.php",
            data: fd,
            processData: false,
            contentType: false,
            type:'POST',
            success:function(result){
                // alert(result);
                 if($.trim(result)!=0){ 
                     $.notify("Request is Successfully ","success");   
                     setTimeout(function() { 
                         window.location.href = "checklist";
                      }, 2000);
                 }else {
                     $.notify("Problem Encounter! please contact your administrator","error");                           
                    $("#btnApproveReq").attr("disabled", false);
                 }
            }
         });

    });

    $(document).on('click','#btnRejectReq',function(){ 
        $("#btnRejectReq").attr("disabled", true);  
        var checklist_id = "<?php echo $prod_id;?>";
        var emp_id = "<?php echo $_SESSION['emp_id'];?>";
        var status = "Rejected";
        var count = "0";
        var pick = "13";
        var fd = new FormData(); 
        fd.append('pick',pick);
        fd.append('count',count);
        fd.append('status',status);
        fd.append('checklist_id', checklist_id);
        fd.append('emp_id', emp_id);

        $.ajax({
             url: "../pages/codes/admin_control.php",
             data: fd,
             processData: false,
             contentType: false,
             type:'POST',
             success:function(result){
                 if($.trim(result)!=0){ 
                     $.notify("Request is Successfully ","success");   
                     setTimeout(function() { 
                         window.location.href = "checklist";
                      }, 2000);
                 }else {
                     $.notify("Problem Encounter! please contact your administrator","error");                           
                    $("#btnRejectReq").attr("disabled", false);
                 }
             }
         });

    });



    $(document).on('click','#btnPendingReq',function(){ 
        $("#btnPendingReq").attr("disabled", true);  
        var checklist_id = "<?php echo $prod_id;?>";
        var emp_id = "<?php echo $_SESSION['emp_id'];?>";
        var status = "Pending";
        var count = "0";
        var pick = "13";
        var fd = new FormData(); 
        fd.append('pick',pick);
        fd.append('count',count);
        fd.append('status',status);
        fd.append('checklist_id', checklist_id);
        fd.append('emp_id', emp_id);

        $.ajax({
             url: "../pages/codes/admin_control.php",
             data: fd,
             processData: false,
             contentType: false,
             type:'POST',
             success:function(result){
                 if($.trim(result)!=0){ 
                     $.notify("Request is Successfully ","success");   
                     setTimeout(function() { 
                         window.location.href = "checklist";
                      }, 2000);
                 }else {
                     $.notify("Problem Encounter! please contact your administrator","error");                           
                    $("#btnPendingReq").attr("disabled", false);
                 }
             }
         });

    });


btnSuccessReq


</script>