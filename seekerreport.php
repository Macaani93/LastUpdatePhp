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
       <li class="breadcrumb-item active">Recipient reports</li>
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
      <th>Address</th>
      <th>Phone</th>
      <th>Age</th>
      <th>RegDate</th>
      <th>BloodType</th>
      <!-- <th>Status</th> -->
      <th>UserID</th>
      <th>Action</th>
      </tr>
      </thead>
    <tbody>
    <?php
      $readquery=mysqli_query($conection,'SELECT * FROM `bloodseeker`');
      if ($readquery){
        foreach($readquery as $row){
      ?>
      <tr>
  <td><?php echo $row['ID']?></td>
  <td><?php echo $row['Name']?></td>
    <td><?php echo $row['Address']?></td>
    <td><?php echo $row['Phone']?></td>
    <td><?php echo $row['Age']?></td>
    <td><?php echo $row['RegDate']?></td>
    <td><?php echo $row['BloodType']?></td>
   
    <td><?php echo $row['UserID']?></td>
      <td>
   
    <button  class='btn btn-success btn_edit'><i class="fa fa-edit"></i>Edit</button>
    <button class='btn btn-danger btn_delete'><i class="fa fa-trash"></i>Delete</button>
        </td>
        </tr>
      <?php }}?>
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
    <!-- /.modal-dialog -->
</div>

<!-- /.modal-dialog -->
</div>
<?php include("src/footer.php");?>
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
        $('#recipient_delete').modal('show');
        $tr = $(this).closest('tr');
        let data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();
        console.log(data[0]);
        $('#delateID').val(data[0]);
    })
    })



$(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [ "excel", "pdf", "print"]
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