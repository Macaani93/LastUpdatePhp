<?php

include("src/conection.php");

if (isset($_POST['update_chariyah'])) {
    // $update_id = $_POST['update-user'];

    // $updateQry = mysqli_query($conection, "SELECT * FROM  chariyah WHERE   ID  =  '$update_id'");

    // while ($update_row = mysqli_fetch_array($updateQry)) {


    $id = $_POST['ID'];
    $fname = $_POST['Name'];
    $phone = $_POST['Phone'];
    $type = $_POST['type'];
    $description = $_POST['description'];


    $update_data = mysqli_query($conection, "UPDATE `chariyah` SET `Name`='$fname',`Phone`='$phone',
    `Type`='$type', `Description`='$description' WHERE `ID`='$id'");

    if ($update_data) {
        echo "<script>alert('updated successfully....')</script>";
        echo "<script>window.location.href='chariyah.php'</script>";
    } else {
        echo "<script>alert('Not updated....')</script>";
    }
}
