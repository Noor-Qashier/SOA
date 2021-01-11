<?php
include 'config.php';
//$bal_after_payment = $_POST['bal_after_payment'];
$student_id = $_POST['student_id'];



$query1 = "SELECT * FROM student_payment_information WHERE student_id = '$student_id'";
$result1 = mysqli_query($mysqli,$query1);
$row1 = mysqli_fetch_assoc($result1);

$payMent = $row1['downPayment']+$row1['payModule'];

$query2 = "SELECT * FROM full_payment WHERE student_id = '$student_id'";
$result2 = mysqli_query($mysqli,$query2);
$row2 = mysqli_fetch_assoc($result2);

$query_history = "SELECT * FROM monthly_payment_history WHERE student_id = '$student_id' ORDER BY statement_as_of DESC";
$result_history = mysqli_query($mysqli,$query_history);
$row_history = mysqli_fetch_assoc($result_history);

$sumAllPay = "SELECT SUM(amount_paid) AS total_paid FROM monthly_payment_history WHERE student_id='$student_id'";
$sum_result = mysqli_query($mysqli,$sumAllPay);
$row_sum = mysqli_fetch_assoc($sum_result);


$name = $row_history['student_name'];
$total_bal = $row1['total_wd_add_pay'];
$date_of_pay = $row_history['for_the_month'];
$amount_of_pay = $row_history['amount_paid'];
$balance_after_payment = $row_history['balance_after_payment'];

$total_paid = $row_sum['total_paid']+$payMent;
//$total_balance = $bal_after_payment+$row1['total_wd_add_pay'];

$dateEntry = $row2["date_of_entry"];
$newDateEntry = date("F d, Y", strtotime($dateEntry));

include 'connect.php';

$query = "SELECT * FROM  monthly_payment_history WHERE student_id = '$student_id' AND amount_paid != 0";

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <h4 style="text-align:center;">FULL PAYMENT INFORMATION<br><small>'.$newDateEntry.'</small></h4>
    <tr>
        <td align="right"><b>Status:</b><span id="addAmount" style="color:red;"></span></td>
        <td style="background-color:#8ef5b2;" align="right" ><b>'.$row1['remark'].'</b></td>
      </tr>
    <tr>
      <th colspan="2">'.$name.' | Grade: '.$row1['level'].'</th>
    </tr>
    <tr>
      <th colspan="2">PAYMENT HISTORY</th>
    </tr>
      <tr>
        <th width="600">Month</th>
        <th >Amount Paid</th>
      </tr>
    </thead>
    <tbody>
';
if($total_row > 0)
{
  foreach ($result as $row) 
  {
    $dateForTheMonth = $row["due_on"];
    $newDateForTheMonth = date("F Y", strtotime($dateForTheMonth));
    $output .= '
      <tr>
        <td>'.$newDateForTheMonth.'</td>
        <td align="right">&#8369; '.number_format($row['amount_paid'],2).'</td>
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
        <td align="right"><b>Down Payment:</b></td>
        <td align="right"><b>&#8369; '.number_format($payMent,2).'</b></td>
      </tr>
      <th colspan="3"></th>
      <tr>
        <td align="right"><b>TOTAL:</b></td>
        <td align="right"><b>&#8369; '.number_format($total_paid,2).'</b></td>
      </tr>
</tbody>
<tfoot>
<tr><th colspan="2"></th></tr>
<tr>


<input type="hidden" id="student_id_paid" value="'.$student_id.'"></td>
</tr>
      <tr>
        <td align="right"><b>Total Annual Balanced:</b></td>
        <td align="right" ><b>&#8369; '.number_format($row2['total_annual_balance'],2).'</b>
      </tr>
<tfoot>
</table>
';

echo $output;
?>
<!--
     <tr>
        <td align="right"><b>Amount:</b><span id="addAmount" style="color:red;"></span></td>
        <td align="right" ><b>&#8369; '.number_format($row2['payment_amount'],2).'</b></td>
      </tr>-->