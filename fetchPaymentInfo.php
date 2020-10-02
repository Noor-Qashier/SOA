<?php
include 'config.php';
$yrLevel = $_POST['yrLevel'];



$query = "SELECT * FROM payment_information WHERE level = '$yrLevel'";
$result = mysqli_query($mysqli,$query);
$row = mysqli_fetch_assoc($result);

$total = $row["tuition_fees"] + $row["other_school_fees"] + $row["learning_module"];

echo '

<table class="table table-bordered" width="100%" cellspacing="0">
  <thead>
    <tr>
      <td align="center"><b>Tuition Fees </b></td>
      <td align="center"><b>Other School Fees </b></td>
      <td align="center"><b>Learning Module </b></td>
    </tr>
    <tr>
      <td align="right id="tuition">&#8369; '.number_format($row["tuition_fees"],2).'</td>
      <td align="right id="others">&#8369; '.number_format($row["other_school_fees"],2).'</td>
      <td align="right id="l_module">&#8369; '.number_format($row["learning_module"],2).'</td>
    </tr>
    <tr>
    <th colspan="3"></th>
    </tr>
    <tr>
      <td colspan="2" align="right"><b>Total Annual Fee</b></td>
      <td align="right" id="total"><b>&#8369; '.number_format($total,2).'</b></td>
    </tr>
  </thead>
</table>
';
?>
