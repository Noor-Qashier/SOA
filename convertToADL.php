<?php
include 'config.php';
$student_id = $_POST['student_id'];

$selectStud = "SELECT *FROM student_payment_information WHERE student_id = '$student_id'";
$resultStud = mysqli_query($mysqli,$selectStud);
$rowStud = mysqli_fetch_assoc($resultStud);

$level = $rowStud['level'];

$select = "SELECT *FROM payment_information_odl WHERE level = '$level'";
$result = mysqli_query($mysqli,$select);
$row = mysqli_fetch_assoc($result);

$monthly = $row['monthly']; 

$update ="UPDATE student_payment_information SET status = 'Online Distance Learning', remark = 'Partial', monthly = '$monthly';";
if(mysqli_query($mysqli,$update)){
	echo "Convert Successful!";
}else{
	echo mysqli_error($mysqli);
	echo "Failed to Convert";
}
?>