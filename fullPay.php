<?php
include 'config.php';
$student_id = $_POST['studId'];


$selectStudInfo = "SELECT *FROM student_payment_information WHERE student_id = '$student_id'";
$resultStudInfo = mysqli_query($mysqli,$selectStudInfo);
$rowStudInfo = mysqli_fetch_assoc($resultStudInfo);

$selectMozPay = "SELECT *FROM monthly_payment WHERE student_id = '$student_id'";
$resultMozPay = mysqli_query($mysqli,$selectMozPay);
$rowMozPay = mysqli_fetch_assoc($resultMozPay);

$newTotal;
if($rowMozPay['balance_after_payment'] <= 0){
	$newTotal = $rowStudInfo['total_wd_add_pay']+$rowMozPay['balance_after_payment'];
}else{

}

$update = "UPDATE student_payment_information SET total_wd_add_pay = '$newTotal' WHERE student_id = '$student_id'";
if(mysqli_query($mysqli, $update))
		{
			echo mysqli_error($mysqli);
			echo "Updated";
		}
		else
		{
			echo mysqli_error($mysqli);
			echo "Failed";
		}
?>