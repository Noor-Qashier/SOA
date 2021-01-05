<?php
include 'config.php';
$num_rec = $_POST['num_rec'];

$query = "SELECT * FROM monthly_payment_history WHERE num_rec = '$num_rec'";
$result = mysqli_query($mysqli,$query);
$row = mysqli_fetch_assoc($result);

$dueDate = $row["due_on"];
$DUE_ON = date("M d Y", strtotime($dueDate));

$StatementDate = $row["statement_as_of"];
$stateDate = date("M d Y", strtotime($StatementDate));


echo '
<div class="form-group">
<h5 style="text-align:center;background-color:#EAECEE;padding-top:10px;padding-bottom:10px;">STATEMENT OF ACCOUNT<small><p>'.$row['for_the_month'].'</p></small></h5>
</div>

<div class="form-group">
<h5 id="name" style="text-transform: uppercase; font-weight:bold;">'.$row["student_name"].'</h5>
		<h6>SCHOOL ID:'.$row["student_id"].' | Level: '.$row["level"].'</h6>
	 
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
	  		<td width="150" align="right">&#8369; '.number_format($row["past_due_amount"],2).'</td>
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
	  		<td width="150" align="right">&#8369; '.number_format($row["tuition_fee_lmodule"],2).'</td>
	  	</tr>
	  	<tr>
	  		<td>Remediation/Tutorial:</td>
	  		<td width="150" align="right">&#8369; '.number_format($row["tutorial"],2).'</td>
	  	</tr>
	  	<tr>
	  		<td>Surcharge due to Late Payment:</td>
	  		<td width="150" align="right">&#8369; '.number_format($row["surcharge"],2).'</td>
	  	</tr>
	  	<tr>
	  		<td>'.$row["other_description"].'</td>
	  		<td width="150" align="right">&#8369; '.number_format($row["other_amount"],2).'</td>
	  	</tr>
	  	<tr>
	  		<td align="right"><b>Total Current dues:</b></td>
	  		<td width="150" align="right"><b>&#8369; '.number_format($row["total_current_due"],2).'</b></td>
	  	</tr>
</div>

<div class="form-group">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	  <thead>
	  	<tr>
	  		<th width="150">DUE ON:</th>
	  		<td align="right"><b>'.$DUE_ON.'</b></td>
	  		<td width="200" align="right"><b>Total Due:</b></td>
	  		<td width="150" align="right"><b>&#8369; '.number_format($row["total_due"],2).'</b></td>
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
	  		<td width="150" align="right"><b>&#8369; '.number_format($row["amount_paid"],2).'</b></td>
	  	</tr>
	  </thead>
	  <tbody>
	  	<tr>
	  		<td colspan="4" align="right"><b>Balance After Payment:</b></td>
	  		<td width="150" align="right"><b>&#8369; '.number_format($row["balance_after_payment"],2).'</b></td>
	  	</tr>
</div>

<div class="form-group">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	  <thead>
	  	<tr>
	  		<td style="background-color:#EAECEE;"><b>Note:</b> Please call us in case of any discrepancy. Surcharge of P100 is charged for payment after 1st day of everymonth starting Aug 1. You could also deposit directly to our BPI Account No. 0411-0001-21.</td>
	  	</tr>
	  </thead>
</div>';
?>














