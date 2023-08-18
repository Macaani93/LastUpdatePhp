<?php include("src/header.php");
include("src/conection.php");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users Report</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Users_reports</li>
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
              <div class="row">
                <div class="col-2">
                  <label>Users Report</label>
                  <select class="form-control select2" name="users" id="Roles" style="width: 100%;">
                    <option value="All">All</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                    <option value="Hospital">Hospital</option>
                  </select>
                </div>
                <div class="col-2">
                  <br>
                  <button type="button" class="btn btn-default bg-primary mt-2" id="search_btn"><i class="fa fa-search"></i> Search</button>


                </div>
              </div>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>UserName</th>
                    <th>Password</th>
                    <th>Role</th>
                  </tr>
                </thead>
                <tbody id="tbodyUsers"></tbody>
                <tfoot>

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
  </section>

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
  $(document).ready(function() {


    $('#search_btn').on('click', function() {
      var role = $('#Roles').val();

      $.ajax({
        url: 'GetusersReportByCreteria.php',
        type: 'POST',
        data: {
          Role: role
        },
        dataType: 'json',
        success: function(data) {
          $("#example1").DataTable().destroy();
          $("#example1 tbody").html("")
          var table_html = '';
          if (data.length > 0) {
            $.each(data, function(index, row) {
              table_html += '<tr>';
              table_html += '<td>' + (index + 1) + '</td>';
              table_html += '<td>' + row.Name + '</td>';
              table_html += '<td>' + row.Phone + '</td>';
              table_html += '<td>' + row.UserName + '</td>';
              table_html += '<td>' + row.Password + '</td>';
              table_html += '<td>' + row.Role + '</td>';
              table_html += '</tr>';
            });
          } else {
            table_html = '<tr><td colspan="6" class="text-center">No data found</td></tr>';
          }

          $('#tbodyUsers').html(table_html);
          /// inta ayey ku saxan tahay Engr marka cilida waxa keenaa waxaa waaye DataTable in labo mar loo yeero ayuu diidaa.............................
          // Ku soco !!!!!!!!!
          $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example1_wrapper .col-md-6:eq(0) .btn-group').addClass('my-button-container');
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    });



    $(function() {
      // $("#example1").DataTable({
      //   "responsive": true,
      //   "lengthChange": false,
      //   "autoWidth": false,
      //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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



  })
</script>

</body>

</html>
<!-- Bootstrap javascript -->