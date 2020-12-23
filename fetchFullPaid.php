<?php
include 'config.php';
//$bal_after_payment = $_POST['bal_after_payment'];
$student_id = $_POST['student_id'];

$query1 = "SELECT * FROM  student_payment_information WHERE student_id = '$student_id' AND remark = 'Full Payment' ";
$result1 = mysqli_query($mysqli,$query1);
$row1 = mysqli_fetch_assoc($result1);

$name = $row1['fname']." ".$row1['lname'];

$dateEntry = $row1["date_of_entry"];
$newDateEntry = date("F d, Y", strtotime($dateEntry));

include 'connect.php';

$query = "SELECT * FROM  student_payment_information WHERE student_id = '$student_id' AND remark = 'Full Payment' ";

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <h4 style="text-align:center;">FULL PAYMENT INFORMATION<br><small>'.$newDateEntry.'</small></h4>
    <th colspan="3">'.$name.' | Grade: '.$row1['level'].'</th>
    <tr>
        <td colspan="2" align="right"><b>Status:</b><span id="addAmount" style="color:red;"></span></td>
        <td style="background-color:#8ef5b2;" align="right" ><b>'.$row1['remark'].'</b></td>
      </tr>
      <tr>
        <td colspan="2" align="right"><b>OR Number:</b><span id="addAmount" style="color:red;"></span></td>
        <td style="background-color:#8ef5b2;" align="right" ><b>'.$row1['or_no'].'</b></td>
      </tr>
    <tr>
      <th colspan="3">TUITION</th>
    </tr>
      <tr>
        <th>Tuition Fee</th>
        <th>Learning Module</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
';
if($total_row > 0)
{
  foreach ($result as $row) 
  {

    $total = $row1['tuition_fees']+$row1['learning_module'];

    $output .= '
      <tr>
        <td align="right">&#8369; '.number_format($row['tuition_fees'],2).'</td>
        <td align="right">&#8369; '.number_format($row['learning_module'],2).'</td>
        <td align="right"><b>&#8369; '.number_format($total,2).'</b></td>
      </tr>
    ';
  }
}
else
{
  $output .='
  <tr>
    <td colspan="3" align="center">Data not found</td>
  </tr>
  ';
}

$output .='
      <tr>
      </tr>
</tbody>
<tfoot>
<tr><th colspan="4"></th></tr>
<tr>
<th colspan="3">PAYMENTS</th>
<input type="hidden" id="student_id_paid" value="'.$student_id.'"></td>
<tr>
  <th colspan="2" >Tuition</th>
  <td align="right">&#8369; '.number_format($row1['amountPay'],2).'</td>
</tr>
<tr>
  <th colspan="2" >Learning Module</th>
  <td align="right">&#8369; '.number_format($row1['payModule'],2).'</td>
</tr>
<tr>
  <th colspan="2" >Total</th>
  <td align="right"><b>&#8369; '.number_format($row1['subtotal'],2).'</b></td>
</tr>
<tr><th colspan="3"></th></tr>
</tr>
      <tr>
        <td colspan="2" align="right"><b>Total Annual Balanced:</b></td>
        <td align="right" ><b>&#8369; '.number_format(0,2).'</b>
      </tr>
<tfoot>
</table>
';

echo $output;
?>
