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
                <h1> Edit checklist </h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

                <?php //if($_SESSION['emp_id'] ==  $row['acknowledge'] &&  $row['status_TL'] != "Approve" ||  $_SESSION['emp_id'] == $row['maintenancecheced'] && $row['status_maintenance'] != "Approve" || $_SESSION['account_type'] == "Admin" &&  $row['status'] != "Approve" || $_SESSION['account_type'] == "QA Manager" &&  $row['status'] != "Approve") { ?>
                 
                    <?php if($row['status'] != "Approve") { ?>
                         <li hidden><button id="toggleButton" class="form-control btn btn-info mr-1 ">Add Textbox</button></li>
                        <li><a type="button" class="btn btn-primary mr-1 fas fa-check-circle btnApprove"> Save Changes </a></li>
                        <li><a type="button" class="btn btn-danger mr-1 fas far fa-arrow-alt-circle-left btnBack"> Back  </a></li>
                    <?php }  ?>
                <?php //}  ?>
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
                            <input type="text" class="form-control" id="workorder" placeholder="Enter Work Order" value="<?php echo $row['workorder']; ?>" >
                        </div>                       
                        <div class="col-sm-3">
                            <label>Date</label>
                            <input type="text" class="form-control" id="date" placeholder="Enter Product Description"value="<?php echo (htmlentities($row['date']) == '' ? date("F j, Y") : $row['date']); ?>" disabled>
                        </div>


                                 <?php if($row['type'] != 'In-Process Audit') { ?>
 
                                                  <div class="col-sm-3">
                            <label>Setup Number</label>
                            <input type="number" class="form-control" id="setUpNUmber" placeholder="Enter Start Up Num" value="<?php echo $row['setUpNUmber']; ?>" >
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
                            <input type="number" class="form-control" id="machineNo" placeholder="Enter Machine No."value="<?php echo $row['machineNo']; ?>" >
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
                            <select class="form-control" id="acknowledge" data-placeholder="Acknowledge By" style="width: 100%;" >
                                <?php 
                                $sql=$user->selectTeamlead();
                                while($list=mysqli_fetch_array($sql)){?>
                                  <option value="<?php echo $list['employeeID']; ?>" <?php if($list['employeeID'] ==$row['acknowledge']) { echo "selected"; } ?> ><?php echo $list['fullName']; ?></option>
                                <?php } ?>  
                            </select>
                        </div>
                        <div class="col-sm">
                            <label class="mr-1">Maintenance</label> 
                            <select class="form-control" id="maintenancecheced" data-placeholder="Maintenance By" style="width: 100%;" >
                                 <?php 
                                    $sql=$user->selectMaintenance();
                                    while($list1=mysqli_fetch_array($sql)){?>
                                        <option value="<?php echo $list1['employeeID']; ?>" <?php if($list1['employeeID'] ==$row['maintenancecheced']) { echo "selected"; } ?> > <?php echo $list1['fullName']; ?></option>
                                <?php } ?>    
                            </select>
                        </div>
                    </div>
                </div>

                   <?php if($row['type'] == "In-Process Audit" ) { ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm" >
                            <label>Operator</label>
                            <input type="text" class="form-control template" id="myTextbox" placeholder="Enter Product Name" value="<?php echo $row['template']; ?>" >
                        </div> 
                        <div class="col-sm">
                            <label>Time</label>
                            <input type="text" class="form-control trans_num" id="myTextbox2" value="<?php echo $row['trans_num']; ?>" >
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
     

                    <?php if($row['type'] == "Start-up qualification" ){ ?>
                        <h3 class="card-title">START-UP QUALIFICATION</h3>
                    <?php } else if ($row['type'] == "Product Change") { ?>
                        <h3 class="card-title">PRODUCT CHANGE</h3>
                    <?php } else { ?> 
                        <h3 class="card-title">IN-PROCESS QUALITY AUDIT</h3>
                    <?php } ?>    
               
              </div>

                   <?php //if($row['type'] == "In-Process Audit" ) { ?>

                <div class="card-body">   


                    <div class="form-group">
                        <div class="row">

                            <div class="col-sm">
                                <label>Machine  to be used</label>
                                <input type="text" class="form-control" id="machinetobeused" placeholder="Enter Handle" value="<?php echo $row['machinetobeused']; ?>" >
                            </div>

                            <div class="col-sm">
                                <label>Operation</label>
                                <select class="form-control" id="operation"  >
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

                    <br>    

                    <?php if($row['type'] == "Start-up qualification"  ){ ?>
         
                   <!--      <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>No maintenance tools left behind after set up?</label>
                                </div>
                                <div class="col-sm-3">
                                    <input type="checkbox" id="maintenance" name="maintenance" value="checked" <?php if($row['maintenance'] == "checked") { echo "checked";}  ?>  >
                                </div>
                            </div>
                        </div>     -->        
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
        <?php// }else { ?>
              <!-- /.card-header -->
         <!--      <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label>Handle</label>
                            <input type="text" class="form-control" id="handle" placeholder="Enter Handle" value="<?php echo $row['handle']; ?>" disabled>
                        </div>
                        <div class="col-sm">
                            <label>Machine  to be used</label>
                            <select class="form-control" id="machinetobeused" >
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
                            <input type="text" class="form-control" id="substrate" placeholder="Enter Handle" value="<?php echo $row['substrate']; ?>" >
                        </div>
                        <div class="col-sm">
                            <label>Operation</label>
                            <select class="form-control" id="operation" >
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
                               <textarea id="preinstallremarks" class="form-control"   name="w3review" rows="4" cols="50" width="100%" ><?php echo $row['preinstallremarks']; ?></textarea>
                        </div>
                    </div>
                </div>   

              </div>
            </div> -->
              <?php //} ?>
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
                                 <input type="text" class="form-control cuttingforce3" id="cuttingforce" placeholder="Enter Actual" placeholder="Enter Actual"  value="<?php echo$value3cutting =  $user->value3Actual($row['arrcuttingforce']);?>" >
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
                                 <input type="text" class="form-control sealingtime3" id="sealingtime" placeholder="Enter Actual"  value="<?php echo $user->value3Actual($row['arrsealingtime']);?>" >
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
                                 <input type="text" class="form-control cuttingspeed3" id="cuttingspeed" placeholder="Enter Actual"value="<?php echo $user->value3Actual($row['arrcuttingspeed']);?>" >
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation($user->value1Actual($row['arrcuttingspeed']),$user->value2Actual($row['arrcuttingspeed']),$user->value3Actual($row['arrcuttingspeed']));?></div>
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
                                 <input type="text" class="form-control approachingposition3" id="approachingposition" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrapproachingposition']);?>" >
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation($user->value1Actual($row['arrapproachingposition']),$user->value2Actual($row['arrapproachingposition']),$user->value3Actual($row['arrapproachingposition']));?></div>
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
                                 <input type="text" class="form-control sealingpositionspeed3" id="sealingpositionspeed" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrsealingpositionspeed']);?>" >
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation($user->value1Actual($row['arrsealingpositionspeed']), $user->value2Actual($row['arrsealingpositionspeed']),   $user->value3Actual($row['arrsealingpositionspeed']));?></div>
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
                                 <input type="text" class="form-control sealingposition3" id="sealingposition" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrsealingposition']);?>" >
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                 <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation($user->value1Actual($row['arrsealingposition']),$user->value2Actual($row['arrsealingposition']),$user->value3Actual($row['arrsealingposition']));?></div>
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
                                 <input type="text" class="form-control uppermoldtemp3" id="uppermoldtemp" placeholder="Enter Actual"value="<?php echo $user->value3Actual($row['arruppermoldtemp']);?>" >
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                    <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation($user->value1Actual($row['arruppermoldtemp']),$user->value2Actual($row['arruppermoldtemp']),$user->value3Actual($row['arruppermoldtemp']));?></div>     
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
                                 <input type="text" class="form-control lowermoldtemp3" id="lowermoldtemp" placeholder="Enter Actual"value="<?php echo $user->value3Actual($row['arrlowermoldtemp']);?>"  >
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
                <?php if($row['type'] != "In-Process Audit" ) { ?>    
                    
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
                                     <input type="text" class="form-control totalLength3" id="totalLength" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrtotalLength']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control totalLength4" id="totalLength" placeholder="Enter Actual" value="<?php echo $user->value4Actual($row['arrtotalLength']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control totalLength5" id="totalLength" placeholder="Enter Actual" value="<?php echo $user->value5Actual($row['arrtotalLength']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control totalLength6" id="totalLength" placeholder="Enter Actual" value="<?php echo $user->value6Actual($row['arrtotalLength']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control totalLength7" id="totalLength" placeholder="Enter Actual" value="<?php echo $user->value7Actual($row['arrtotalLength']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                      <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation2($user->value1Actual($row['arrtotalLength']),$user->value2Actual($row['arrtotalLength']),$user->value3Actual($row['arrtotalLength']),$user->value4Actual($row['arrtotalLength']),$user->value5Actual($row['arrtotalLength']),$user->value6Actual($row['arrtotalLength']),$user->value7Actual($row['arrtotalLength']));?></div>         
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
                                     <input type="text" class="form-control swabheadlength3" id="swabheadlength" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrswabheadlength']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadlength4" id="swabheadlength" placeholder="Enter Actual" value="<?php echo $user->value4Actual($row['arrswabheadlength']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadlength5" id="swabheadlength" placeholder="Enter Actual" value="<?php echo $user->value5Actual($row['arrswabheadlength']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadlength6" id="swabheadlength" placeholder="Enter Actual" value="<?php echo $user->value6Actual($row['arrswabheadlength']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadlength7" id="swabheadlength" placeholder="Enter Actual" value="<?php echo $user->value7Actual($row['arrswabheadlength']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                          <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation2($user->value1Actual($row['arrswabheadlength']),$user->value2Actual($row['arrswabheadlength']),$user->value3Actual($row['arrswabheadlength']),$user->value4Actual($row['arrswabheadlength']),$user->value5Actual($row['arrswabheadlength']),$user->value6Actual($row['arrswabheadlength']),$user->value7Actual($row['arrswabheadlength']));?></div>                  
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
                                     <input type="text" class="form-control swabheadwidth3" id="swabheadwidth" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrswabheadwidth']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>


                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadwidth4" id="swabheadwidth" placeholder="Enter Actual" value="<?php echo $user->value4Actual($row['arrswabheadwidth']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadwidth5" id="swabheadwidth" placeholder="Enter Actual" value="<?php echo $user->value5Actual($row['arrswabheadwidth']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadwidth6" id="swabheadwidth" placeholder="Enter Actual" value="<?php echo $user->value6Actual($row['arrswabheadwidth']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadwidth7" id="swabheadwidth" placeholder="Enter Actual" value="<?php echo $user->value7Actual($row['arrswabheadwidth']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                   <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation2($user->value1Actual($row['arrswabheadwidth']),$user->value2Actual($row['arrswabheadwidth']),$user->value3Actual($row['arrswabheadwidth']),$user->value4Actual($row['arrswabheadwidth']),$user->value5Actual($row['arrswabheadwidth']),$user->value6Actual($row['arrswabheadwidth']),$user->value7Actual($row['arrswabheadwidth']));?></div>  
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
                                     <input type="text" class="form-control swabheadthickness3" id="swabheadthickness" placeholder="Enter Actual"  value="<?php echo $user->value3Actual($row['arrswabheadthickness']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadthickness4" id="swabheadthickness" placeholder="Enter Actual"  value="<?php echo $user->value4Actual($row['arrswabheadthickness']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadthickness5" id="swabheadthickness" placeholder="Enter Actual"  value="<?php echo $user->value5Actual($row['arrswabheadthickness']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadthickness6" id="swabheadthickness" placeholder="Enter Actual"  value="<?php echo $user->value6Actual($row['arrswabheadthickness']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabheadthickness7" id="swabheadthickness" placeholder="Enter Actual"  value="<?php echo $user->value7Actual($row['arrswabheadthickness']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation2($user->value1Actual($row['arrswabheadthickness']),$user->value2Actual($row['arrswabheadthickness']),$user->value3Actual($row['arrswabheadthickness']),$user->value4Actual($row['arrswabheadthickness']),$user->value5Actual($row['arrswabheadthickness']),$user->value6Actual($row['arrswabheadthickness']),$user->value7Actual($row['arrswabheadthickness']));?></div>                                     
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
                                     <input type="text" class="form-control swabhandlewidth3" id="swabhandlewidth" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrswabhandlewidth']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlewidth4" id="swabhandlewidth" placeholder="Enter Actual" value="<?php echo $user->value4Actual($row['arrswabhandlewidth']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlewidth5" id="swabhandlewidth" placeholder="Enter Actual" value="<?php echo $user->value5Actual($row['arrswabhandlewidth']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlewidth6" id="swabhandlewidth" placeholder="Enter Actual" value="<?php echo $user->value6Actual($row['arrswabhandlewidth']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlewidth7" id="swabhandlewidth" placeholder="Enter Actual" value="<?php echo $user->value7Actual($row['arrswabhandlewidth']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                        <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation2($user->value1Actual($row['arrswabhandlewidth']),$user->value2Actual($row['arrswabhandlewidth']),$user->value3Actual($row['arrswabhandlewidth']),$user->value4Actual($row['arrswabhandlewidth']),$user->value5Actual($row['arrswabhandlewidth']),$user->value6Actual($row['arrswabhandlewidth']),$user->value7Actual($row['arrswabhandlewidth']));?></div>  
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
                                     <input type="text" class="form-control swabhandlethickness3" id="swabhandlethickness" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrswabhandlethickness']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlethickness4" id="swabhandlethickness" placeholder="Enter Actual" value="<?php echo $user->value4Actual($row['arrswabhandlethickness']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlethickness5" id="swabhandlethickness" placeholder="Enter Actual" value="<?php echo $user->value5Actual($row['arrswabhandlethickness']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlethickness6" id="swabhandlethickness" placeholder="Enter Actual" value="<?php echo $user->value6Actual($row['arrswabhandlethickness']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlethickness7" id="swabhandlethickness" placeholder="Enter Actual" value="<?php echo $user->value7Actual($row['arrswabhandlethickness']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                        <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation2($user->value1Actual($row['arrswabhandlewidth']),$user->value2Actual($row['arrswabhandlewidth']),$user->value3Actual($row['arrswabhandlewidth']),$user->value4Actual($row['arrswabhandlewidth']),$user->value5Actual($row['arrswabhandlewidth']),$user->value6Actual($row['arrswabhandlewidth']),$user->value7Actual($row['arrswabhandlewidth']));?></div>                                       
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
                                     <input type="text" class="form-control swabhandlediameter3" id="swabhandlediameter" placeholder="Enter Actual" value="<?php echo $user->value3Actual($row['arrswabhandlediameter']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>


                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlediameter4" id="swabhandlediameter" placeholder="Enter Actual" value="<?php echo $user->value4Actual($row['arrswabhandlediameter']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>


                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlediameter5" id="swabhandlediameter" placeholder="Enter Actual" value="<?php echo $user->value5Actual($row['arrswabhandlediameter']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>


                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlediameter6" id="swabhandlediameter" placeholder="Enter Actual" value="<?php echo $user->value6Actual($row['arrswabhandlediameter']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>


                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     <input type="text" class="form-control swabhandlediameter7" id="swabhandlediameter" placeholder="Enter Actual" value="<?php echo $user->value7Actual($row['arrswabhandlediameter']);?>" >
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                        <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation2($user->value1Actual($row['arrswabhandlediameter']),$user->value2Actual($row['arrswabhandlediameter']),$user->value3Actual($row['arrswabhandlediameter']),$user->value4Actual($row['arrswabhandlediameter']),$user->value5Actual($row['arrswabhandlediameter']),$user->value6Actual($row['arrswabhandlediameter']),$user->value7Actual($row['arrswabhandlediameter']));?></div>        
                                    </div>
                                  </div>
                                </div>
                            </div>


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
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention"  value="<?php echo $user->value3Actual($row['substrateDimention']);?>" placeholder="Enter Actual" onkeyup="validateSubstraateVal()" >
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention" value="<?php echo $user->value4Actual($row['substrateDimention']);?>"  placeholder="Enter Actual" onkeyup="validateSubstraateVal()" >
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention"  value="<?php echo $user->value5Actual($row['substrateDimention']);?>" placeholder="Enter Actual" onkeyup="validateSubstraateVal()" >
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention"  value="<?php echo $user->value6Actual($row['substrateDimention']);?>" placeholder="Enter Actual" onkeyup="validateSubstraateVal()" >
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control substrateDimention-value" id="substrateDimention"  value="<?php echo $user->value7Actual($row['substrateDimention']);?>" placeholder="Enter Actual" onkeyup="validateSubstraateVal()" >
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                            <div class="col-sm">
                                               <div class="container">
                                                  <div class="row">
                                                    <div class="col-sm">
                                                      <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation2($user->value1Actual($row['substrateDimention']),$user->value2Actual($row['substrateDimention']),$user->value3Actual($row['substrateDimention']),$user->value4Actual($row['substrateDimention']),$user->value5Actual($row['substrateDimention']),$user->value6Actual($row['substrateDimention']),$user->value7Actual($row['substrateDimention']));?></div>         
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
>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control pullSeatTest-value" id="pullSeatTest" placeholder="Enter Actual" onkeyup="validatePullSeatTest()"value="<?php echo $user->value3Actual($row['pullSeatTest']);?>"
>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control pullSeatTest-value" id="pullSeatTest" placeholder="Enter Actual" onkeyup="validatePullSeatTest()"value="<?php echo $user->value4Actual($row['pullSeatTest']);?>"
>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control pullSeatTest-value" id="pullSeatTest" placeholder="Enter Actual" onkeyup="validatePullSeatTest()"value="<?php echo $user->value5Actual($row['pullSeatTest']);?>"
>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control pullSeatTest-value" id="pullSeatTest" placeholder="Enter Actual" onkeyup="validatePullSeatTest()"value="<?php echo $user->value6Actual($row['pullSeatTest']);?>"
>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm">
                                                 <input type="text" class="form-control pullSeatTest-value" id="pullSeatTest" placeholder="Enter Actual" onkeyup="validatePullSeatTest()"value="<?php echo $user->value7Actual($row['pullSeatTest']);?>"
>
                                                </div>
                                              </div>
                                            </div>
                                        </div>


                                               <div class="col-sm">
                                               <div class="container">
                                                  <div class="row">
                                                    <div class="col-sm">
                                                      <div id="remarks1"  style="margin-top:8px"><?php echo $user->checkValidation2($user->value1Actual($row['substrateDimention']),$user->value2Actual($row['pullSeatTest']),$user->value3Actual($row['pullSeatTest']),$user->value4Actual($row['pullSeatTest']),$user->value5Actual($row['pullSeatTest']),$user->value6Actual($row['pullSeatTest']),$user->value7Actual($row['pullSeatTest']));?></div>         
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>


                                    </div>
                                </div>      
  <?php } ?>   

                             
                        <?php } ?>
                    <hr>

                        
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
                             <select class="form-control" id="visualInpection" >
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
                                        <center> <label>
                                            <?php 
                                                $string = $user->value1Actual($row['pulltest']);
                                                $search = ['&amp;lt;', '&amp;gt;','&ge;'];
                                                $replace = [ '<','>','>'];
                                                $result = str_replace($search, $replace, $string);                                          
                                                echo $result;
                                            ?>

                                             <input type="text" class="form-control" id="pulltestdesc" placeholder="Enter Actual" placeholder="Enter Actual" value="<?php echo $result;?>" hidden>
                                        </label></center>
                                    </div>
                                  </div>
                                </div>
                            </div>


    <!--                         <div class="col-sm">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                        <center> <label>Swabs Dimensions </label></center>
                                    </div>
                                  </div>
                                </div>
                            </div>
 -->

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
                            $count = count($array)  /7;
                            $initialcount = (int)$count;
                            for ($i = 1; $i <= $initialcount; $i++) { ?>
                          <div class="row">
                            <?php    
                                for ($j = 1; $j <= 7; $j++) {
                                $count = ($i - 1) * 7 + $j-1 ; ?>
                                <div class="col-sm">
                              
                                    <input type="text" class="form-control" id="actualDataLoop" placeholder="Enter Actual" value="<?php echo $user->pullTest($row['arractualDataLoop'],$count); ?>" <?php if($user->pullTest($row['arractualDataLoop'],$count)=="||") { echo "hidden"; } ?> >
                                 
                                </div>
                            <?php           
                                }
                                echo "<br>";?>
                                </div>
                            <?php }
                            ?>
                        
                    </div>     

<?php //} ?>
                    <br>
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
 

 
                    <br>

                <?php if($row['type'] == "In-Process Audit" ) { ?>
                <div class="form-group">
                    <div class="row">
                         <div class="col-sm">
                            <label> Visual Inspection (20 HT per Bakers Rack)  </label>
                        </div>

                        <div class="col-sm">
                            <input list="browser5" id="visualInspection" name="visualInspection" placeholder="Enter Actual"  class="form-control" value = "<?php echo $user->value1Actual($row['visualInspection']);?>">
                            <datalist id="browser5">
                              <option value="Passed">
                              <option value="Failed">
                            </datalist>
                        </div>
                        
                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Remarks"  class="form-control" value = "<?php echo $user->value2Actual($row['visualInspection']);?>" >
                        </div>
                    </div>
                    <br>

                    <div class="row">
                         <div class="col-sm">
                            <label>Absorbency Test (3 Swabs), for polyester only </label>
                        </div>

                 
                        <div class="col-sm">
                            <input list="browsers" id="visualInspection" name="visualInspection" placeholder="Enter Actual"  class="form-control"  value = "<?php echo $user->value3Actual($row['visualInspection']);?>">
                            <datalist id="browsers">
                              <option value="Yes">
                              <option value="N/A">
                            </datalist>
                        </div>
          
                        
                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Remarks"  class="form-control" value = "<?php echo $user->value4Actual($row['visualInspection']);?>" >
                        </div>
                    </div>
                    <br>
                    <div class="row">
                         <div class="col-sm">
                            <label>Machine Temperature Controller Calibrated? </label>
                        </div>

        

                        <div class="col-sm">
                            <input list="browser2" id="visualInspection" name="visualInspection" placeholder="Enter Actual"  class="form-control" value = "<?php echo $user->value5Actual($row['visualInspection']);?>">
                              <datalist id="browser2">
                              <option value="Yes">
                              <option value="No">
                            </datalist>
                        </div>
                        
                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Remarks"  class="form-control" value = "<?php echo $user->value6Actual($row['visualInspection']);?>" >
                        </div>
                    </div>
                    <br>
                    <div class="row">
                         <div class="col-sm">
                            <label>Machine Temperature are within specification ? </label>
                        </div>

                        <div class="col-sm">
                            <input list="browser3" id="visualInspection" name="visualInspection" placeholder="Enter Actual"  class="form-control" value = "<?php echo $user->value7Actual($row['visualInspection']);?>" >
                            <datalist id="browser3">
                              <option value="Yes">
                              <option value="Failed">
                            </datalist>
                        </div>
                        
                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Remarks"  class="form-control" value = "<?php echo $user->value8Actual($row['visualInspection']);?>" >
                        </div>
                    </div>
                    <br>
                    <div class="row">
                         <div class="col-sm">                            <label> Swab Handle with TEXWIPE logo ?   </label>
                        </div>

                        <div class="col-sm">
                            <input list="browser3" id="visualInspection" name="visualInspection" placeholder="Enter Actual"  class="form-control" value = "<?php echo $user->value9Actual($row['visualInspection']);?>" >
                            <datalist id="browser3">
                              <option value="Yes">
                              <option value="No">
                            </datalist>
                        </div>
                        
                        <div class="col-sm">
                            <input  id="visualInspection" name="visualInspection" placeholder="Enter Remarks"  class="form-control" value = "<?php echo $user->value10Actual($row['visualInspection']);?>" >
                        </div>
                    </div>
                    <br>
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
  <?php if($row['type'] != "In-Process Audit" ){     ?>

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
                           <input type="radio" id="option2" name="options" value="Passed"  <?php if($row['selectedoption'] == "Passed") {echo "checked";} ?> > Passed 
                        </div>  
                        <div class="col-sm">
                           <input type="radio" id="option2" name="options" value="Failed"  <?php if($row['selectedoption'] == "Failed") {echo "checked";} ?> > Failed
                        </div>  
                    </div>
                </div>   

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label style="margin-left:20px">Remarks</label>
                        </div>
                        <div class="col-sm-6">
                            <textarea id="shotproductionremarks" class="form-control"   name="w3review" rows="4" cols="50" width="100%" ><?php echo $row['shotproductionremarks']; ?></textarea>
                        </div>
                    </div>
                </div>   

            
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 

<?php } } ?>

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

</div>
<?php   include 'includes/footer.php';
        include  'includes/validation.php';
?>
<script>
    $(document).on('click','.btnBack',function(){ 
        window.location.href = "checklist";
    });

    $(document).on('click','.btnApprove',function(){ 
       $("#approveModal").modal("show");
    });

    $(document).on('click','.btnReject',function(){ 
       $("#rejectModal").modal("show");
    });

    $(document).on('click','#btnApproveReq',function(){ 
        $("#btnApproveReq").attr("disabled", true);  
        
        var checklist_id = "<?php echo $prod_id;?>";
        var pick = "14";



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

        let actualDataLoopText = document.querySelectorAll('input[id="actualDataLoop"]');
        let arractualDataLoop = [];
        actualDataLoopText.forEach((textbox) => {
            arractualDataLoop.push(textbox.value);
        });



               const options = document.getElementsByName('options');
            let selectedValue = '';

            for (const option of options) {
                if (option.checked) {
                    selectedValue = option.value;
            
                }
            }



        let visualInspectionText = document.querySelectorAll('input[id="visualInspection"]');
        let visualInspectionLoop = [];
       visualInspectionText.forEach((textbox) => {
           visualInspectionLoop.push(textbox.value);
        });
        




        var shotproductionremarks = $.trim(encodeURI($("#shotproductionremarks").val()));
        var InspectedBY = $.trim(encodeURI($("#InspectedBY").val()));
        var acknowledge = $.trim(encodeURI($("#acknowledge").val()));
        var maintenancecheced = $.trim(encodeURI($("#maintenancecheced").val()));

        var setUpNUmber = $.trim(encodeURI($("#setUpNUmber").val()));

        var template = $.trim(encodeURI($(".template").val()));
        var trans_num = $.trim(encodeURI($(".trans_num").val()));



        var handleColor = $.trim(encodeURI($("#handleColor").val()));
        var handleTreeMaterialNum = $.trim(encodeURI($("#handleTreeMaterialNum").val()));
        var machineTreeMatType = $.trim(encodeURI($("#machineTreeMatType").val()));
        var substrateType = $.trim(encodeURI($("#substrateType").val()));
                                    

        // let substrateDimensionText = document.querySelectorAll('input[id="substrateDimention"]');
        // let substrateDimensionforce = [];
        // substrateDimensionText.forEach((textbox) => {
        //     substrateDimensionforce.push(textbox.value);
        // });

      var shotRemarks = $.trim(encodeURI($("#shotRemarks").val()));
        var substrateLotNum = $.trim(encodeURI($("#substrateLotNum").val()));
        var pulltestdesc = $.trim(encodeURI($("#pulltestdesc").val()));

        var fd = new FormData(); 
        fd.append('pick',pick);
        fd.append('status',status);

        fd.append('checklist_id', checklist_id);


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
        fd.append('pullSeatTestforce',pullSeatTestforce);


        
       fd.append('shotRemarks',shotRemarks);
        fd.append('visualInspectionLoop',visualInspectionLoop);


        fd.append('substrateLotNum',substrateLotNum);

        fd.append('pulltestdesc',pulltestdesc );
        
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

    $(document).on('click','#toggleButton',function(){ 
                var textbox = document.getElementById("myTextbox");
                var textbox2 = document.getElementById("myTextbox2");
        textbox.disabled = !textbox.disabled;
        textbox2.disabled = !textbox2.disabled;
   });


    $(document).on('click','.btnBack',function(){ 
  
        window.location.href = "checklist";
    });


</script>