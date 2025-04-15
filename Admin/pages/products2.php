<title>Products</title>
<?php include 'includes/header.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="font-weight: bold;">PRODUCT LIST</h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li><a type="button" class="btn btn-info fa fa-plus-square createProduct" data-toggle="modal" data-target="#CreateModal"> Add Products </a></li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Products</h3>
            </div>
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
                  $sql = $user->getProduct();
                  while ($row = mysqli_fetch_array($sql)) { ?>
                    <tr>
                      <td style="text-align:center;">
                        <button type='button' id='<?php echo htmlentities(base64_encode($row['id'])); ?>' class='btnView  btn-primary btn-sm' title='View Record'><i class='fa fa-search-plus' style='font-size:15px'></i> </button>
                        <button type='button' id='<?php echo htmlentities(base64_encode($row['id'])); ?>' class='btnEdit  btn-success btn-sm' title='View Record'><i class='fa fa-pen' style='font-size:15px'></i> </button>
                      </td>
                      <td style="text-align:center;"><?php echo htmlentities($row['productname']); ?></td>
                      <td style="text-align:center;"><?php echo htmlentities($row['productDesc']); ?></td>
                      <td style="text-align:center;"><?php echo htmlentities($row['status']); ?></td>
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
            <label> Department</label>
            <select id="deptType" class="form-control">
              <option value="Head Forming" selected>Head Forming</option>
              <option value="Thermal Bonding">Thermal Bonding</option>
              <option value="Swab Assembly">Swab Assembly</option>
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

<?php include 'includes/footer.php'; ?>

<script>
  var id = "";
  $(document).on('click', '.btnEdit', function() {
    id = $(this).attr("id");
    location.href = "productEdit?id=" + id;
  });

  $(document).on('click', '.btnView', function() {
    id = $(this).attr("id");

    location.href = "productView?id=" + id;
  });

  $(document).on('click', '.createProduct', function() {
    $("#createList").modal("show");
  });

  $(document).on('click', '#createProduct', function() {
    var deptType = $.trim($("#deptType").val());

    if (deptType === "Head Forming") {
      location.href = "productCreate?deptType=" + deptType;
    } else if (deptType == "Swab Assembly") {
      location.href = "productCreate?deptType=" + deptType;
    } else {
      location.href = "productCreate?deptType=" + deptType;
    }
  });
</script>