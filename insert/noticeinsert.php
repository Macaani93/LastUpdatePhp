
<?php
include("../src/conection.php");
if (isset($_POST['notice_insert'])) {

  $users = $_POST['user_data'];
  $commnent = $_POST['comment'];



  $notice_insert = mysqli_query($conection, "INSERT INTO `notices`( `User`, `Comment`) VALUES('$users','$commnent')");

  if ($notice_insert) {
    echo " <script>alert('insert successfully')</script>";
    echo "<script>window.location.href='../notice.php'</script>";
  } else {
    echo " <script>alert(' Already exists this username!')</script>";
    echo "<script>window.location.href='../users_list.php'</script>";
  
   
  }
}






?>