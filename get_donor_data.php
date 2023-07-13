<?php
include('src/conection.php');

if (isset($_POST['blood_type'])) {
  $blood_type = $_POST['blood_type'];

  $sql = "SELECT DISTINCT bd.ID ID, bd.name PersonName, bd.Address, bd.Phone, bd.Age Age, 
  CASE
    WHEN TIMESTAMPDIFF(SECOND, bd.RegDate, NOW()) < 60 THEN CONCAT(TIMESTAMPDIFF(SECOND, bd.RegDate, NOW()), ' seconds ago')
    WHEN TIMESTAMPDIFF(MINUTE, bd.RegDate, NOW()) < 60 THEN CONCAT(TIMESTAMPDIFF(MINUTE, bd.RegDate, NOW()), ' minutes ago')
    WHEN TIMESTAMPDIFF(HOUR, bd.RegDate, NOW()) < 24 THEN CONCAT(TIMESTAMPDIFF(HOUR, bd.RegDate, NOW()), ' hours ago')
    WHEN TIMESTAMPDIFF(DAY, bd.RegDate, NOW()) < 30 THEN CONCAT(TIMESTAMPDIFF(DAY, bd.RegDate, NOW()), ' days ago')
    ELSE CONCAT(TIMESTAMPDIFF(MONTH, bd.RegDate, NOW()), ' months ago')
  END AS RegDateAgo,
  bd.Status as Status, b.name BloodType
FROM blooddonor bd 
LEFT JOIN blood b ON b.ID = bd.BloodType 
WHERE b.ID = '$blood_type' AND bd.Status = 'Approved' order by bd.RegDate desc";
  $result = mysqli_query($conection, $sql);

  $rows = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  echo json_encode($rows);
}
?>