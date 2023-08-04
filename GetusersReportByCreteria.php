<?php
include('src/conection.php');

if (isset($_POST['Role'])) {
    $Role = $_POST['Role'];
    // $fromDate = $_POST['fromDate'];
    // $EndDate = $_POST['EndDate'];



    $sql = "SET @users = '$Role';";
    mysqli_query($conection, $sql);

    $query = "SELECT * FROM `users` WHERE (@users = 'All' OR Role COLLATE utf8mb4_general_ci = @users COLLATE utf8mb4_general_ci)";

    $result = mysqli_query($conection, $query);

    if (!$result) {
        echo "Query error: " . mysqli_error($conection);
        exit;
    }

    $rows = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    echo json_encode($rows);
}
