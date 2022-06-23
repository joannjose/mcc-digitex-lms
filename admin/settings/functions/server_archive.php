<?php
require_once('../../../config.php');
 
$sql = "SELECT * FROM academic_year WHERE archived=1";
 
 
$query = $conn->query($sql);
$result = [];
while ($row = $query->fetch_assoc()) {
    $result[] = [
        $row['id'],
        $row['name'],
        $acadYear = $row['startYear']."-".$row['endYear'],
        $row['semester'],
        $row['archived']
    ];
}
 
echo json_encode([
    'data' => $result,
]);