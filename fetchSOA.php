<?php
include 'config.php';
$student_id = $_POST['student_id'];

$query = "SELECT * FROM monthly_payment WHERE student_id = '$student_id'";
$result = mysqli_query($mysqli,$query);
$row = mysqli_fetch_assoc($result);

$query2 = "SELECT * FROM student_payment_information WHERE student_id = '$student_id'";
$result2 = mysqli_query($mysqli,$query2);
$row2 = mysqli_fetch_assoc($result2);

$dueDate = $row["due_on"];
$DUE_ON = date("M d Y", strtotime($dueDate));

$StatementDate = $row["statement_as_of"];
$stateDate = date("M d Y", strtotime($StatementDate));

$dateForTheMonth = $row["for_the_month"];
$newDateForTheMonth = date("F Y", strtotime($dateForTheMonth));


echo '
<div class="form-group">
<h5 style="text-align:center;background-color:#EAECEE;padding-top:10px;padding-bottom:10px;">STATEMENT OF ACCOUNT<small><p>'.$newDateForTheMonth.'</p></small></h5>
</div>

<div class="form-group">
<h5 id="name" style="text-transform: uppercase; font-weight:bold;">'.$row["student_name"].'</h5>
		<h6>SCHOOL ID:'.$row["student_id"].' | Level: '.$row2["level"].'</h6>
	 
</div>

<div class="form-group">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	  <thead>
	  	<tr>
	  		<td align="right"><b>Statement as of: </b></td>
	  		<td width="150" align="right"><b>'.$stateDate.'</b></td>
	  	</tr>
	  </thead>
</div>

<div class="form-group">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	  <thead>
	  </thead>
	  <tbody>
	  	<tr>
	  		<td>PAST DUE ACCOUNT:</td>
	  		<td width="150" align="right">&#8369; '.$row["past_due_amount"].'</td>
	  	</tr>
</div>
<div class="form-group">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	  <thead>
	  	<tr>
	  		<th colspan="3" >CURRENT DUES:</th>
	  	</tr>
	  </thead>
	  <tbody>
	  	<tr>
	  		<td>Tuition fee:</td>
	  		<td width="150" align="right">&#8369; '.$row["tuition_fee_lmodule"].'</td>
	  	</tr>
	  	<tr>
	  		<td>Remediation/Tutorial:</td>
	  		<td width="150" align="right">&#8369; '.$row["tutorial"].'</td>
	  	</tr>
	  	<tr>
	  		<td>Surcharge due to Late Payment:</td>
	  		<td width="150" align="right">&#8369; '.$row["surcharge"].'</td>
	  	</tr>
	  	<tr>
	  		<td>'.$row["other_description"].'</td>
	  		<td width="150" align="right">&#8369; '.$row["other_amount"].'</td>
	  	</tr>
	  	<tr>
	  		<td align="right"><b>Total Current dues:</b></td>
	  		<td width="150" align="right"><b>&#8369; '.$row["total_current_due"].'</b></td>
	  	</tr>
</div>

<div class="form-group">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	  <thead>
	  	<tr>
	  		<th width="150">DUE ON:</th>
	  		<td align="right"><b>'.$DUE_ON.'</b></td>
	  		<td width="200" align="right"><b>Total Due:</b></td>
	  		<td width="150" align="right"><b>&#8369; '.$row["total_due"].'</b></td>
	  	</tr>
	  </thead>
</div>

<div class="form-group">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	  <thead>
	  	<tr>
	  		<th width="150">PAYMENTS:</th>
	  		<th width="70"> OR #</th>
	  		<td width="195" align="right">'.$row["or_no"].'</td>
	  		<td align="right"><b>Amount Paid:</b></td>
	  		<td width="150" align="right"><b>&#8369; '.$row["amount_paid"].'</b></td>
	  	</tr>
	  </thead>
	  <tbody>
	  	<tr>
	  		<td colspan="4" align="right"><b>Balance After Payment:</b></td>
	  		<td width="150" align="right"><b>&#8369; '.$row["balance_after_payment"].'</b></td>
	  	</tr>
</div>

<div class="form-group">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	  <thead>
	  	<tr>
	  		<td style="background-color:#EAECEE;"><b>Note:</b> Please call us in case of any discrepancy. Surcharge of P100 is charged for payment after 15th of every month starting July 15. You could also deposit directly to our BPI Account No. 2141-8891-28.</td>
	  	</tr>
	  </thead>
</div>';
?>