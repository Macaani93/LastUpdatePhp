<?php
include('src/header.php');
include('src/conection.php');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>List of Blood Donors</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blood Donors</li>
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
              <button type="button" class="btn btn-default bg-primary" data-toggle="modal" data-target="#chariyal-modal"><i class="fa fa-plus"></i> Add New</button>
              <br>
              <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Age</th>
                    <th>RegDate</th>
                    <th>BloodType</th>
                    <th>Status</th>
                    <!-- <th>UserID</th> -->
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $count = 0;
                  $readquery = mysqli_query($conection, "SELECT bd.ID ID, bd.name PersonName,d.Name Address,bd.Phone,bd.Age as Age,bd.RegDate as RegDate,bd.Status as Status,b.name AS 'BloodType' FROM blooddonor bd, blood b,district d where b.ID = bd.BloodType  and d.ID=bd.District");

                  if ($readquery) {
                    foreach ($readquery as $row) {
                  ?>
                      <tr>
                        <td hidden><?php echo $row['ID'] ?></td>
                        <td><?php echo $count += 1; ?></td>
                        <td><?php echo $row['PersonName'] ?></td>
                        <td><?php echo $row['Address'] ?></td>
                        <td><?php echo $row['Phone'] ?></td>
                        <td><?php echo $row['Age'] ?></td>
                        <td><?php echo $row['RegDate'] ?></td>
                        <td><?php echo $row['BloodType'] ?></td>
                        <td><?php echo $row['Status'] ?></td>
                        <!-- <td><?php echo $row['UserID'] ?></td> -->
                        <td>

                          <button class='btn btn-success btn_edit'><i class="fa fa-edit"></i></button>


                          <button class='btn btn-warning btn_approve '>
                            <i class="fa fa-check-circle text-light btn_approven" aria-hidden="true"></i></button>
                          <button class='btn btn-primary btn_donated '>
                            <i class="fa fa-heart" aria-hidden="true"></i></button>

                          <i class="fa fa-check-circle text-light btn_approven" aria-hidden="true"></i></button>
                        </td>
                      </tr>
                  <?php  }
                  } ?>
                <tbody>
                  </tfoot>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
</div>
<!-- /.modal-dialog -->
</div>
<!--donor modal insert -->
<div class="modal fade" id="chariyal-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Donor</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="insert/donor_insert.php" method="post" enctype="multipart/form-data">
          <div class="fromgroup">
            <label for="name">Name</label>
            <div class="input-group">
              <div class="input-group-prepend">

                <span class="input-group-text"><i class="far fa-user"></i></span>
              </div>
              <input type="text" name="Name" id="Name" class="form-control" required>

            </div>
            <label for="Address" class="my-2">Address</label>
            <div class="input-group ">
              <div class="input-group-prepend">

                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
              </div>
              <input type="text" name="Address" id="Address" "  class=" form-control" required>
            </div>
            <label for="number">Phone</label>
            <div class="input-group ">
              <div class="input-group-prepend">

                <span class="input-group-text"><i class="fa fa-phone"></i></span>
              </div>
              <input type="number" name="Phone" id="Phone" class="form-control" required min="1">

            </div>
            <label for="age">Age</label>
            <div class="input-group ">
              <div class="input-group-prepend">

                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
              </div>
              <input type="number" name="age" id="age" class="form-control" required min="18">

            </div>


            <label for="Type">BloodType</label>
            <select type="text" name="bloodtype" id="bloodtype" class="form-control" required>
              <option value="1">A+</option>
              <option value="2">A-</option>
              <option value="7">O+</option>
              <option value="8">O-</option>
              <option value="5">AB+</option>
              <option value="6">AB-</option>
              <option value="3">B+</option>
              <option value="4">B-</option>
            </select>
          </div>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-default bg-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="donor_insert" id="donor_insert">Save</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
</div>

<!-- end users insert modal -->

<!-- edit or update modal -->

<!--end edit or update modal -->

<!-- delete modal -->
<div class="modal fade" id="donor_delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Donor</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

        </button>
      </div>
      <div class="modal-body">
        <form action="delete/donor_delete.php" method="post">

          <h5>Do you want to delete</h5>
          <input type="text" name="delateID" id="delateID" class="form-control mt-3" hidden>
          <input type="text" name="delateName" id="delateName" class="form-control mt-3" readonly>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-default bg-success btnclose" data-dismiss="modal">No</button>
        <button type="submit" name="donor_delete" id="donor_delete" class="btn btn-warning">Yes</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
</div>

<!--end delete modal -->
<!-- /.content -->
</div>
<!-- --------------------------------------------------------------------------------- -->
<div class="modal fade" id="donor_approve">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Approving</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

        </button>
      </div>
      <div class="modal-body">
        <form action="delete/donor_delete.php" method="post">

          <h5>Do you want Approve this Donor</h5>
          <input type="text" name="ApproveID" id="ApproveID" class="form-control ApproveID mt-3" readonly hidden>
          <input type="text" name="ApproveName" id="ApproveName" class="form-control ApproveName  mt-3" readonly>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-default bg-success btnclose" data-dismiss="modal">No</button>
        <button type="submit" name="donor_approve" id="donor_approve" class="btn btn-warning">Yes</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- donated model -->
<div class="modal fade" id="donor_donated">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Donating</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

        </button>
      </div>
      <div class="modal-body">
        <form action="delete/donor_delete.php" method="post">

          <h5>Do you want donate this Donor</h5>
          <input type="text" name="donatedID" id="donatedID" class="form-control donatedID mt-3" readonly hidden>
          <input type="text" name="donatedName" id="donatedName" class="form-control donatedName  mt-3" readonly>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-default bg-success btnclose" data-dismiss="modal">No</button>
        <button type="submit" name="donor_donated" id="donor_donated" class="btn btn-warning">Yes</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
</div>

<!--end delete modal -->
<!-- /.content -->
</div>


<!-- /.content-wrapper -->
<!-- Control Sidebar -->

<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>

<!-- /.control-sidebar -->
</div>

<!-- ./wrapper -->
<!-- jQuery -->
<?php include("src/footer.php"); ?>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  //delete
  $(document).ready(function() {
    $('.btn_delete').on('click', function() {
      // alert('Are you sure');
      $('#donor_delete').modal('show');
      $tr = $(this).closest('tr');
      let data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();
      console.log(data[0]);
      $('#delateID').val(data[0]);
      $('#delateName').val(data[2]);
      $('.btnclose').click(function() {
        $('#donor_delete').modal('hide');
      })
    })
    $('.btn_approve').on('click', function() {
      // alert('Are you sure');
      $('#donor_approve').modal('show');
      $tr = $(this).closest('tr');
      let data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();
      // console.log(data[1]);
      $('.ApproveID').val(data[0]);
      $('.ApproveName').val(data[2]);

      // $('.ApproveID').val(data[0]);
      $('.btnclose').click(function() {
        $('#donor_approve').modal('hide');
      })
    })
    $('.btn_donated').on('click', function() {
      // alert('Are you sure');
      $('#donor_donated').modal('show');
      $tr = $(this).closest('tr');
      let data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();
      // console.log(data[1]);
      $('.donatedID').val(data[0]);
      $('.donatedName').val(data[2]);

      // $('.ApproveID').val(data[0]);
      $('.btnclose').click(function() {
        $('#donor_donated').modal('hide');
      })
    })
  })




  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>
<!-- Bootstrap javascript -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script>


</script>