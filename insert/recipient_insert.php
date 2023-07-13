<?php
include("../src/conection.php");
if (isset($_POST['donor_insert'])) {
    $fname = $_POST['Name'];
    $Address=$_POST['Address'];
    $phone=$_POST['Phone'];
    $age=$_POST['age'];
    // $date=$_POST['date'];
    $bloodtype= $_POST['bloodtype'];

    $insert_recipient = mysqli_query($conection,"INSERT INTO `bloodseeker`( `Name`,`Address`, `Phone`,  
    `Age`,  `BloodType`) VALUES('$fname','$Address','$phone','$age','$bloodtype')");
   
    if($insert_recipient){
        echo" <script>alert('insert successfully')</script>";
      echo "<script>window.location.href='../Recipient.php'</script>";


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
    

?>