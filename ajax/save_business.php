<?php
include '../config/db.php';

$id      = $_POST['id'];
$name    = $_POST['name'];
$address = $_POST['address'];
$phone   = $_POST['phone'];
$email   = $_POST['email'];

if($id == ''){
    $conn->query("INSERT INTO businesses (name,address,phone,email)
                  VALUES ('$name','$address','$phone','$email')");
} else {
    $conn->query("UPDATE businesses SET
                  name='$name',
                  address='$address',
                  phone='$phone',
                  email='$email'
                  WHERE id=$id");
}