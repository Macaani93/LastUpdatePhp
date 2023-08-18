<?php
include('src/conection.php');

if (isset($_POST['fromDate'])) {
    $CharityID = $_POST['CharityID'];
    $fromDate = $_POST['fromDate'];
    $EndDate = $_POST['EndDate'];

    // $sql = "SET @status = '$status';";
    // mysqli_query($conection, $sql);

    $sql = "SET @chariyahID = '$CharityID';";
    mysqli_query($conection, $sql);

    $sql = "SET @startDate = '$fromDate';";
    mysqli_query($conection, $sql);

    $sql = "SET @endDate = '$EndDate';";
    mysqli_query($conection, $sql);

    $query = "
SELECT ch.Name CharityID,s.Phone,s.Amount,s.RegDate,ch.Type as UserID
FROM `sadaqah` s, chariyah ch WHERE s.CharityID=ch.ID
and (@chariyahID = 'All' OR s.CharityID  = @chariyahID )
and DATE(s.RegDate) BETWEEN @startDate and @endDate";
    // $CharityID = $_POST['CharityID'];
    // $fromDate = $_POST['fromDate'];
    // $EndDate = $_POST['EndDate'];
    // kuwaan iska hubi DatabTable Print haka hilmaamin Engr 
    // ku soco 
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
