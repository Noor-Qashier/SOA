
<?php
include 'config.php';
$student_id = $_POST['student_id'];

$query = "SELECT * FROM monthly_payment WHERE student_id = '$student_id'";
$result = mysqli_query($mysqli,$query);
$row = mysqli_fetch_assoc($result);

$countAllPay = "SELECT COUNT(amount_paid) AS countAll FROM monthly_payment_history WHERE student_id='$student_id' AND amount_paid != 0";
$count_result = mysqli_query($mysqli,$countAllPay);
$row_count = mysqli_fetch_assoc($count_result);

$sumAllPay = "SELECT SUM(amount_paid) AS sumAllPay FROM monthly_payment_history WHERE student_id='$student_id' AND amount_paid != 0";
$sum_result = mysqli_query($mysqli,$sumAllPay);
$row_sum = mysqli_fetch_assoc($sum_result);

$query2 = "SELECT * FROM student_payment_information WHERE student_id = '$student_id'";
$result2 = mysqli_query($mysqli,$query2);
$row2 = mysqli_fetch_assoc($result2);

$sibling;
$honor;
$paymentMethod;

if($row2['sibling'] =="Yes"){
	$sibling = 0.95;
}else{
	$sibling = 1;
}
if($row2['h_student'] == "Silver"){
	$honor = 0.95;
}else if($row2['h_student'] == "Gold"){
	$honor = 0.90;
}else{
	$honor = 1;
}
if($row2['payment_m'] == "Cash"){
	$paymentMethod = 0.95;
}else{
	$paymentMethod = 1;
}

$sibling_disc = $row2['tuition_fees']*$sibling;
$honor_disc = $row2['tuition_fees']*$honor;
$payment_disc = $row2['tuition_fees']*$paymentMethod;

$sibling_converted = $row2['tuition_fees']-$sibling_disc;
$honor_converted = $row2['tuition_fees']-$honor_disc;
$payment_converted = $row2['tuition_fees']-$payment_disc;

$totalDiscount = $sibling_converted+$honor_converted+$payment_converted;
$totalTuition = $row2['tuition_fees']-$totalDiscount;
$totalBal = $totalTuition+$row2['other_school_fees']+$row2['learning_module'];

$dueDate = $row["due_on"];
$DUE_ON = date("M d Y", strtotime($dueDate));

$StatementDate = $row["statement_as_of"];
$stateDate = date("M d Y", strtotime($StatementDate));

$dateForTheMonth = $row2["date_of_entry"];
$newDateForTheMonth = date("F Y", strtotime($dateForTheMonth));

$tuition_fee;
if($row2['downPayment'] == 0){
	$tuition_fee = $row2['amountPay'];
}else{
	$tuition_fee = $row2['downPayment'];
}

$totalPay = $tuition_fee+$row2["payModule"];

$totalBalance = $row2["subtotal"]-$totalPay;

$studentName = $row2['fname'].' '.$row2['lname'];



echo '
<div class="form-group">
<h5 style="text-align:center;background-color:#EAECEE;padding-top:10px;padding-bottom:10px;">STUDENT INFORMATION<small><p>'.$newDateForTheMonth.'</p></small></h5>
</div>

<div class="form-group">
<h5 id="name" style="text-transform: uppercase; font-weight:bold;">'.$studentName.'</h5>
		<h6>SCHOOL ID:'.$row["student_id"].' | Level: '.$row2["level"].'</h6>
	 
</div>

<div class="form-group">
<table class="table table-bordered" width="100%" cellspacing="0">
	  <thead>
	  	<tr>
	  		<td align="right"><b>Payment Method</b></td>
	  		<td width="200" align="right"><b>'.$row2['payment_m'].'</b></td>
	  	</tr>
	  	<tr>
	  		<td align="right"><b>Remark</b></td>
	  		<td width="200" align="right"><b>'.$row2['remark'].'</b></td>
	  	</tr>
	  </thead>
