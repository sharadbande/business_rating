<?php
include '../config/db.php';

$business_id = $_POST['business_id'];
$name  = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$rating = $_POST['rating'];

$check = $conn->query("
    SELECT id FROM ratings 
    WHERE business_id=$business_id 
    AND (email='$email' OR phone='$phone')
");

if($check->num_rows > 0){
    $row = $check->fetch_assoc();
    $conn->query("UPDATE ratings SET rating='$rating'
                  WHERE id=".$row['id']);
}else{
    $conn->query("INSERT INTO ratings (business_id,name,email,phone,rating)
                  VALUES ('$business_id','$name','$email','$phone','$rating')");
}

/* Return new average */
$avg = $conn->query("
    SELECT ROUND(AVG(rating),1) as avg_rating
    FROM ratings WHERE business_id=$business_id
")->fetch_assoc();

echo $avg['avg_rating'];