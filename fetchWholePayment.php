<?php
include 'config.php';
$yrLevel = $_POST['yrLevel'];
$student_id = $_POST['id'];



$query = "SELECT * FROM student_payment_information WHERE student_id = '$student_id'";
$result = mysqli_query($mysqli,$query);
$row = mysqli_fetch_assoc($result);

$query_history = "SELECT * FROM student_payment_information WHERE student_id = '$student_id'";
$result_history = mysqli_query($mysqli,$query_history);
$row_history = mysqli_fetch_assoc($result_history);

$total_paid = $row['total'];

echo '

<table class="table table-bordered" width="100%" cellspacing="0">
  <thead>
    <tr>
      <td align="center"><b>Name </b></td>
      <td align="center"><b>Year Level </b></td>
      <td align="center"><b>Date of payment </b></td>
      <td align="center"><b>Amount </b></td>
    </tr>
    <tr>
      <td align="right" id="tuition">&#8369; '.number_format($row["tuition_fees"],2).'</td>
      <td align="right" id="others">&#8369; '.number_format($row["other_school_fees"],2).'</td>
      <td align="right" id="l_module">&#8369; '.number_format($row["learning_module"],2).'</td>
    </tr>
    <tr>
    <th colspan="3"></th>
    </tr>
    <tr>
      <td colspan="2" align="right"><b>Total Annual Fee</b></td>
      <td align="right" id=""><b>&#8369; '.number_format($total,2).'</b></td>
    </tr>
    <input type="text" id="Subtotal" value="'.$total.'" hidden/>
  </thead>
</table>
';
?>
