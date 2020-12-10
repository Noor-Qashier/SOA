<?php 
include 'config.php';
$bal_as_of_this_month = $_POST['bal_as_of_this_month'];
$annual_balance = $_POST['annual_balance'];
$total_anual_bal = $_POST['total_anual_bal'];
$total_amount_paid = $_POST['total_amount_paid'];
$student_id = $_POST['student_id'];


$query1 = "SELECT * FROM student_payment_information WHERE student_id = '$student_id'";
$result1 = mysqli_query($mysqli,$query1);
$row1 = mysqli_fetch_assoc($result1);

$query_history = "SELECT * FROM monthly_payment_history WHERE student_id = '$student_id' ORDER BY statement_as_of DESC";
$result_history = mysqli_query($mysqli,$query_history);
$row_history = mysqli_fetch_assoc($result_history);

$sumAllPay = "SELECT SUM(amount_paid) AS total_paid FROM monthly_payment_history WHERE student_id='$student_id'";
$sum_result = mysqli_query($mysqli,$sumAllPay);
$row_sum = mysqli_fetch_assoc($sum_result);

			$sumAlltutorial = "SELECT SUM(tutorial) AS total_paid_tutorial FROM monthly_payment_history WHERE student_id='$student_id'";
			$sum_tutorial = mysqli_query($mysqli,$sumAlltutorial);
			$row_tutorial = mysqli_fetch_assoc($sum_tutorial);

			$sumAllsurcharge = "SELECT SUM(surcharge) AS total_paid_surcharge FROM monthly_payment_history WHERE student_id='$student_id'";
			$sum_surcharge = mysqli_query($mysqli,$sumAllsurcharge);
			$row_surcharge = mysqli_fetch_assoc($sum_surcharge);

			$sumAllother = "SELECT SUM(other_amount) AS total_paid_other FROM monthly_payment_history WHERE student_id='$student_id'";
			$sum_other = mysqli_query($mysqli,$sumAllother);
			$row_other = mysqli_fetch_assoc($sum_other);

$countAllPay = "SELECT COUNT(amount_paid) AS countAll FROM monthly_payment_history WHERE student_id='$student_id' AND amount_paid != 0";
$count_result = mysqli_query($mysqli,$countAllPay);
$row_count = mysqli_fetch_assoc($count_result);

//echo $total_amount_paid;
$student_id = $row1['student_id'];
$fname = $row1['fname'];
$lname = $row1['lname'];
$tuition_fees = $row1['tuition_fees'];
$other_school_fees = $row1['other_school_fees'];
$status = $row1['status'];
$level = $row1['level'];
$ESC = $row1['ESC'];
$voucher = $row1['voucher'];
$h_student = $row1['h_student'];
$sibling = $row1['sibling'];
$payment_m = $row1['payment_m'];
$subtotal = $row1['subtotal'];
$total = $row1['total'];
$payModule = $row1['payModule'];
$date_of_entry = date('Y-m-d');

$additional_payment = $row_tutorial['total_paid_tutorial']+$row_surcharge['total_paid_surcharge']+$row_other['total_paid_other'];

$no_of_month = $row_count['countAll'];
$amount_paid_of_month = $row_sum['total_paid'];

$delete ="DELETE FROM student_payment_information WHERE student_id = '$student_id'";

$insert = "INSERT INTO full_payment(
student_id,
fname,
lname,
tuition_fees,
other_school_fees,
additional_payment,
status,
level,
ESC,
voucher,
h_student,
sibling,
payment_m,
subtotal,
total,
no_of_month,
amount_paid_of_month,
learning_module,
bal_as_of_this_month,
total_annual_balance,
payment_amount,
date_of_entry,
payment_status
)VALUES(
'$student_id',
'$fname',
'$lname',
'$tuition_fees',
'$other_school_fees',
'$additional_payment',
'$status',
'$level',
'$ESC',
'$voucher',
'$h_student',
'$sibling',
'$payment_m',
'$subtotal',
'$total',
'$no_of_month',
'$amount_paid_of_month',
'$payModule',
'$bal_as_of_this_month',
'$total_anual_bal',
'$total_amount_paid',
'$date_of_entry',
'Paid'
)";

	if(mysqli_query($mysqli, $insert) && mysqli_query($mysqli, $delete))
	{
		echo "successfully added";
	}	
	else 
	{
		echo mysqli_error($mysqli);
		echo "failed";
	}
?>