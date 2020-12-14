<?php
include 'config.php';
$bal_after_payment = $_POST['bal_after_payment'];
$student_id = $_POST['id'];



$query1 = "SELECT * FROM student_payment_information WHERE student_id = '$student_id'";
$result1 = mysqli_query($mysqli,$query1);
$row1 = mysqli_fetch_assoc($result1);

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

$total_paid = $row_sum['total_paid'];
$total_balance = $bal_after_payment+$row1['total_wd_add_pay'];

include 'connect.php';

$query = "SELECT * FROM  monthly_payment_history WHERE student_id = '$student_id' AND amount_paid != 0";

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
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
        <td align="right"><b>TOTAL:</b></td>
        <td align="right"><b>&#8369; '.number_format($total_paid,2).'</b></td>
      </tr>
</tbody>
<tfoot>
<tr><th colspan="2"></th></tr>
<tr>
<td align="right"><b>Balance as of this month:</b></td>
<td align="right"><b>&#8369; '.number_format($bal_after_payment,2).'</b>
<input type="hidden" id="bal_after_payment" value="'.$bal_after_payment.'">
<input type="hidden" id="student_id_paid" value="'.$student_id.'"></td>
</tr>

      <tr>
        <td align="right"><b>Annual Balanced:</b></td>
        <td align="right" ><b>&#8369; '.number_format($row1['total_wd_add_pay'],2).'</b>
        <input type="hidden" id="annual_balance" value="'.$row1['total_wd_add_pay'].'"></td>
      </tr>
      <tr>
        <td align="right"><b>Total Annual Balanced:</b></td>
        <td align="right" ><b>&#8369; '.number_format($total_balance,2).'</b>
        <input type="hidden" id="total_balance" value="'.$total_balance.'"></td>
      </tr>
      <tr>
        <td align="right"><b>Amount:</b><span id="addAmount" style="color:red;"></span></td>
        <td onclick="addAmount()" id="amount_full_pay" align="right" contentEditable></td>

      </tr>
<tfoot>
</table>
';

echo $output;
?>
