<?php
include 'config.php';
$UID = $_POST['UID'];

$select = "SELECT * FROM student_payment_information WHERE student_id = '$UID'";
$result = mysqli_query($mysqli,$select);
$row = mysqli_fetch_assoc($result);

echo json_encode($row);
?>