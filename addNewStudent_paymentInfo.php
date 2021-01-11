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
	
	$downPayment = $_POST['downPayment'];
	$payModule = $_POST['payModule'];
	$or_no = $_POST['or_no'];
	$amountPay = $_POST['amountPay'];
	$date_of_entry = date('Y-m-d');
	
	$payModule1 = $_POST['payModule1'];

	$output ="";

	//$amountPayTotal = $amountPay+$payModule;
	//echo $amountPay;
$select = "SELECT * FROM student_payment_information WHERE fname = '$fname' AND lname = '$lname' OR student_id = '$student_id' ";
$result = mysqli_query($mysqli,$select);

if(mysqli_num_rows($result) != 0){
	$output.= "Student already exist!";
}else{

if($status == "Regular"){
	if($payment_m == "Cash"){


	$getPaymentInfo = "SELECT * FROM payment_information_regular WHERE level = '$level'";
	$result = mysqli_query($mysqli,$getPaymentInfo);
	$row = mysqli_fetch_assoc($result);

	
	$sql = "INSERT INTO student_payment_information (
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
	downPayment,
	payModule,
	or_no,
	amountPay,
	date_of_entry,
	remark) VALUES (
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
	'$downPayment',
	'$payModule1',
	'$or_no',
	'$amountPay',
	'$date_of_entry',
	'Full Payment')";

		if(mysqli_query($mysqli, $sql))
		{
			$output.= "successfully added";
		}	
		else 
		{
			$output.= mysqli_error($mysqli);
			$output.= "failed";
		}
	}else{
		$total = $_POST['total'];
		$monthly = $_POST['monthly'];

		$getPaymentInfo = "SELECT * FROM payment_information_regular WHERE level = '$level'";
		$result = mysqli_query($mysqli,$getPaymentInfo);
		$row = mysqli_fetch_assoc($result);

		$output ="";
		$sql = "INSERT INTO student_payment_information (
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
		total_wd_add_pay,
		monthly,
		downPayment,
		payModule,
		or_no,
		amountPay,
		date_of_entry,
		remark) VALUES (
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
		'$total',
		'$monthly',
		'$downPayment',
		'$payModule',
		'$or_no',
		'$amountPay',
		'$date_of_entry',
		'Monthly')";

			if(mysqli_query($mysqli, $sql))
			{
				$output.= "successfully added";
			}	
			else 
			{
				$output.= mysqli_error($mysqli);
				$output.= "failed";
			}
		}
}else{
	if($payment_m == "Cash"){

	$getPaymentInfo = "SELECT * FROM payment_information_odl WHERE level = '$level'";
	$result = mysqli_query($mysqli,$getPaymentInfo);
	$row = mysqli_fetch_assoc($result);

	$output ="";
	$sql = "INSERT INTO student_payment_information (
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

	downPayment,
	payModule,
	or_no,
	amountPay,
	date_of_entry,
	remark) VALUES (
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

	'$downPayment',
	'$payModule1',
	'$or_no',
	'$amountPay',
	'$date_of_entry',
	'Full Payment')";

		if(mysqli_query($mysqli, $sql))
		{
			$output.= "successfully added";
		}	
		else 
		{
			$output.= mysqli_error($mysqli);
			$output.= "failed";
		}
}else if($payment_m == "Partial") {
	$total = $_POST['total'];
	$monthly = $_POST['monthly'];
	$getPaymentInfo = "SELECT * FROM payment_information_odl WHERE level = '$level'";
	$result = mysqli_query($mysqli,$getPaymentInfo);
	$row = mysqli_fetch_assoc($result);

	$output ="";
	$sql = "INSERT INTO student_payment_information (
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
	total_wd_add_pay,
	monthly,
	downPayment,
	payModule,
	date_of_entry,
	remark) VALUES (
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
	'$total',
	'$monthly',
	'$downPayment',
	'$payModule',
	'$date_of_entry',
	'Partial')";

		if(mysqli_query($mysqli, $sql))
		{
			$output.= "successfully added";
		}	
		else 
		{
			$output.= mysqli_error($mysqli);
			$output.= "failed";
		}
	}else{
		$total = $_POST['total'];
		$monthly = $_POST['monthly'];
			$getPaymentInfo = "SELECT * FROM payment_information_odl WHERE level = '$level'";
			$result = mysqli_query($mysqli,$getPaymentInfo);
			$row = mysqli_fetch_assoc($result);

			$output ="";
			$sql = "INSERT INTO student_payment_information (
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
			total_wd_add_pay,
			monthly,
			downPayment,
			payModule,
			date_of_entry,
			remark) VALUES (
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
			'$total',
			'$monthly',
			'$downPayment',
			'$payModule1',
			'$date_of_entry',
			'Monthly')";

				if(mysqli_query($mysqli, $sql))
				{
					$output.= "successfully added";
				}	
				else 
				{
					$output.= mysqli_error($mysqli);
					$output.= "failed";
				}
	}
}
}

$username = $fname.' '.$lname;
$insert_user = "INSERT INTO user (username,password,position)VALUES('$username','$student_id','Student')";
mysqli_query($mysqli,$insert_user);

echo $output;
?>

