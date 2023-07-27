<?php
include("../src/conection.php");
if (isset($_POST['donor_delete'])) {
   // echo('haye ...');
   $deleteID = $_POST['delateID'];
   //    $daletequery=mysqli_query($conection,"DELETE FROM blooddonor WHERE ID='$deleteID'");
   $daletequery = mysqli_query($conection, "DELETE FROM blooddonor WHERE `blooddonor`.`ID` = $deleteID");
   if ($daletequery) {
      echo ("$deleteID");
      //echo"<script>alert('delete successfully')</script>";
      echo "<script>window.location.href='../donor.php'</script>";
   } else {
      echo "<script>alert('delete not successfully')</script>";
      echo "<script>window.location.href='../donor.php'</script>";
   }
}
if (isset($_POST['donor_approve'])) {
   // echo('haye ...');
   $ApproveID = $_POST['ApproveID'];
   //    echo "$ApproveID";
   $daletequery = mysqli_query($conection, "Update  blooddonor set Status='Approved' WHERE ID='$ApproveID'");
   //    $daletequery=mysqli_query($conection,"DELETE FROM blooddonor WHERE `blooddonor`.`ID` = $deleteID");
   if ($daletequery) {
      // echo ("$deleteID");
      //echo"<script>alert('Approved successfully')</script>";
      echo "<script>window.location.href='../donor.php'</script>";
   } else {
      // echo"<script>alert('Approve not successfully')</script>";
      echo "<script>window.location.href='../donor.php'</script>";
   }
}
if (isset($_POST['donor_donated'])) {
   // echo('haye ...');
   $donatedID = $_POST['donatedID'];
   //    echo "$ApproveID";
   $daletequery = mysqli_query($conection, "Update  blooddonor set Status='Donated' WHERE ID='$donatedID'");
   //    $daletequery=mysqli_query($conection,"DELETE FROM blooddonor WHERE `blooddonor`.`ID` = $deleteID");
   if ($daletequery) {
      // echo ("$deleteID");
      // echo "<script>alert('Approved successfully')</script>";
      echo "<script>window.location.href='../donor.php'</script>";
   } else {
      // echo"<script>alert('Approve not successfully')</script>";
      echo "<script>window.location.href='../donor.php'</script>";
   }
}
