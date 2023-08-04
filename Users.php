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
                    <h1>Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Users_list</li>
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
                                <i class="fa fa-plus"></i> Add new user
                            </button>

                            <table id="example1" class="table table-bordered table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">#ID</th>
                                        <th scope="col">Fullname</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Username</th>
                                        <!-- <th scope="col">password</th> -->
                                        <th scope="col">Role</th>
                                        <!-- <th scope="col">Photo</th> -->
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $readquery = mysqli_query($conection, "SELECT * FROM users");
                                    if ($readquery) {
                                        foreach ($readquery as $row) {
                                    ?>

                                            <tr>
                                                <td><?php echo $row['ID'] ?></td>
                                                <td><?php echo $row['Name'] ?></td>
                                                <td><?php echo $row['Phone'] ?></td>
                                                <td><?php echo $row['UserName'] ?></td>
                                                <!-- <td><//?php echo $row['password']?></td> -->
                                                <td><?php echo $row['Role'] ?></td>

                                                <td>
                                                    <form action="users_update.php" method="post">
                                                        <input type="hidden" name="update-user" id="update-user" value="<?php echo $row['ID'] ?>">
                                                        <button type="submit" name="Edit-user" id="Edit_user" class="btn btn-success btn-sm btn-edit"><i class="fa fa-edit"></i>
                                                            </botton>
                                                            <button type="button" class="btn btn-sm btn-danger ml-1 btn_delete"><i class="fa fa-trash"></i>
                                                                </botton>
                                                    </form>
                                                </td>
                                            </tr>
                                    <?php    }
                                    } ?>
                                </tbody>
                            </table>
                            <!-- modales edit and delete -->
                            <!--user-insert model -->
                            <div class="modal fade" id="user-insert">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="width:600px; text-align:center;">
                                        <div class="modal-header">
                                            <h4 class="modal-title ">Add New user</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body ">
                                            <form action="insert/users_insert.php" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">FullName:</label>
                                                            <input type="text" name="Name" id="Name" class="form-control" placeholder="Enter fullname" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Phone:</label>
                                                            <input type="number" name="Phone" id="Phone" class="form-control" placeholder="Enter phome No" required min="0">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Username:</label>
                                                            <input type="tell" name="UserName" id="UserName" class="form-control" placeholder="Enter your username" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Password:</label>
                                                            <input type="password" name="Password" id="Password" class="form-control" required placeholder="Enter Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Confirm password:</label>
                                                            <input type="password" name="confpass" id="confpass" class="form-control" required placeholder="confirm Password">
                                                            <span class="confirmpass"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="role">Role:</label>
                                                            <select name="Role" id="Role" class="form-control" required>
                                                                <option value="">None</option>
                                                                <option value="Admin">Admin</option>
                                                                <option value="User">User</option>
                                                                <option value="Hospital">Hospital</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                        </div>
                                        <div class="modal-footer ">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                            <button type="submit" name="insert_user" class="btn btn-primary">Save
                                            </button>
                                        </div>
                                        </form>
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
                                            <button type="button" class="btn btn-success  btnclosedelete" data-dismiss="modal">Close</button>
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








<script>

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
        new DataTable('#example1', {
            responsive: true
        });
        //DataTable 
        $(function() {
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

        $('.btnclosedelete').click(function() {
            $('#users_delete').modal('hide');
        })
    })
</script>
<?php include("src/footer.php"); ?>