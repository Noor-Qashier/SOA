<?php
include('config.php');

$rem = $_POST['remark'];
$for_the_month = $_POST["for_the_month"];
$stud_id = $_POST["stud_id"];	
$stud_name = $_POST["stud_name"];
$level = $_POST['level'];
$as_of = $_POST["as_of"];
$total_past_due = $_POST["total_past_due"];
$tuition_fee_cd = $_POST["tuition_fee_cd"];
$tutorial_cd = $_POST["tutorial_cd"];
$surcharge_cd = $_POST["surcharge_cd"];
$other_description = $_POST["other_description"];
$others_amount = $_POST["others_amount"];
$total_current_dues = $_POST["total_current_dues"];
$due_on = $_POST["due_on"];
$total_due = $_POST["total_due"];
$or_number = $_POST["or_number"];
$amount_paid = $_POST["amount_paid"];
$balance_after_payment = $_POST["balance_after_payment"];
$date = date('Y');



$query = "SELECT * FROM monthly_payment WHERE student_id = '$stud_id'";
$result = mysqli_query($mysqli,$query);
$row = mysqli_fetch_assoc($result);

$evalTotal = "SELECT * FROM student_payment_information WHERE student_id = '$stud_id'";
$resultTotal = mysqli_query($mysqli,$evalTotal);
$rowTotal = mysqli_fetch_assoc($resultTotal);

$remark;
if($rowTotal['total_wd_add_pay'] <= 0 || $rem == "Paid"){
	$remark = "Paid";
}else{
	if($rowTotal['remark'] == "Partial"){
		$remark = "Partial";
	}else{
		$remark = "Monthly";
	}	
}


if($tutorial_cd ==""){
	$tutorial_cd = 0;
}
if($surcharge_cd ==""){
	$surcharge_cd = 0;
}
if($others_amount ==""){
	$others_amount = 0;
}
if($amount_paid == ""){
	$amount_paid = 0;
}
//echo $tutorial_cd.' '.$surcharge_cd.' '.$others_amount;
//
$additionalPayment = $tutorial_cd + $surcharge_cd + $others_amount;
$calTotal = $rowTotal['total_wd_add_pay'] + $additionalPayment;
$newTotal = $calTotal - $amount_paid;


//echo $calTotal.' '.$newTotal;

