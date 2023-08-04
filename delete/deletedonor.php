<?php
include("../src/conection.php");

if (isset($_POST['deletedonor'])) {
    $deleteID = $_POST['donorID'];
    $daletequery = mysqli_query($conection, "DELETE FROM blooddonor WHERE ID='$deleteID'");
    if ($daletequery) {
        echo "<script>alert('delete successfully')</script>";
        echo "<script>window.location.href='../donor.php'</script>";
    } else {
        echo "<script>alert('delete not successfully')</script>";
        // echo "<script>window.location.href='../donr_list.php'</script>";
    }
}
