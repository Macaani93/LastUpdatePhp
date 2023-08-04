<?php

include("src/conection.php");

if (isset($_POST['donor_update'])) {
    // $update_id = $_POST['update-user'];

    // $updateQry = mysqli_query($conection, "SELECT * FROM  chariyah WHERE   ID  =  '$update_id'");

    // while ($update_row = mysqli_fetch_array($updateQry)) {


    $id = $_POST['IDedit'];
    $fname = $_POST['Name'];
    $address = $_POST['Address'];
    $phone = $_POST['Phone'];
    $age = $_POST['age'];
    $bloodtype = $_POST['bloodtype'];



    $update_data = mysqli_query($conection, "UPDATE `blooddonor` SET `Name`='$fname',`Address`='$address',`Phone`='$phone',`Age`='$age',
   `BloodType`='$bloodtype' WHERE `ID`='$id'");

    if ($update_data) {
        echo "<script>alert('updated successfully....')</script>";
        echo "<script>window.location.href='donor.php'</script>";
    } else {
        echo "<script>alert('Not updated....')</script>";
    }
}
