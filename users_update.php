<?php


include('src/conection.php');
include('src/header.php');

if (isset($_POST['Edit-user'])) {
  $update_id = $_POST['update-user'];

  $updateQry = mysqli_query($conection, "SELECT * FROM  users WHERE   ID  =  '$update_id'");

  while ($update_row = mysqli_fetch_array($updateQry)) {

?>
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
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Users update</li>
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

                <!-- /.card-header -->
                <div class="card-body">
                  <?php
                  //echo  $update_row['emp_name'], ' ', $update_row['phone'], ' ', $update_row['address'], ' ', $update_row['gender'], ' ', $update_row['dep_id'], ' ', $update_row['sch_id'], ' ',  $update_row['emp_photo'];
                  ?>
                  <form action="" method="post" enctype="multipart/form-data">

                  <input type="hidden" name="user_id" id="user_id" value="<?php echo $update_row['ID']?>">

                    <div class="row">
                      <div class="col-md 6">
                        <div class="form-group">
                          <label for="">fullName</label>
                          <input type="text" name="Name" id="Name" value="<?php echo $update_row ['Name']?>" class="form-control" placeholder="Enter Full name" required>
                        </div>
                      </div>
                      <div class="col-md 6">
                        <div class="form-group">
                          <label for="">Phone</label>
                          <input type="number" name="Phone" id="Phone" value="<?php echo $update_row ['Phone']?>" class="form-control" placeholder="Enter Your Phone" required >
                        </div>
                      </div>
                   
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">UserName</label>
                          <input type="text" name="UserName" id="UserName" value="<?php echo $update_row['UserName']?>" placeholder="Enter Username No " class="form-control" required>
                        </div>
                      </div>
                      </div>
                     
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
         <label for="">Role</label>
         <select name="Role" id="Role" class="form-control" required>
           <option value="<?php echo $update_row['Role']?>"><?php echo $update_row['Role']?></option>
             <?php if($update_row['Role']=='User'){?>
           <option value="Admin">Admin</option>
       
            <?php }else{?>
             <option value="User">User</option>
               <?php }?>
                          </select>
                        </div>
                      </div>
                      </div>
                      <!-- <div class="col-md-6">
                        <div class="form-group">
     <label for="photo">user photo</label>
      <input type="file" name="user_photo" id="user_photo" class="form-control">
      <input type="hidden" name="old_photo" id="old_photo" class="form-control" value="">
    
      
               </div>
                      </div>
                    </div> -->
      
   <div class="modal-footer">
   <a href="Users.php" type="button" class="btn btn-danger" data-dismiss="modal">Close</a>
    <button type="submit" name="update_users" class="btn btn-dark">Update</button>
                    </div>
                  </form>

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
<?php
  }
}

include('src/footer.php');
?>
<?php
if (isset($_POST['update_users'])) {
//   $allowed = ['png', 'jpg', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF', ""];
//   $filename = $_FILES['user_photo']['name'];
//   $ext = pathinfo($filename, PATHINFO_EXTENSION);

//   if (in_array($ext, $allowed)) {
//     move_uploaded_file($_FILES['user_photo']['tmp_name'], 'img/' . $filename);

    // if ($filename == '') {
    //   //$old_photo = $_POST['old_photo'];
    //   $path_img = $_POST['old_photo'];
    // } else {
    //   $path_img = 'img/' . $filename;
    // }
    $user_id = $_POST['user_id'];
    $fname = $_POST['Name'];
    $phone = $_POST['Phone'];
    $username = $_POST['UserName'];
    $role = $_POST['Role'];
    // $date = date('Y-m-d-h-i-s A');

    $update_data = mysqli_query($conection, "UPDATE `users` SET `Name`='$fname',`UserName`='$username',
    `Role`='$role' WHERE `ID`='$user_id'");

    if ($update_data) {
      echo "<script>alert('updated successfully....')</script>";
      echo "<script>window.location.href='Users.php'</script>";
    } else {
      echo "<script>alert('Not updated....')</script>";
    }
  } else {
    // echo '<script>alert("Not Allowed pdf,doxs,..etc only use png ,jpeg ,jpg, gif, or empty")</script>';
  }

?>