<title>Dashboard</title>
<?php include 'includes/header.php'; 
  $emp_id = $_SESSION['emp_id'];
  $fetchdata=new admin_creation();                          
?> 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
      </div>
    </div>
      <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $fetchdata->fetchPendingChecklist(); ?></h3>
                <p>Total Pending Checklist</p>
              </div>
              <div class="icon">
                <i class="far fa-calendar-alt"></i>
              </div>
              <a href="WorkOrderlist" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $fetchdata->fetchApproveChecklist(); ?></h3>
                <p>Total Apporved Qualification</p>
              </div>
              <div class="icon">
                <i class=" fas fa-sync-alt"></i>
              </div>
              <a href="workapproval" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $fetchdata->fetchAllChecklist(); ?></h3>
                <p>TOtal Checklist</p>
              </div>
              <div class="icon">
                <i class="far fa-clock"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $fetchdata->fetchTotalProduct(); ?></h3>
                <p>Total Number of Product</p>
              </div>
              <div class="icon">
                <i class="fa fa-briefcase"></i>
              </div>
              <a href="accounts" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
 
  </div>
<?php include 'includes/footer.php'; ?>