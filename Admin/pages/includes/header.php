<?php   


    session_set_cookie_params([
        'path' => '/headforming', // Restrict cookie to this path
        'httponly' => true, // Mitigate XSS attacks
        'secure' => isset($_SERVER['HTTPS']), // Send cookie over HTTPS if available
        'samesite' => 'Strict', // Prevent CSRF
    ]);

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once 'codes/function.php';  
    
    $user = new admin_creation();
    $emp_id = $_SESSION['emp_id'];
    // $name = $_SESSION['name'];

    session_name($emp_id);
    
    if (!$user->get_session() ){
      header("Location:../index");  
    }

    if (isset($_GET['q'])){
        $user->user_logout();
        header ("Location: ../index");  
    }


?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/x-icon" href="../dist/img/texwipe.png">

   <link rel="stylesheet" id="ChesterAllanCustodio">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"> <?php echo $_SESSION['name'];?></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <div class="dropdown-divider"></div>
          <a href="accountprofile" class="dropdown-item" onclick="profile()">
            <i class="fas fa-users mr-2"></i> Profile
          </a>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item" onclick="test()">
            <i class="fas fa-power-off mr-2"></i>  Log Out
          </a>
          <div class="dropdown-divider"></div>

        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link" style="background-color: white;">
      <img src="../dist/img/texwipe.png" alt="AdminLTE Logo" style="opacity: .8" width="100%"> 
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <li class="nav-item">
            <a class="nav-link"> 
              <center>
                <p> HEADFORMING </p>
              </center>
            </a>
          </li>


          <li class="nav-item">
            <a href="dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Dashboard </p>
            </a>
          </li>

        <?php if( $_SESSION['account_type'] == 'Admin' || $_SESSION['emp_id'] == '240'){ ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Accounts
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <a href="accountAdmin" class="nav-link">
                <p> Admin Accounts </p>
              </a>
              </li>
             <!--  <li class="nav-item">
               <a href="accountsEmployee" class="nav-link">
                <p> Employees Accounts </p>
              </a>
              </li> -->
            </ul>
          </li>
        <?php } ?>  

         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-check"></i>
              <p>
                Qualifications
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <a href="checklist" class="nav-link">
                <p>CheckList</p>
              </a>
              </li>
              <?php if( $_SESSION['account_type'] == 'QA' || $_SESSION['account_type'] == 'Admin' ||$_SESSION['account_type'] == 'QA Manager'){ ?>
                <li class="nav-item">
                 <a href="products2" class="nav-link">
                  <p>Products</p>
                </a>
                </li>
              <?php } ?> 
            </ul>
          </li>
          
        

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <script>
    function profile(){
      window.location.href = 'profile';
    }

    function test(){
      var name = '<?php echo $_SESSION['name']; ?>'
      var pick = '00';
      var fd = new FormData();    
      // fd.append('name', name);
      // fd.append('pick', pick);     
      //       $.ajax({
      //           url: "../pages/codes/admin_control.php",
      //           data: fd,
      //           processData: false,
      //           contentType: false,
      //           type:'POST',
      //           success:function(result){
      
                    window.location.href = '?q=logout';
                       
            //     }
            // });
    }
  </script>