if (mysqli_num_rows($result)==0) {


//echo $tutorial_cd;
	$updateNewTotal = "UPDATE student_payment_information SET total_wd_add_pay = '$newTotal', additional_payment = '$additionalPayment', remark = '$remark' WHERE student_id = '$stud_id';";

	$insert_new = "INSERT INTO monthly_payment 
	(for_the_month,
	student_id,
	student_name,
	level,
	statement_as_of,
	past_due_amount,
	tuition_fee_lmodule,
	tutorial,
	surcharge,
	other_description,
	other_amount,
	total_current_due,
	due_on,
	total_due,
	or_no,
	amount_paid,
	balance_after_payment)
	VALUES
	('$for_the_month',
	'$stud_id',
	'$stud_name',
	'$level',
	'$as_of',
	'$total_past_due',
	'$tuition_fee_cd',
	'$tutorial_cd',
	'$surcharge_cd',
	'$other_description',
	'$others_amount',
	'$total_current_dues',
	'$due_on',
	'$total_due',
	'$or_number',
	'$amount_paid',
	'$balance_after_payment')";

	$insert_history = "INSERT INTO monthly_payment_history 
	(for_the_month,
	student_id,
	student_name,
	level,
	statement_as_of,
	past_due_amount,
	tuition_fee_lmodule,
	tutorial,
	surcharge,
	other_description,
	other_amount,
	total_current_due,
	due_on,
	total_due,
	or_no,
	amount_paid,
	balance_after_payment)
	VALUES
	('$for_the_month',
	'$stud_id',
	'$stud_name',
	'$level',
	'$as_of',
	'$total_past_due',
	'$tuition_fee_cd',
	'$tutorial_cd',
	'$surcharge_cd',
	'$other_description',
	'$others_amount',
	'$total_current_dues',
	'$due_on',
	'$total_due',
	'$or_number',
	'$amount_paid',
	'$balance_after_payment')";

	$insert_client = "INSERT INTO monthly_payment_client 
	(for_the_month,
	student_id,
	student_name,
	level,
	statement_as_of,
	past_due_amount,
	tuition_fee_lmodule,
	tutorial,
	surcharge,
	other_description,
	other_amount,
	total_current_due,
	due_on,
	total_due,
	or_no,
	amount_paid,
	balance_after_payment)
	VALUES
	('$for_the_month',
	'$stud_id',
	'$stud_name',
	'$level',
	'$as_of',
	'$total_past_due',
	'$tuition_fee_cd',
	'$tutorial_cd',
	'$surcharge_cd',
	'$other_description',
	'$others_amount',
	'$total_current_dues',
	'$due_on',
	'$total_due',
	'$or_number',
	'$amount_paid',
	'$balance_after_payment')";

	if(mysqli_query($mysqli, $insert_new) && mysqli_query($mysqli, $insert_history) && mysqli_query($mysqli, $insert_client) && mysqli_query($mysqli, $updateNewTotal))
	{
		echo "successfully added";
	}	
	else 
	{
		echo mysqli_error($mysqli);
		echo "failed";
	}
}else{

	if($tutorial_cd ==""){
	$tutorial_cd = $row['tutorial'];
	}
	if($surcharge_cd ==""){
		$surcharge_cd = $row['surcharge'];
	}
	if($others_amount ==""){
		$others_amount = $row['other_amount'];
	}
	if($amount_paid == ""){
		$amount_paid = $row['amount_paid'];
	}
	if($other_description == "" ){
		$other_description = $row['other_description'];
	}

	$additionalPayment = $tutorial_cd + $surcharge_cd + $others_amount;
	
	$updateNewTotal = "UPDATE student_payment_information SET total_wd_add_pay = '$newTotal', additional_payment = '$additionalPayment', remark = '$remark' WHERE student_id = '$stud_id';";

	$update = "UPDATE monthly_payment SET
	for_the_month = '$for_the_month',
	student_id = '$stud_id',
	student_name = '$stud_name',
	level = '$level',
	statement_as_of = '$as_of',
	past_due_amount = '$total_past_due',
	tuition_fee_lmodule = '$tuition_fee_cd',
	tutorial = '$tutorial_cd',
	surcharge = '$surcharge_cd',
	other_description = '$other_description',
	other_amount = '$others_amount',
	total_current_due = '$total_current_dues',
	due_on = '$due_on',
	total_due = '$total_due',
	or_no = '$or_number',
	amount_paid = '$amount_paid',
	balance_after_payment = '$balance_after_payment'

	WHERE student_id = '$stud_id';";

	$insert_history = "INSERT INTO monthly_payment_history 
	(for_the_month,
	student_id,
	student_name,
	level,
	statement_as_of,
	past_due_amount,
	tuition_fee_lmodule,
	tutorial,
	surcharge,
	other_description,
	other_amount,
	total_current_due,
	due_on,
	total_due,
	or_no,
	amount_paid,
	balance_after_payment)
	VALUES
	('$for_the_month',
	'$stud_id',
	'$stud_name',
	'$level',
	'$as_of',
	'$total_past_due',
	'$tuition_fee_cd',
	'$tutorial_cd',
	'$surcharge_cd',
	'$other_description',
	'$others_amount',
	'$total_current_dues',
	'$due_on',
	'$total_due',
	'$or_number',
	'$amount_paid',
	'$balance_after_payment')";

	$insert_client = "UPDATE monthly_payment_client SET
	for_the_month = '$for_the_month',
	student_id = '$stud_id',
	student_name = '$stud_name',
	level = '$level',
	statement_as_of = '$as_of',
	past_due_amount = '$total_past_due',
	tuition_fee_lmodule = '$tuition_fee_cd',
	tutorial = '$tutorial_cd',
	surcharge = '$surcharge_cd',
	other_description = '$other_description',
	other_amount = '$others_amount',
	total_current_due = '$total_current_dues',
	due_on = '$due_on',
	total_due = '$total_due',
	or_no = '$or_number',
	amount_paid = '$amount_paid',
	balance_after_payment = '$balance_after_payment'

	WHERE student_id = '$stud_id';";

	if(mysqli_query($mysqli, $update) && mysqli_query($mysqli, $insert_history) && mysqli_query($mysqli, $insert_client) && mysqli_query($mysqli, $updateNewTotal))
		{
			echo mysqli_error($mysqli);
			echo "Updated";
		}
		else
		{
			echo mysqli_error($mysqli);
			echo "Failed";
		}
}
/*
*/
?>