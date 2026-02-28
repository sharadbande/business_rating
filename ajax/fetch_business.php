<?php 
include '../config/db.php';

$result = $conn->query("
    SELECT b.*, 
    IFNULL(ROUND(AVG(r.rating),1),0) as avg_rating 
    FROM businesses b 
    LEFT JOIN ratings r ON b.id = r.business_id 
    GROUP BY b.id
");

$allData = [];

while ($row = $result->fetch_assoc()) {
    $allData[] = $row;
}

echo json_encode($allData);