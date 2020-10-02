<?php
include('config.php');

$student_id = $_POST["stud_id"];
$as_of = $_POST["as_of"];	
$tuition_fee_pd = $_POST["tuition_fee_pd"];
$books_pd = $_POST["books_pd"];
$others_pd = $_POST["others_pd"];
$total_past_dues = $_POST["total_past_dues"];
$tuition_fee_cd = $_POST["tuition_fee_cd"];
$books_cd = $_POST["books_cd"];
$tutorial_cd = $_POST["tutorial_cd"];
$due_late_cd = $_POST["due_late_cd"];
$others_cd = $_POST["others_cd"];
$total_current_dues = $_POST["total_current_dues"];
$due_on = $_POST["due_on"];
$total_due = $_POST["total_due"];
$or_number = $_POST["or_number"];
$amount_paid = $_POST["amount_paid"];
$balance_after_payment = $_POST["balance_after_payment"];

$past_dues_id = $student_id + 1;
$current_dues_id = $past_dues_id + 1;
$PAYMENT_ID = $current_dues_id + 1;
//$confirmationCode = rand(100000,999999);



$update = "UPDATE students_list SET
statement_as_of = '$as_of',
tuition_fee_pd = '$tuition_fee_pd',
books_pd = '$books_pd',
others_pd = '$others_pd',
total_past_dues = '$total_past_dues',
tuition_fee_cd = '$tuition_fee_cd',
books_cd = '$books_cd',
tutorial_cd = '$tutorial_cd',
surcharge_due_to_late_payment_cd = '$due_late_cd',
others_cd = '$others_cd',
total_current_due = '$total_current_dues',
due_on = '$due_on',
total_due = '$total_due',
or_number = '$or_number',
amount_paid = '$amount_paid',
balance_after_payment = '$balance_after_payment',

past_dues_id = '$past_dues_id',
current_dues_id = '$current_dues_id',
PAYMENT_ID = '$PAYMENT_ID'
WHERE student_id = '$student_id';";
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
?>