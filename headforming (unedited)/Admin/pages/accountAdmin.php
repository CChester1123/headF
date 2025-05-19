<title>User Accounts</title>
<?php include 'includes/header.php'; ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Accounts</h1>
          </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li><a type="button" class="btn btn-info  fas fa-address-book" data-toggle="modal" data-target="#CreateModal"> Create Account </a></li>
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
              <div class="card-header">
                <h3 class="card-title">All Accounts</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th style="text-align:center;">Employee ID</th>
                        <th style="text-align:center;">Fullname</th>
                        <th style="text-align:center;">Account</th>                  
                        <th style="text-align:center;">Status</th>                    
                        <th style="text-align:center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                        $sql=$user->getAdminAccount();
                        while($row=mysqli_fetch_array($sql)){ ?>  
                            <tr>
                                <td style="text-align:center;"><?php echo $row['employeeID']; ?></td>
                                <td style="text-align:center;"><?php echo $row['fullName']; ?></td>
                                <td style="text-align:center;"><?php echo $row['position']; ?></td>                  
                                <td style="text-align:center;"><?php echo $row['status']; ?></dh>                    
                                <td style="text-align:center;">
                                    <button type='button' id='<?php echo htmlentities(base64_encode($row['id']));?>' class='btnChangePass  btn-primary btn-sm'  title='View Record'><i class='fa fa-pen' style='font-size:15px'></i> </button> 

                                    <button type='button' id='<?php echo htmlentities(base64_encode($row['id']));?>' class='btnRemove  btn-danger btn-sm'  title='View Record'><i class='fas fa-times-circle' style='font-size:15px'></i> </button> 
                                </td>
                              </tr>
                    <?php } ?>
              
                  </tbody>
                  
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

    <!-- Start Delete Modal -->
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    Do you really want to delet this user ?
                </div>

               	<div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataSubmitDelete">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
          	
          	</div>
        </div>
    </div>
    <!-- End Delete Modal -->

    <!-- Create modal -->
	<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">System Message </h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
                <div class="card-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" id="emp_id" placeholder="Enter Username">
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Fullname">
                    </div>

                    <div class="form-group">
                        <label>Account Type</label>
        				<select id="account" class="form-control" >
        					<option value="" placeholder=""disabled> Please select a account type</option>
        				    <option value="Admin">Admin</option>
                            <option value="TeamLeader">Team Leader</option>
                            <option value="QA">Quality Assurance</option>
                            <option value="QA Manager">QA Manager</option>
                            <option value="Warehouse">Warehouse Personel</option>
                            <option value="Maintenance">Maintenance</option>
        				</select>
                    </div>   
                </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary createAccount" >Create</button>	      	
	        <button type="button" class="btn btn-Danger" data-dismiss="modal">Cancel</button>

	      </div>
	    </div>
	  </div>
	</div>

    <div class="modal fade" id="passReset" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"style="background-color: #111E6C; color: white;">
                    <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                </div>

                <div class="modal-body">
                    Do you to reset password for this account ?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnChangePass">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>

    <div class="modal fade" id="removeAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"style="background-color: red; color: white;">
                    <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                </div>

                <div class="modal-body">
                    Do you to remove this account ?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnRemove">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>
<script>

 	$(document).on('click','.createAccount',function(){ 
 		$(".createAccount").attr("disabled", true);  

        var emp_id=$.trim(encodeURI($("#emp_id").val()));
        var name=$.trim(encodeURI($("#name").val()));
        var account=$.trim(encodeURI($("#account").val()));   
        var pick="3";

        if(emp_id=="" || name==""  || account==""){
            $.notify(" Some Fields Are Empty ","warning");  
            $(".createAccount").attr("disabled", false);  
            $(".createAccount").html('Login'); 
        } else { 
            var fd = new FormData();    
            fd.append('emp_id', emp_id);
            fd.append('name',name);
            fd.append('account',account); 
            fd.append('pick',pick);

            $.ajax({
                url: "../pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    
                        if($.trim(result)!=0){
                            // $(".createAccount").attr("disabled", true);  
                            $.notify("Account Created Successfully ","success");   
                             setTimeout(function() { location.reload(); }, 2000);
                        }else {
                            $.notify("Employee ID exist","error");                           
                            $(".createAccount").attr("disabled", false);
                        }                       
                 
     
                }
            });
        }    
    });

    var id = '';
    $(document).on('click','.btnChangePass',function(){ 
        id=$(this).attr("id");
        $("#passReset").modal("show");
    });

    $(document).on('click','#btnChangePass',function(){ 
        $("#btnChangePass").attr("disabled", true);  
        var pick="11";
        var password = "Texwipe2024!";

        var fd = new FormData();    
        fd.append('pick', pick);
        fd.append('password',password);
        fd.append('id',id);

        $.ajax({
                url: "../pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    
                        if($.trim(result)!=0){
                            // $(".createAccount").attr("disabled", true);  
                            $.notify("Account reset Successfully ","success");   
                             setTimeout(function() { location.reload(); }, 2000);
                        }else {
                            $.notify("Probel encounter please call help","error");                           
                            $("#btnChangePass").attr("disabled", false);
                        }                       
                 
     
                }
        });
    });

    $(document).on('click','.btnRemove',function(){
        id=$(this).attr("id");
        $("#removeAccount").modal("show");
    });    

    $(document).on('click','#btnRemove',function(){
        var pick="12";        
        var status = "Inactive";
        var fd = new FormData();    
        fd.append('pick', pick);
        fd.append('status',status);
        fd.append('id',id);

        $.ajax({
                url: "../pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    
                        if($.trim(result)!=0){
                            // $(".createAccount").attr("disabled", true);  
                            $.notify("Account Remove Successfully ","success");   
                             setTimeout(function() { location.reload(); }, 2000);
                        }else {
                            $.notify("Probel encounter please call help","error");                           
                            $("#btnChangePass").attr("disabled", false);
                        }                       
                 
     
                }
        });
    });  


</script>