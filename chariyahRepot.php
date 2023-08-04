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
          <h1>Charity Reports</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Chariyah reports</li>
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
                <div class="col-3">
                  <label>From Date</label>
                  <input type="date" name="fromDate" id="fromDate" class="form-control" required>

                </div>
                <div class="col-3">

                  <label>To Date</label>
                  <input type="date" name="EndDate" id="EndDate" class="form-control" required>

                </div>
                <div class="col-2">
                  <label>Type</label>
                  <select class="form-control select2" name="type" id="type" style="width: 100%;">
                    <option value="All">All</option>
                    <option value="Masjid">Masjid</option>
                    <option value="Dugsi">Dugsi</option>
                    <option value="Ceel">Ceel</option>
                    <option value="Wado">Wado</option>
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
                    <th>Type</th>
                    <th>DonateDate</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <!-- <th>UserID</th> -->

                  </tr>
                </thead>
                <tbody id="tbodyDonor">
                </tbody>


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
  //delete
  $(document).ready(function() {
    $('.btn_delete').on('click', function() {
      // alert('Are you sure');
      $('#chariyah_delete').modal('show');
      $tr = $(this).closest('tr');
      let data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();
      console.log(data[0]);
      $('#delateID').val(data[0]);
    })
  })
  $('#search_btn').off('click').on('click', function() {
    console.log('yaah');
    var type = $('#type').val();
    var fromDate = $('#fromDate').val();
    var EndDate = $('#EndDate').val();
    $.ajax({
      url: 'GetchariyahReportByCreteria.php',
      type: 'POST',
      data: {

        fromDate: fromDate,
        EndDate: EndDate,
        Type: type
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
            // table_html += '<td>' + row.Address + '</td>';
            table_html += '<td>' + row.Phone + '</td>';
            table_html += '<td>' + row.Type + '</td>';
            table_html += '<td>' + row.District + '</td>';
            table_html += '<td>' + row.Amount + '</td>';
            table_html += '<td>' + row.Description + '</td>';
            table_html += '</tr>';
          });
          $('#tbodyDonor').html(table_html);
        } else {
          $('#tbodyDonor').html('<tr><td colspan="8">No records found</td></tr>');
        }
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
  });



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