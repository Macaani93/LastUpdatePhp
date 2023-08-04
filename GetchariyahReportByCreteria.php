<?php
include('src/conection.php');

if (isset($_POST['fromDate'])) {
    $type = $_POST['Type'];
    $fromDate = $_POST['fromDate'];
    $EndDate = $_POST['EndDate'];

    // $sql = "SET @status = '$status';";
    // mysqli_query($conection, $sql);

    $sql = "SET @type = '$type';";
    mysqli_query($conection, $sql);

    $sql = "SET @startDate = '$fromDate';";
    mysqli_query($conection, $sql);

    $sql = "SET @endDate = '$EndDate';";
    mysqli_query($conection, $sql);

    $query = "
   SELECT *
FROM `chariyah`
WHERE (@type = 'All' OR Type COLLATE utf8mb4_general_ci = @type COLLATE utf8mb4_general_ci)
 and DonateDate BETWEEN @startDate and @endDate
    ";

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
