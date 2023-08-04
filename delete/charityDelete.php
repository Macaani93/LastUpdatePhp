<?php
include("../src/conection.php");

if (isset($_POST['charity_delete'])) {
    $deleteID = $_POST['delateID'];
    $daletequery = mysqli_query($conection, "DELETE FROM chariyah WHERE ID='$deleteID'");
    if ($daletequery) {
        echo "<script>alert('delete successfully')</script>";
        echo "<script>window.location.href='../chariyah.php'</script>";
    } else {
        echo "<script>alert('delete not successfully')</script>";
        echo "<script>window.location.href='../chariyah.php'</script>";
    }
}
