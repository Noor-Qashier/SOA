<?php
include('config.php');

$for_the_month = $_POST["for_the_month"];
$stud_id = $_POST["stud_id"];	
$stud_name = $_POST["stud_name"];
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

$query = "SELECT * FROM monthly_payment WHERE student_id = '$stud_id'";
$result = mysqli_query($mysqli,$query);

if (mysqli_num_rows($result)==0) {
	$insert = "INSERT INTO monthly_payment 
	(for_the_month,
	student_id,
	student_name,
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

	if(mysqli_query($mysqli, $insert))
	{
		echo "successfuuly added";
	}	
	else 
	{
		echo mysqli_error($mysqli);
		echo "failed";
	}
}else{
	$update = "UPDATE monthly_payment SET
	for_the_month = '$for_the_month',
	student_id = '$stud_id',
	student_name = '$stud_name',
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
	balance_after_payment = '$balance_after_payment',

	WHERE student_id = '$stud_id';";
		if(mysqli_query($mysqli,$update))
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