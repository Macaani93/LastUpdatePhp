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
          <h1>List of Blood Seeker</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blood Seeker</li>
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






              <br>
              <div class="row">
                <div class="col-3">

                  <select class="form-control select2" name="blood_type" id="blood_type" style="width: 100%;">
                    <?php
                    // connect to the database
                    include("../src/conection.php");
                    // fetch data from the database
                    $sql = "SELECT id, name FROM blood";
                    $result = mysqli_query($conection, $sql);

                    // generate HTML for the dropdown list
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="col-3">

                  <button type="button" class="btn btn-default bg-primary" id="search_btn"><i class="fa fa-search"></i> Search Donor</button>
                </div>
              </div>
              <br>
              <table id="donor_table" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Age</th>
                    <th>Reg Date</th>
                    <th>BloodType</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody></tbody>
                <tfoot></tfoot>
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
          <form action="insert/recipient_insert.php" method="post" enctype="multipart/form-data">
            <div class="fromgroup">
              <label for="name">Name</label>
              <input type="text" name="Name" id="Name" class="form-control" required>
              <label for="Address">Address</label>
              <input type="text" name="Address" id="Address" "  class=" form-control" required>
              <label for="number">Phone</label>
              <input type="text" name="Phone" id="Phone" class="form-control" required>
              <label for="age">Age</label>
              <input type="text" name="age" id="age" class="form-control" required>


              <label for="Type">BloodType</label>

            </div>
        </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-default bg-success" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="donor_insert" id="donor_insert">Save</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
  </div>


  <!-- delete modal -->
  <div class="modal fade" id="recipient_delete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete_modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          </button>
        </div>
        <div class="modal-body">
          <form action="delete/recipient_delete.php" method="post">

            <input type="text" name="delateID" id="delateID" class="form-control" readonly>
            <h3>Do you want to delete</h3>
        </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-default bg-success" data-dismiss="modal">No</button>
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
<!-- /.content-wrapper -->
<!-- Control Sidebar -->

<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>

<!-- /.control-sidebar -->
</div>

<?php include("src/footer.php"); ?>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->

<script>
  //delete
  $(document).ready(function() {
    $('.btn_delete').on('click', function() {
      // alert('Are you sure');
      $('#recipient_delete').modal('show');
      $tr = $(this).closest('tr');
      let data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();
      console.log(data[0]);
      $('#delateID').val(data[0]);
    })
  })

  $('#search_btn').on('click', function() {
    var blood_type = $('#blood_type').val();
    $.ajax({
      url: 'get_donor_data.php',
      type: 'POST',
      data: {
        blood_type: blood_type
      },
      dataType: 'json',
      success: function(data) {
        if (data.length > 0) {
          var table_html = '';
          $.each(data, function(index, row) {
            table_html += '<tr>';
            table_html += '<td>' + parseInt(index + 1) + '</td>';
            table_html += '<td>' + row.PersonName + '</td>';
            table_html += '<td>' + row.Address + '</td>';
            table_html += '<td>' + row.Phone + '</td>';
            table_html += '<td>' + row.Age + '</td>';
            table_html += '<td>' + row.RegDateAgo + '</td>';
            table_html += '<td>' + row.BloodType + '</td>';
            table_html += '<td>' + row.Status + '</td>';
            table_html += '</tr>';
          });
          $('#donor_table tbody').html(table_html);
          $("#donor_table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example1_wrapper .col-md-6:eq(0) .btn-group').addClass('my-button-container');
        } else {
          $('#donor_table tbody').html('<tr><td colspan="8">No records found</td></tr>');
        }
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
  });
  $(function() {
    // $("#donor_table").DataTable({
    //   "responsive": true,
    //   "lengthChange": false,
    //   "autoWidth": false,
    //   "buttons": ["excel", "pdf", "print"]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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

  // 
</script>
</body>

</html>
<!-- Bootstrap javascript -->