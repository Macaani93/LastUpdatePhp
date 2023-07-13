<?php
include("../src/conection.php");
if (isset($_POST['donor_delete'])) {
   $deleteID=$_POST['delateID'];
   $daletequery=mysqli_query($conection,"DELETE FROM bloodseeker WHERE ID='$deleteID'");
   if($daletequery){
         echo"<script>alert('delete successfully')</script>";
         echo"<script>window.location.href='../Recipient.php'</script>";
        
    }else{
        echo"<script>alert('delete not successfully')</script>";
        echo"<script>window.location.href='../donor.php'</script>";
    }
   }




?>