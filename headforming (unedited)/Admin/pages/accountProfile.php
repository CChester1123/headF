<title>Profile</title>
<?php include 'includes/header.php'; ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <h3 class="profile-username text-center"><?php echo $_SESSION['name'];?></h3>
                <p class="text-muted text-center"><?php echo $_SESSION['account_type'];?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">

	                  	<div class="form-group row">
	                        <label for="inputEmail" class="col-sm-2 col-form-label">Employee ID</label>
	                        <div class="col-sm-10">
	                          	<input type="text" class="form-control" id="emp_id" placeholder="Email" value="<?php echo $_SESSION['emp_id']?>" disabled>
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
	                        <div class="col-sm-10">
	                          	<input type="text" class="form-control" id="name" placeholder="Name" value="<?php echo $_SESSION['name']?>" disabled>
	                        </div>
	                    </div>
	                   
                       
                  </div>

 
                  <div class="tab-pane" id="settings">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="oldPass" placeholder="Enter Old Password">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="newPass" placeholder="Enter New Password">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Re Type Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="retype" placeholder="Re type New Password">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#passwordModal"  >Change</button>
                        </div>
                      </div>
                
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  <!-- modal for password -->
  <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Do you want to change password??
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn_password" >Yes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

        </div>
      </div>
    </div>
  </div>
<?php include 'includes/footer.php'; ?>
<script> 


  $(document).on('click','#btn_password',function(){ 
 


    $("#btn_password").attr("disabled", true); 

    var  employID = '<?php echo $emp_id; ?>';
    var oldPass=$.trim(encodeURI($("#oldPass").val()));
    var newPass=$.trim(encodeURI($("#newPass").val()));
    var retype=$.trim(encodeURI($("#retype").val())); 
    var pick = "2";  
    
    if(oldPass == '' || newPass == '' || retype == '' ){
        $.notify("Field is empty", "error");
        $("#btn_password").attr("disabled", false);  
    } else {
        if(oldPass.length <= 5 ||newPass.length <= 5 ||retype.length <= 5  ){
          $.notify("Please does not met the length requirements", "error");
          $("#btn_password").attr("disabled", false);        
        } else {
          if(newPass != retype){
            $.notify("Password Does not match", "error");
            $("#btn_password").attr("disabled", false);  
          } else {
            var fd = new FormData();    
            fd.append('employID', employID);
            fd.append('oldPass', oldPass);
            fd.append('newPass', newPass);
            fd.append('pick',pick);
            $.ajax({
                url: "../pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                  alert(result);
                    // console.log(result);                   
                    //         $("#sign-in").removeAttr("disabled");
                    //     if($.trim(result) == 1){
                    //         $("#sign-in").attr("disabled", true);  
                    //         $.notify("Password Updated Successfully","success");   
                    //         setTimeout(function() {location.reload() }, 1000);
                    //         // alert("working");
                    //     }else{
                    //         $.notify("Password Does Not Exist","error");                           
                    //         $("#btn_password").attr("disabled", false);        
                    //     }                  
             
                }
            });
          }
        }   
    }
   });

</script>


