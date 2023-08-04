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

          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <div class="row">

                <div class="col-2">
                  <label>Users</label>
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
              <!-- <h3 class="card-title">Department </h3> -->
            </div>
            <!-- DEPARTMENT TABLE -->
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>UserName</th>
                    <th>Passwowrd</th>
                    <th>Role</th>
                    <!-- <th>Action</th> -->
                  </tr>
                </thead>

                <tbody id="tbodyUsers"></tbody>
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
  <!-- /.modal-dialog -->
</div>

<!-- /.modal-dialog -->
</div>
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
  $(function() {
    $('#search_btn').off('click').on('click', function() {
      console.log('yaah');
      var Roles = $('#Roles').val();

      $.ajax({
        url: 'GetusersReportByCreteria.php',
        type: 'POST',
        data: {

          Role: Roles
        },
        dataType: 'json',
        success: function(data) {
          console.log(data);
          // $('#example1 tbody').empty();
          if (data.length > 0) {
            var table_html = '';
            console.log(table_html);
            $.each(data, function(index, row) {
              // console.log(row)
              // console.log(table_html);
              table_html += '<tr>';
              table_html += '<td>' + parseInt(index + 1) + '</td>';
              table_html += '<td>' + row.Name + '</td>';
              table_html += '<td>' + row.Address + '</td>';
              table_html += '<td>' + row.Phone + '</td>';
              table_html += '<td>' + row.UserName + '</td>';
              table_html += '<td>' + row.Role + '</td>';
              // table_html += '<td>' + row.BloodType + '</td>';
              // table_html += '<td>' + row.Status + '</td>';
              table_html += '</tr>';
            });
            $('#tbodyUsers').html(table_html);
          } else {
            $('#tbodyUsers').html('<tr><td colspan="8">No records found</td></tr>');
          }
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
          console.log(status);
          console.log(error);
        }
      });




    });








    // $("#example1").DataTable({
    //   "responsive": true,
    //   "lengthChange": false,
    //   "autoWidth": false,
    //   "buttons": ["excel", "pdf", "print"]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });













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