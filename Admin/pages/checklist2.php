<title>Checklist</title>
<?php include 'includes/header.php'; ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Checklist</h1>
          </div>
            <?php   if($_SESSION['account_type'] == 'QA' || $_SESSION['account_type'] == 'Admin' ||$_SESSION['account_type'] == 'QA Manager') { ?>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li><a type="button" class="btn btn-info fa fa-plus-square createProduct" data-toggle="modal" data-target="#CreateModal"> Create Checklist </a></li>
                    </ol>
                </div>
            <?php   } ?>
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
                    <th style="text-align:center;">Work Order</th>
                    <th style="text-align:center;">Material</th>        
                    <th style="text-align:center;">Status</th>         
                 
                                     <th style="text-align:center;">Maintenance Status</th>        
                    <th style="text-align:center;">Team Lead Status</th>  </tr>
                  </thead>
                    <tbody>
                    <?php
                        if($_SESSION['account_type'] == 'QA' || $_SESSION['account_type'] == 'Admin' ||$_SESSION['account_type'] == 'QA Manager' ){
                           $sql=$user->GetCheckList();     
                        } else {
                          $sql=$user->GetCheckListChecker($_SESSION['emp_id']); 
                        }
                        while($row=mysqli_fetch_array($sql)){ ?>
                       <tr>
                            <td style="text-align:center;">
                                <button type='button' id='<?php echo htmlentities(base64_encode($row['id']));?>' class='btnView  btn-primary btn-sm'  title='View Record'><i class='fa fa-search-plus' style='font-size:15px'></i> </button> 

                              <?php  if($_SESSION['account_type'] == 'QA' || $_SESSION['account_type'] == 'Admin' ||$_SESSION['account_type'] == 'QA Manager' ){ ?>

                                <?php if($row['status'] != "Approve") { ?>
                                <button type='button' id='<?php echo htmlentities(base64_encode($row['id']));?>' class='btnEdit  btn-success btn-sm'  title='View Record'><i class='fa fa-pen' style='font-size:15px'></i> </button> 
                                 <?php } ?>


                              <?php  if($_SESSION['account_type'] == 'QA' || $_SESSION['account_type'] == 'Admin' || $_SESSION['account_type'] == 'QA Manager' && $row['status'] == "Rejected" || $row['status'] == "Draft"){ ?>
                                <button type='button' id='<?php echo htmlentities(base64_encode($row['id']));?>' class='btnEdit  btn-success btn-sm'  title='View Record'><i class='fa fa-pen' style='font-size:15px'></i> </button> 

                              <?php } ?>
                            </td>
                            <td style="text-align:center;"><?php echo htmlentities($row['workorder']);?></td>          
                            <td style="text-align:center;"><?php echo htmlentities($row['product']);?></td>
                            <td style="text-align:center;"><?php echo (htmlentities($row['status']) == '' ? 'Pending' : $row['status']);?></td>
                            <td style="text-align:center;"><?php echo (htmlentities($row['status_maintenance']) == '' ? 'Pending' : $row['status_maintenance']);?></td>
                            <td style="text-align:center;"><?php echo (htmlentities($row['status_TL']) == '' ? 'Pending' : $row['status_TL']);?></td>
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

  <div class="modal fade" id="createList" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                      <label> FG PART NO. </label>
                      <select id="partNo" class="form-control"  onchange="jsFunction()" >
                        <option value="" active>Choose Item Code</option>   
                        <?php 
                            $sql=$user->selectPartNo();
                            while($list=mysqli_fetch_array($sql)){?>
                             <option value="<?php echo base64_encode($list['id']); ?>"><?php echo $list['productname']; ?></option>
                         <?php } ?>         
                      </select>
                  </div>
                
                  <div class="form-group">
                      <label> Type </label>
                      <select id="type" class="form-control" >
                        <option value="" active>Choose Type</option>   
                        <option value="Start-up qualification">Start-up qualification</option>
                        <option value="One Week Long Running">One Week Long Running</option>
                        <option value="Product Change">Product Change</option>
                        <option value="Re-qualification">Re-qualification</option>
                      </select>
                  </div>

                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary createAccount" id="createProduct">Create</button>         
          <button type="button" class="btn btn-Danger" data-dismiss="modal">Cancel</button>

        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
<script>

    $(document).on('click','.createProduct',function(){
      $("#createList").modal("show");
    });

    $(document).on('click','#createProduct',function(){
        var partNo = $.trim(encodeURI($("#partNo").val()));
                var type = $.trim(encodeURI($("#type").val()));
         // $("#createList").modal("show");

        if(partNo == '' || type == ''){
            $.notify("Please select from the fields","error"); 
        } else {
          location.href = "checklistCreate?Productid=" + partNo + "&type=" + type;  
        }
    });

    $(document).on('click','.btnView',function(){
      id=$(this).attr("id");
      location.href = "checklistView?id=" + id;
    });

    $(document).on('click','.btnEdit',function(){
      id=$(this).attr("id");
      location.href = "checklistEdit?id=" + id;
    });
</script>
