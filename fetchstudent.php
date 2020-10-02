<?php
include 'config.php';
$student_id = $_POST['student_id'];

$query = "SELECT * FROM students_list WHERE student_id = '$student_id'";
$result = mysqli_query($mysqli,$query);
$row = mysqli_fetch_assoc($result);

$dueDate = $row["due_on"];
$DUE_ON = date("M d Y", strtotime($dueDate));

$StatementDate = $row["statement_as_of"];
$stateDate = date("M d Y", strtotime($StatementDate));


echo '
<div class="form-group">
<h5 style="text-align:center;background-color:#EAECEE;padding-top:10px;padding-bottom:10px;">STATEMENT OF ACCOUNT</h5>
</div>

<div class="form-group">
<h5 id="name" style="text-transform: uppercase; font-weight:bold;">'.$row["firstname"]." ".$row["lastname"].'</h5>
		<h6>SCHOOL ID: PVCS20-'.$row["student_id"].' | Level: '.$row["year_level"].'</h6>
	 
</div>

<div class="form-group">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	  <thead>
	  	<tr>
	  		<td align="right"><b>Statement As Of: </b></td>
	  		<td width="150" align="right"><b>'.$stateDate.'</b></td>
	  	</tr>
	  </thead>
</div>

<div class="form-group">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	  <thead>
	  	<tr>
	  		<th colspan="3" >PAST DUES:</th>
	  	</tr>
	  </thead>
	  <tbody>
	  	<tr>
	  		<td>Turition fee:</td>
	  		<td width="150" align="right">&#8369; '.$row["tuition_fee_pd"].'</td>
	  	</tr>
	  	<tr>
	  		<td>Books:</td>
	  		<td width="150" align="right">&#8369; '.$row["books_pd"].'</td>
	  	</tr>
	  	<tr>
	  		<td>Others:</td>
	  		<td width="150" align="right">&#8369; '.$row["others_pd"].'</td>
	  	</tr>
	  	<tr>
	  		<td align="right"><b>Total Past dues:</b></td>
	  		<td width="150" align="right"><b>&#8369; '.$row["total_past_dues"].'</b></td>
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
	  		<td>Turition fee:</td>
	  		<td width="150" align="right">&#8369; '.$row["tuition_fee_cd"].'</td>
	  	</tr>
	  	<tr>
	  		<td>Books:</td>
	  		<td width="150" align="right">&#8369; '.$row["books_cd"].'</td>
	  	</tr>
	  	<tr>
	  		<td>Remediation/Tutorial:</td>
	  		<td width="150" align="right">&#8369; '.$row["tutorial_cd"].'</td>
	  	</tr>
	  	<tr>
	  		<td>Surcharge due to Late Payment:</td>
	  		<td width="150" align="right">&#8369; '.$row["surcharge_due_to_late_payment_cd"].'</td>
	  	</tr>
	  	<tr>
	  		<td>Others:</td>
	  		<td width="150" align="right">&#8369; '.$row["others_cd"].'</td>
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
	  		<td width="195" align="right">'.$row["or_number"].'</td>
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














