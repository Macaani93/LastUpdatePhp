<?php
include("../src/conection.php");

if (isset($_POST['user_delete'])) {  
   $deleteID=$_POST['delateID'];
   $daletequery=mysqli_query($conection,"DELETE FROM users WHERE ID='$deleteID'");
   if($daletequery){
         echo"<script>alert('delete successfully')</script>";
         echo"<script>window.location.href='../Users.php'</script>";
        
    }else{
        echo"<script>alert('delete not successfully')</script>";
        echo"<script>window.location.href='../users_list.php'</script>";
    }
   }
