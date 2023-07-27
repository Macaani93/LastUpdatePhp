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
                    <h1>Notice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Notices</li>
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
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#user-insert">
                                <i class="fa fa-plus"></i> Add new
                            </button>
                            <br>
                            <br>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Comment</th>

                                        <!-- <th>UserID</th> -->
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    $readquery = mysqli_query($conection, "select case when (n.User='0' ) then  'All' else (select Name from users where ID=n.User)  end as UserType,n.Comment from notices n");

                                    if ($readquery) {
                                        foreach ($readquery as $row) {
                                    ?>
                                            <tr>
                                                <td hidden><?php echo $row['ID'] ?></td>
                                                <td><?php echo $count += 1; ?></td>
                                                <td><?php echo $row['UserType'] ?></td>
                                                <td><?php echo $row['Comment'] ?></td>

                                                <!-- <td><?php echo $row['UserID'] ?></td> -->

                                            </tr>
                                    <?php  }
                                    } ?>
                                <tbody>
                                    </tfoot>

                            </table>

                            <!-- modales edit and delete -->
                            <!--user-insert model -->
                            <div class="modal fade" id="user-insert">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="width:600px; text-align:center;">
                                        <div class="modal-header">
                                            <h4 class="modal-title ">Add New Notice</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body ">
                                            <form action="insert/noticeinsert.php" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="float-left" style="justify-content:end;">User</label>
                                                            <select class="form-control select2bs4 select2" style="width: 100%;" name="user_data">
                                                                <option disabled>Select An Option</option>
                                                                <?php
                                                                // connect to the database
                                                                include("../src/conection.php");
                                                                // fetch data from the database
                                                                $sql = "select 0 ID,'All' as Name from users
                                                                    union 
                                                                SELECT ID,concat(Name,'-',Phone) as Name FROM users ";
                                                                $result = mysqli_query($conection, $sql);

                                                                // generate HTML for the dropdown list
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    echo "<option value='" . $row['ID'] . "'>" . $row['Name'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="" class="float-left" style="justify-content:end;">Comment</label>
                                                        <textarea class="form-control comment" rows="5" onkeydown="OnchangeTextARea()" maxlength="300" name="comment"></textarea>
                                                        <label class="form-label float-left count" id='count' style="justify-content: end;">
                                                            <script>
                                                                var hh = 0;

                                                                function OnchangeTextARea() {
                                                                    var data = $('.comment').val();
                                                                    hh = data.length;
                                                                    // $('.comment').max(10)
                                                                    //alert(data.length);
                                                                    $('#count').html(data.length + '/300');
                                                                }
                                                            </script>

                                                            0/300
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="float-right" style="justify-content: end;">
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="notice_insert" class="btn btn-primary">Save
                                                    </button>
                                                </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!--update model -->
                    <div class="modal fade" id="schadule-update">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Updating Data:</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="update/schadule_update.php" method="post">
                                        <input type="hidden" name="updateID" id="updateID" class="form-control">
                                        <div class="form-group">
                                            <label for="schadule">Time in:</label>
                                            <input type="text" name="time-in" required id="time-in" class="form-control">
                                            <label for="schadule">Time out:</label>
                                            <input type="text" name="time-out" required id="time-out" class="form-control">
                                        </div>

                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                    <button type="submit" name="update" class="btn btn-dark"> Yes
                                        Update</button>
                                </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!--delete model -->
                    <div class="modal fade" id="users_delete">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Data</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="delete/users_delete.php" method="post">
                                        <input type="hidden" name="delateID" id="delateID" class="form-control">
                                        <h3>Are you sure !</h3>
                                        <!-- <p>One fine body&hellip;</p> -->
                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                    <button type="submit" name="user_delete" class="btn btn-warning ">Yes Delete
                                        it</button>
                                </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
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
<!-- <script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>



 DataTables  & Plugins -->
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
<script src="plugins/select2/js/select2.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script>
    $(function() {

        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
    // delete
    $(document).ready(function() {

        $('.select2').select2();

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
        $('.btn_delete').on('click', function() {
            // alert('Are you sure');
            $('#users_delete').modal('show');
            $tr = $(this).closest('tr');
            let data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();
            console.log(data[0]);
            $('#delateID').val(data[0]);
        })



        $('#confpass').on('keyup change', function() {
            let confpass = $(this).val();
            let password = $("#Password").val();
            // alert( confpass);
            if (confpass != password) {
                //alert('not matched');
                $(".confirmpass").html("<span class='text-danger'>misMatched'</span>");
            } else {
                //alert('matched');
                $(".confirmpass").html("<span class='text-green'>Matched'</span>");
            }
        })

    });
</script>