<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Change Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index2.html" class="h1"><b>HILLWALAL </b>APPLICATION</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Change Your Password</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="" value="<?php echo $_SESSION['UserName']?>" readonly>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="current_password"class="form-control" placeholder="current password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="new_password" id="new_password"class="form-control" placeholder=" New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_confi" id="password_confi"class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          
        </div><span class="confirmpass"></span>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree"> -->
              <!-- <label for="agreeTerms"> -->
              <button type="submit" name="change"class="btn btn-primary btn-block">Change Password</button>
              <!-- </label>
            </div> -->
            </div>
        
          <!-- /.col -->
          <div class="col-4">
            <a href="home.php" class="btn btn-outline-danger btn-block">Back <i class="fa fa-arrow-right"></i></a>
          </div>
          <!-- /.col -->
        </div>
      </form>
<?php
include('src/conection.php');
if (isset($_POST['change'])) {
    $username= mysqli_real_escape_string($conection,$_POST['username']);
    $current_password= mysqli_real_escape_string($conection,$_POST['current_password']);
    $new_password= mysqli_real_escape_string($conection,$_POST['new_password']);
    $read_user=mysqli_query($conection,"SELECT *FROM users WHERE UserName='$username' AND Password='$current_password'");
    $count_row=mysqli_num_rows($read_user);
    if($count_row > 0){
       $change=mysqli_query($conection,"UPDATE users  SET Password='$new_password' WHERE UserName='$username'");
       if($change){
        echo "<script>alert('password changed')</script>";
        echo "<script>window.location.href='logout.php'</script>";
       }else{
        echo "<script>alert('Not changed your password')</script>";
       }

        }
        elseif ($count_row < 0) {
            echo "<script>alert('please  check your current_password')</script>";
    }

}
?>
     

      <!-- <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->

      <!-- <a href="login.html" class="text-center">I already have a membership</a> -->
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
     $('#password_confi').on('keyup change', function() {
        let confpass = $(this).val();
        let password = $("#new_password").val();
        // alert( confpass);
        if (confpass != password) {
            //alert('not matched');
            $(".confirmpass").html("<span class='text-danger'>misMatched'</span>");
        } else {
            //alert('matched');
            $(".confirmpass").html("<span class='text-green'>Matched'</span>");
        }
    })
</script>
</body>
</html>
