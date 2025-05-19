<title>Products</title>
<?php include 'includes/header.php'; ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li><a type="button" class="btn btn-info fa fa-plus-square createProduct" data-toggle="modal" data-target="#CreateModal"> Add Products </a></li>
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
                    <th style="text-align:center;">Action</th>
                    <th style="text-align:center;">Product Name</th>
                    <th style="text-align:center;">Product Description</th>        
                                        <th style="text-align:center;">Status</th>         
                  </tr>
                  </thead>
                    <tbody>
                    <?php
                        $sql=$user->getProduct();
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;">
                                <button type='button' id='<?php echo htmlentities(base64_encode($row['id']));?>' class='btnView  btn-primary btn-sm'  title='View Record'><i class='fa fa-search-plus' style='font-size:15px'></i> </button> 
                                <button type='button' id='<?php echo htmlentities(base64_encode($row['id']));?>' class='btnEdit  btn-success btn-sm'  title='View Record'><i class='fa fa-pen' style='font-size:15px'></i> </button> 
                            </td>
                            <td style="text-align:center;"><?php echo htmlentities($row['product']);?></td>          
                            <td style="text-align:center;"><?php echo htmlentities($row['productDesc']);?></td>    
                            <td style="text-align:center;"><?php echo htmlentities($row['status']);?></td>
                                                                   
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


<?php include 'includes/footer.php'; ?>
<script>
    var id = "";
    $(document).on('click','.btnEdit',function(){ 
        id=$(this).attr("id");
        location.href = "productEdit?id=" + id ;  
    });

    $(document).on('click','.btnView',function(){
        id=$(this).attr("id");
        location.href = "productView?id=" + id ;  
    });


    $(document).on('click','.createProduct',function(){
        location.href = "productCreate";  
    });

 	// $(document).on('click','.createAccount',function(){ 
 	// 	$(".createAccount").attr("disabled", true);  

    //     var emp_id=$.trim(encodeURI($("#emp_id").val()));
    //     var name=$.trim(encodeURI($("#name").val()));
    //     var account=$.trim(encodeURI($("#account").val()));   
    //     var pick="3";

    //     if(emp_id=="" || name==""  || account==""){
    //         $.notify(" Some Fields Are Empty ","warning");  
    //         $(".createAccount").attr("disabled", false);  
    //         $(".createAccount").html('Login'); 
    //     } else { 
    //         var fd = new FormData();    
    //         fd.append('emp_id', emp_id);
    //         fd.append('name',name);
    //         fd.append('account',account); 
    //         fd.append('pick',pick);

    //         $.ajax({
    //             url: "../pages/codes/admin_control.php",
    //             data: fd,
    //             processData: false,
    //             contentType: false,
    //             type:'POST',
    //             success:function(result){
                    
    //                     if($.trim(result)!=0){
    //                         // $(".createAccount").attr("disabled", true);  
    //                         $.notify("Account Created Successfully ","success");   
    //                          setTimeout(function() { location.reload(); }, 2000);
    //                     }else {
    //                         $.notify("Employee ID exist","error");                           
    //                         $(".createAccount").attr("disabled", false);
    //                     }                       
                 
     
    //             }
    //         });
    //     }    


    // });






</script>