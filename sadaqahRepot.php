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
          <h1>Reports</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Sadaqah reports</li>
          </ol>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>
  ,

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
                  <select class="form-control select2" name="CharityID" id="CharityID" style="width: 100%;">
                    <?php
                    // connect to the database
                    include("../src/conection.php");
                    // fetch data from the database
                    $sql = " select 'All' as id,'All' as name union
                    SELECT id, name FROM chariyah";
                    $result = mysqli_query($conection, $sql);

                    // generate HTML for the dropdown list
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                    }
                    ?>
                  </select>
                </div>

                <div class="col-2">
                  <br>
                  <button type="button" class="btn btn-default bg-primary mt-2" id="search_btn"><i class="fa fa-search"></i> Search</button>

                </div>

              </div>
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Charity Name</th>
                      <th>Type </th>
                      <th>Phone</th>
                      <th>Amount</th>
                      <th>RegDate</th>
                    </tr>
                  </thead>
                  <tbody id="saqahTBL">
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
  $(document).ready(function() {
    $('.btn_delete').on('click', function() {
      // alert('Are you sure');
      $('#sadqah_delete').modal('show');
      $tr = $(this).closest('tr');
      let data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();
      console.log(data[0]);
      $('#delateID').val(data[0]);
    })
  })


  $(document).ready(function() {
    $('#printButton').on('click', function() {
      window.print();
    });
  });
  $('#search_btn').off('click').on('click', function() {
    console.log('yaah');
    var CharityID = $('#CharityID').val();
    var fromDate = $('#fromDate').val();
    var EndDate = $('#EndDate').val();
    $.ajax({
      url: 'GetsadaqahReportByCreteria.php',
      type: 'POST',
      data: {

        fromDate: fromDate,
        EndDate: EndDate,
        CharityID: CharityID
      },
      dataType: 'json',
      success: function(data) {

        console.log(data);
        // $('#example1 tbody').empty();
        if (data.length > 0) {
          $("#example1").DataTable().destroy();
          $("#example1 tbody").html("")
          var table_html = '';
          console.log(table_html);
          $.each(data, function(index, row) {
            // console.log(row)
            // console.log(table_html);
            table_html += '<tr>';
            table_html += '<td>' + parseInt(index + 1) + '</td>';
            // table_html += '<td>' + row.Name + '</td>';
            table_html += '<td>' + row.CharityID + '</td>';
            table_html += '<td>' + row.UserID + '</td>';
            table_html += '<td>' + row.Phone + '</td>';
            table_html += '<td>' + row.Amount + '</td>';
            table_html += '<td>' + row.RegDate + '</td>';
            table_html += '</tr>';
          });
          $('#saqahTBL').html(table_html);
          $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example1_wrapper .col-md-6:eq(0) .btn-group').addClass('my-button-container');
        } else {
          $('#saqahTBL').html('<tr><td colspan="8">No records found</td></tr>');
        }
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
</script>
</script>
</body>

</html>
<!-- Bootstrap javascript -->