</div>

<div class="form-group">
<table class="table table-bordered" width="100%" cellspacing="0">
	  <thead>
	  </thead>
	  <tbody>
	  	<tr>
	  		<td colspan="3"><b>TUITION FEES</b></td>
	  	</tr>
	  	<tr>
	  		<td>Tuition fee:</td>
	  		<td width="200" align="right">&#8369; '.number_format($row2["tuition_fees"],2).'</td>
	  	</tr>
	  	<tr>
	  		<td>Other School Fees:</td>
	  		<td align="right">&#8369; '.number_format($row2["other_school_fees"],2).'</td>
	  	</tr>
	  	<tr>
	  		<td>Learning Module</td>
	  		<td align="right">&#8369; '.number_format($row2["learning_module"],2).'</td>
	  	</tr>
	  	<tr>
	  		<td align="right"><b>Total Tuition Fees:</b></td>
	  		<td align="right"><b>&#8369; '.number_format($row2["subtotal"],2).'</b></td>
	  	</tr>
</div>
<div class="form-group">
<table class="table table-bordered" width="100%" cellspacing="0">
	  <thead>
	  	<tr>
	  		<th colspan="3" >DISCOUNTS</th>
	  	</tr>
	  </thead>
	  <tbody>
	  	<tr>
	  		<td>Honor Student</td>
	  		<td width="200" align="right">'.$row2['h_student'].'</td>
	  	</tr>
	  	<tr>
	  		<td>Sibling</td>
	  		<td align="right">'.$row2["sibling"].'</td>
	  	</tr>
	  	<tr>
	  		<td align="right"><b>Net Total:</b></td>
	  		<td width="150" align="right"><b>&#8369; '.number_format($totalBal,2).'</b></td>
	  	</tr>
</div>

<div class="form-group">
<table class="table table-bordered" width="100%" cellspacing="0">
	  <thead>
	  	<tr>
	  		<th colspan="3" >PAYMENTS</th>
	  	</tr>
	  </thead>
	  <tbody>
	  	<tr>
	  		<td>Tuition fee</td>
	  		<td width="200" align="right">&#8369; '.number_format($tuition_fee,2).'</td>
	  	</tr>
	  	<tr>
	  		<td>Learning Module</td>
	  		<td align="right">&#8369; '.number_format($row2["learning_module"],2).'</td>
	  	</tr>
	  	<tr>
	  		<td align="right"><b>Grand Total:</b></td>
	  		<td align="right"><b>&#8369; '.number_format($totalPay,2).'</b></td>
	  	</tr>
</div>

<div class="form-group">
<table class="table table-bordered"  width="100%" cellspacing="0">
	  <thead>
	  	<tr>
	  		<th colspan="3" >MONTHLY PAYMENTS</th>
	  	</tr>
	  </thead>
	  <tbody>
	  	<tr>
	  		<td>Monthly Count:</td>
	  		<td width="200" align="right">'.$row_count['countAll'].'</td>
	  	</tr>
	  	<tr>
	  		<td>Total Paid</td>
	  		<td align="right">&#8369; '.number_format($row_sum["sumAllPay"],2).'</td>
	  	</tr>
	  	<tr>
	  		<td align="right"><b>Ending Balance:</b></td>
	  		<td align="right"><b>&#8369; '.number_format($row2['total_wd_add_pay'],2).'</b></td>
	  	</tr>
</div>
</div>

<div class="form-group">
<table class="table table-bordered"  width="100%" cellspacing="0">
	  <thead>
	  	<tr>
	  		<td style="background-color:#EAECEE;"><b>Note:</b> Please call us in case of any discrepancy. Surcharge of P100 is charged for payment after 1st day of everymonth starting Aug 1. You could also deposit directly to our BPI Account No. 0411-0001-21.</td>
	  	</tr>
	  </thead>
</div>';
?>

























