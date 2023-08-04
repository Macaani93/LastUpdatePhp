<?php
include("../src/conection.php");
if (isset($_POST['donor_insert'])) {
  $fname = $_POST['Name'];

  $region = $_POST['Region'];
  $district = $_POST['District'];
  $phone = $_POST['Phone'];
  $age = $_POST['age'];
  $bloodtype = $_POST['bloodtype'];


  $insert_donor = mysqli_query($conection, "INSERT INTO `blooddonor`( `Name`,`Phone`,
    `Age`, `Region`, `District`,  `BloodType`,`Status`) VALUES('$fname','$phone','$region','$district',' $age ','$bloodtype','Approved')");

  if ($insert_donor) {
    // echo" <script>alert('insert successfully')</script>";
    echo "<script>window.location.href='../donor.php'</script>";
  } else {

    //   echo" <script>alert(' Already exists this username!')</script>";
    //  echo "<script>window.location.href='../Users.php'</script>";
    //    echo $path;
    //    echo("<br>");
    //    echo $Name;
    //    echo("<br>");
    //    echo $Phone;
    //    echo("<br>");
    //    echo $Address;
    //    echo("<br>");
    //    echo $Gender;
    //    echo("<br>");
    //    echo $dep_name;
    //    echo("<br>");
    //    echo $sch;
  }
}
