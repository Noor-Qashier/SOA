<?php
include('config.php');
	
$student_id = $_POST['student_id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$status = $_POST['status'];
$level = $_POST['level'];
$ESC = $_POST['ESC'];
$voucher = $_POST['voucher'];
$h_student = $_POST['h_student'];
$sibling = $_POST['sibling'];
$payment_m = $_POST['payment_m'];
$subtotal = $_POST['subtotal'];
$total = $_POST['total'];
$date_of_entry = date('Y-m-d');

$getPaymentInfo = "SELECT * FROM payment_information WHERE level = '$level'";
$result = mysqli_query($mysqli,$getPaymentInfo);
$row = mysqli_fetch_assoc($result);

$output ="";
$sql = "INSERT INTO full_payment (
student_id,
fname,
lname,
tuition_fees,
other_school_fees,
learning_module,
status,
level,
ESC,
voucher,
h_student,
sibling,
payment_m,
subtotal,
total,
payment_status,
date_of_entry) VALUES (
'$student_id',
'$fname',
'$lname',
'".$row['tuition_fees']."',
'".$row['other_school_fees']."',
'".$row['learning_module']."',
'$status',
'$level',
'$ESC',
'$voucher',
'$h_student',
'$sibling',
'$payment_m',
'$subtotal',
'$total',
'Paid',
'$date_of_entry')";

	if(mysqli_query($mysqli, $sql))
	{
		$output.= "successfuuly added";
	}	
	else 
	{
		$output.= mysqli_error($mysqli);
		$output.= "failed";
	}
echo $output;
?>

