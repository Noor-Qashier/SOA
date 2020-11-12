<?php
include 'config.php';
$yrLevel = $_POST['yrLevel'];
$totalDiscount = $_POST['totalDiscount'];
$h_student = $_POST['h_student'];
$sibling = $_POST['sibling'];
$payment = $_POST['payment'];
$downPayment = $_POST['downPayment'];



$query = "SELECT * FROM payment_information WHERE level = '$yrLevel'";
$result = mysqli_query($mysqli,$query);
$row = mysqli_fetch_assoc($result);

$tuition = $row["tuition_fees"]; 
$l_module = $row["learning_module"];
$other_school_fees = $row["other_school_fees"];

$Dtuition = $tuition - $totalDiscount;
$discountedTuition = $Dtuition*$h_student;
$finalTuition = $discountedTuition*$sibling;
$tuition_payment = $finalTuition*$payment;
$subtotalPayment = $tuition_payment + $other_school_fees;
$totalPayment = $subtotalPayment - $downPayment;

$monthly = $totalPayment/10;

//echo $finalTuition;
$h_student_percentage;
$sibling_percentage;
$payment_percentage;
if ($h_student == 0.95){
  $h_student_percentage = "Silver - 5%";
}else if($h_student == 0.9){
  $h_student_percentage = "Gold - 10%";
}else{
  $h_student_percentage = "None";
}
if($sibling == 0.95){
  $sibling_percentage = "Yes - 5%";
}else{
  $sibling_percentage = "None";
}
if($payment == 0.95){
  $payment_percentage = "Cash - 5%";
echo '
<table class="table table-bordered" width="100%" cellspacing="0">
  <thead>
    <tr>
      <td align="center"><b>Honor Student </b></td>
      <td align="center"><b>Sibling </b></td>
      <td align="center"><b>Payment Method </b></td>
      <td align="center"><b>ESC/Voucher </b></td>
    </tr>
    <tr>
      <td align="right" id="h_student_p">'.$h_student_percentage.'</td>
      <td align="right" id="sibling_p">'.$sibling_percentage.'</td>
      <td align="right" id="payment_m">'.$payment_percentage.'</td>
      <td align="right" id="l_module"> - &#8369; '.number_format($totalDiscount,2).'</td>
    </tr>
    <tr>
    <th colspan="4"></th>
    </tr>
    <tr>
      <td colspan="3" align="right"><b>Final Annual Fee</b></td>
      <td align="right" id="total"><b>&#8369; '.number_format($totalPayment,2).'</b></td>
      <input type="text" id="total_value" value="'.$totalPayment.'" hidden/>
    </tr>
  </thead>
</table>
';
}else{
  $payment_percentage = "Installment";
echo '
<table class="table table-bordered" width="100%" cellspacing="0">
  <thead>
    <tr>
      <td align="center"><b>Honor Student </b></td>
      <td align="center"><b>Sibling </b></td>
      <td align="center"><b>Payment Method </b></td>
      <td align="center"><b>ESC/Voucher </b></td>
    </tr>
    <tr>
      <td align="center" id="h_student_p">'.$h_student_percentage.'</td>
      <td align="center" id="sibling_p">'.$sibling_percentage.'</td>
      <td align="center" id="payment_m">'.$payment_percentage.'</td>
      <td align="center" id="l_module"> - &#8369; '.number_format($totalDiscount,2).'</td>
    </tr>
    <tr>
    <th colspan="4"></th>
    </tr>
    <tr>
      <td colspan="3" align="right"><b>Total Anual Fee:</b></td>
      <td align="right" id="total"><b>&#8369; '.number_format($subtotalPayment,2).'</b></td>
      <input type="text" id="total_value" value="'.$totalPayment.'" hidden/>
    </tr>

    <tr>
      <td colspan="3" align="right"><b>Down Payment:</b></td>
      <td align="right" id="total"><b>&#8369; '.number_format($downPayment,2).'</b></td>
      <input type="text" id="downPayment" value="'.$downPayment.'" hidden/>
    </tr>

    <tr>
      <td colspan="3" align="right"><b>monthly:</b></td>
      <td align="right" id="monthly"><b>&#8369; '.number_format($monthly,2).'</b></td>
      <input type="text" id="monthly" value="'.$monthly.'" hidden/>
    </tr>

    <tr>
      <td colspan="3" align="right"><b>Ending Balance:</b></td>
      <td align="right" id="total"><b>&#8369; '.number_format($totalPayment,2).'</b></td>
      <input type="text" id="total_value" value="'.$totalPayment.'" hidden/>
    </tr>
  </thead>
</table>
';
}
?>