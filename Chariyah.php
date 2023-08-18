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
          <h1>List of Chariyah</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Chariyah</li>
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
              <div class="modal fade" id="chariyal-modal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Chariyah</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="insert/chariyah_insert.php" method="post">

                        <div class="fromgroup">
                          <label for="name">Name</label>
                          <div class="input-group ">
                            <div class="input-group-prepend">

                              <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" name="name" id="name" class="form-control" required>
                          </div>

                          <label for="phone">Phone</label>
                          <div class="input-group ">
                            <div class="input-group-prepend">

                              <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            </div>
                            <input type="number" name="phone" id="phone" class="form-control" required min="0">
                          </div>

                          <label for="Type">Type</label>
                          <div class="input-group ">
                            <div class="input-group-prepend">

                              <span class="input-group-text"><i class="fas fa-hand-holding-heart"></i></span>
                            </div>
                            <!-- <input type="text" name="Type" id="Type" class="form-control" required> -->
                            <select name="type" id="type" class="form-control">
                              <option value="Masjid">Masjid</option>
                              <option value="Dugsi">Dugsi</option>
                              <option value="Wado">Wado</option>
                              <option value="Ceel">Ceel</option>
                              <!-- <option value=""></option> -->

                            </select>
                          </div>


                          <label for="Type">District</label>
                          <div class="input-group ">
                            <div class="input-group-prepend">

                              <span class="input-group-text"><i class="fas fa-thumbs-up"></i></span>
                            </div>
                            <input type="text" name="district" id="district" class="form-control" required>

                          </div>

                          <label for="Amount">Amount</label>
                          <div class="input-group ">
                            <div class="input-group-prepend">

                              <span class="input-group-text"><i class="fa-solid fa-money-bill"></i></span>
                            </div>
                            <input type="number" name="Amount" id="Amount" class="form-control" required min="0" step="0.01">
                          </div>

                          <!-- <label for="Type">Description</label>
                <input type="text" name="Description" id="Description" class="form-control" required> -->
                        </div>

                        <label for="Amount">Discription</label>
                        <div class="input-group ">
                          <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                          </div>
                          <input type="text" name="Description" id="Description" class="form-control" required min="0" step="0.01">


                          <!-- <label for="Type">Description</label>
                <input type="text" name="Description" id="Description" class="form-control" required> -->
                        </div>
                    </div>
                    <div class="modal-footer ">
                      <button type="button" class="btn btn-default bg-danger" data-dismiss="modal">Close</button>
                      <button type="submit" name="insert_chariyah" id="insert_chariyah" class="btn btn-primary">Save </button>
                    </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>

                <!-- /.modal-dialog -->
              </div>


              <!-- end chariyah insert modal -->

              <!-- edit modal or update modal -->
              <div class="modal fade" id="edit_modal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Update Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="update/update_donor.php" method="post">
                        <div class="fromgroup">
                          <label for="name">Name</label>
                          <input type="text" name="name" id="name" class="form-control">

                          <label for="Adress">Adress</label>
                          <input type="text" name="Address" id="Address" class="form-control">
                          <label for="phone">Phone</label>
                          <input type="text" name="phone" id="phone" class="form-control">
                          <label for="Type">Type</label>
                          <input type="text" name="Type" id="Type" class="form-control">
                          <label for="Type">DonateDate</label>
                          <input type="text" name="DonateDate" id="DonateDate" class="form-control">
                          <label for="Type">Amount</label>
                          <input type="text" name="Amount" id="Amount" class="form-control">
                          <label for="status">Status</label>
                          <select name="satus" id="" class="form-control">

                            <option value="Pending ">Pending</option>
                            <option value="Approved ">Approved</option>
                          </select>
                        </div>
                    </div>
                    <div class="modal-footer ">
                      <button type="button" class="btn btn-default bg-danger btncencel" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
              </div>
              <!--user-insert model -->
              <div class="modal fade" id="charity-modal">
                <div class="modal-dialog">
                  <div class="modal-content" style="width:600px; text-align:center;">
                    <div class="modal-header">
                      <h4 class="modal-title ">Update Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body ">
                      <form action="chariya_update.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Name:</label>
                              <input type="text" name="Name" id="NameUp" class="form-control" required>
                              <input type="text" name="ID" id="ID" class="form-control" hidden>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Phone:</label>
                              <input type="number" name="Phone" id="PhoneUp" class="form-control" required min="0">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label for="Type">Type</label>
                            <div class="input-group ">
                              <div class="input-group-prepend">

                                <span class="input-group-text"><i class="fas fa-hand-holding-heart"></i></span>
                              </div>
                              <!-- <input type="text" name="Type" id="Type" class="form-control" required> -->
                              <select name="type" id="typeUp" class="form-control">
                                <option value="Masjid">Masjid</option>
                                <option value="Dugsi">Dugsi</option>
                                <option value="Wado">Wado</option>
                                <option value="Ceel">Ceel</option>
                                <!-- <option value=""></option> -->

                              </select>
                            </div>
                          </div>


                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="">Description</label>
                              <input type="text" name="description" id="descriptionUp" class="form-control" required>
                              <span class="confirmpass"></span>
                            </div>
                          </div>


                        </div>
                    </div>
                    <div class="modal-footer ">
                      <button type="button" class="btn btn-success btnclose " data-dismiss="modal">Close</button>
                      <button type="submit" name="update_chariyah" class="btn btn-dark">Update
                      </button>
                    </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!--delete model -->
              <div class="modal fade" id="charity_delete">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      <form action="delete/CharityDelete.php" method="post">
                        <input type="hidden" name="delateID" id="delateID" class="form-control">
                        <h3>Are you sure !</h3>

                    </div>
                    <div class="modal-footer ">
                      <button type="button" class="btn btn-default bg-danger btnclose" data-dismiss="modal">Close</button>
                      <button type="submit" name="charity_delete" class="btn btn-warning ">Yes Delete
                        it</button>
                    </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>



              <button type="button" class="btn btn-default bg-primary" data-toggle="modal" data-target="#chariyal-modal">
                <i class="fa fa-plus"></i> Add New
              </button>
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
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $readquery = mysqli_query($conection, 'SELECT ID,Name,Phone,Type,District,Date_Format(DonateDate,"%Y-%m-%d") as DonateDate ,Amount,Description FROM `chariyah`');
                  if ($readquery) {
                    $count = 0;
                    foreach ($readquery as $row) {

                  ?>
                      <tr>
                        <td value=""><?php echo $count += 1 ?></td>
                        <td hidden><?php echo $row['ID'] ?></td>
                        <td><?php echo $row['Name'] ?></td>
                        <td><?php echo $row['Phone'] ?></td>
                        <td><?php echo $row['Type'] ?></td>
                        <td><?php echo $row['DonateDate'] ?></td>
                        <td><?php echo $row['Amount'] ?></td>
                        <td><?php echo $row['Description'] ?></td>

                        <td>
                          <button class='btn btn-success btn_edit'><i class="fa fa-edit  btn_edit "></i></button>
                          <button class='btn btn-danger btn_delete'><i class="fa fa-trash"></i></button>
                        </td>
                      </tr>
                  <?php    }
                  } ?>
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
  // delete
  $(document).ready(function() {




    $('.btn_delete').on('click', function() {
      // alert('Are you sure');
      $('#charity_delete').modal('show');
      $tr = $(this).closest('tr');
      let data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();
      // console.log(data[0]);
      $('#delateID').val(data[1]);
      $('.btnclose').click(function() {
        $('#charity_delete').modal('hide');
      })
    })
    $('.btn_edit').on('click', function() {
      // alert('Are you sure');
      $('#charity-modal').modal('show');
      $tr = $(this).closest('tr');
      let data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();
      console.log(data[0]);
      console.log(data[1]);
      console.log(data[2]);
      console.log(data[3]);
      console.log(data[4]);
      console.log(data[5]);
      console.log(data[6]);
      console.log(data[7]);

      $('#ID').val(data[1]);
      $('#NameUp').val(data[2]);
      $('#PhoneUp').val(data[3]);
      // $("#typeUp option").filter(function() {
      //   return $(this).text() === data[4];
      // }).prop("selected", true);
      $('#typeUp').val('' + data[4]);
      $('#donatedateUp').val(data[6]);
      $('#descriptionUp').val(data[7]);

    })
    $('.btnclose').click(function() {
      $('#charity-modal').modal('hide');
    })

    $(document).ajaxComplete(function() {
      // Call DataTable initialization for #example1 table after data is received
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });



  })
  $(document).ajaxComplete(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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