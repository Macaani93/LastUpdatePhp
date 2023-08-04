<?php
include('src/conection.php');

if (isset($_POST['blood_type'])) {
    $blood_type = $_POST['blood_type'];
    $status = $_POST['status'];
    $fromDate = $_POST['fromDate'];
    $EndDate = $_POST['EndDate'];

    $sql = "SET @status = '$status';";
    mysqli_query($conection, $sql);

    $sql = "SET @bloodType = '$blood_type';";
    mysqli_query($conection, $sql);

    $sql = "SET @startDate = '$fromDate';";
    mysqli_query($conection, $sql);

    $sql = "SET @endDate = '$EndDate';";
    mysqli_query($conection, $sql);

    $query = "
    SELECT DISTINCT bd.ID, bd.name AS PersonName, d.Name AS Address, bd.Phone, bd.Age AS Age, 
        CASE
            WHEN TIMESTAMPDIFF(SECOND, bd.RegDate, NOW()) < 60 THEN CONCAT(TIMESTAMPDIFF(SECOND, bd.RegDate, NOW()), ' seconds ago')
            WHEN TIMESTAMPDIFF(MINUTE, bd.RegDate, NOW()) < 60 THEN CONCAT(TIMESTAMPDIFF(MINUTE, bd.RegDate, NOW()), ' minutes ago')
            WHEN TIMESTAMPDIFF(HOUR, bd.RegDate, NOW()) < 24 THEN CONCAT(TIMESTAMPDIFF(HOUR, bd.RegDate, NOW()), ' hours ago')
            WHEN TIMESTAMPDIFF(DAY, bd.RegDate, NOW()) < 30 THEN CONCAT(TIMESTAMPDIFF(DAY, bd.RegDate, NOW()), ' days ago')
            ELSE CONCAT(TIMESTAMPDIFF(MONTH, bd.RegDate, NOW()), ' months ago')
        END AS RegDateAgo,
        bd.Status AS Status, b.name AS BloodType
    FROM blooddonor bd 
    LEFT JOIN blood b ON b.ID = bd.BloodType
    LEFT JOIN district d ON d.ID = bd.District
    WHERE
        (@status = 'All' OR bd.Status = @status) AND
        (b.ID = @bloodType OR @bloodType = 'All') AND
        bd.RegDate BETWEEN @startDate AND @endDate
    ORDER BY bd.RegDate DESC
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
