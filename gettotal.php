<?php
include 'config.php';
$yrLevel = $_POST['yrLevel'];
$totalDiscount = $_POST['totalDiscount'];
$h_student = $_POST['h_student'];
$sibling = $_POST['sibling'];
$payment = $_POST['payment'];
$downPayment = $_POST['downPayment'];
$payModule = $_POST['payModule'];



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
$subtotalPayment = $tuition_payment + $other_school_fees + $l_module;
$totalClientPay = $downPayment + $payModule;
$totalPayment = $subtotalPayment - $totalClientPay;



//total discount
$sibling_dic = $tuition*$sibling;
$cash_discount = $tuition*$payment;
$honor_discount = $tuition*$h_student;

$honor_dis = $tuition - $honor_discount;
$sibling_discount = $tuition - $sibling_dic;
$payment_discount = $tuition - $cash_discount;

$total_discount = $honor_dis+$sibling_discount+$payment_discount;
$total_fees = $tuition+$other_school_fees+$l_module;

$net_annual_fee = $total_fees-$total_discount-$totalDiscount;

$new_net_amual_fee = $net_annual_fee - $downPayment - $payModule;

$monthly = $new_net_amual_fee/10;

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
      <td align="right" id="h_student_p">'.$h_student_percentage.' ('.$honor_dis.') </td>
      <td align="right" id="sibling_p">'.$sibling_percentage.' ('.$sibling_discount.')</td>
      <td align="right" id="payment_m">'.$payment_percentage.' ('.$payment_discount.')</td>
      <td align="right" id="l_module"> - &#8369; '.number_format($totalDiscount,2).'</td>
    </tr>
    <tr>
    <th colspan="4"></th>
    </tr>
    <tr>
      <td colspan="3" align="right"><b>Net Annual Fee</b></td>
      <td align="right" id="total"><b>&#8369; '.number_format($net_annual_fee,2).'</b></td>
      <input type="text" id="total_value" value="'.$net_annual_fee.'" hidden/>
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
      <td align="right" id="h_student_p">'.$h_student_percentage.' ('.$honor_dis.') </td>
      <td align="right" id="sibling_p">'.$sibling_percentage.' ('.$sibling_discount.')</td>
      <td align="right" id="payment_m">'.$payment_percentage.' ('.$payment_discount.')</td>
      <td align="right" id="l_module"> - &#8369; '.number_format($totalDiscount,2).'</td>
    </tr>
  </thead>
</table>
<table class="table table-bordered" width="100%" cellspacing="0">
  <thead>
    <tr>
      <td align="right" style="background-color:#8FE7FF;"><b>Net Anual Fee</b></td>

      <td align="right" style="background-color:#FDA1AE;"><b>Down Payment Fees</b></td>

      <td align="right"style="background-color:#F4B7B7;"><b>Payment Learning Module </b></td>

      <td align="right"style="background-color:#95FFB4;"><b>Monthly </b></td>
    </tr>
    <tr>
      <td align="right" id="total" style="background-color:#8FE7FF;"><b>&#8369; '.number_format($net_annual_fee,2).'</b></td>
      <input type="text" id="total_value" value="'.$net_annual_fee .'" hidden/>

      <td align="right" id="total" style="background-color:#FDA1AE;"><b>&#8369; '.number_format($downPayment,2).'</b></td>
      <input type="text" id="downPayment" value="'.$downPayment.'" hidden/>

      <td align="right" id="total"style="background-color:#F4B7B7;"><b>&#8369; '.number_format($payModule,2).'</b></td>
      <input type="text" id="payModule" value="'.$payModule.'" hidden/>

      <td align="right" id="monthly"style="background-color:#95FFB4;"><b>&#8369; '.number_format($monthly,2).'</b></td>
      <input type="text" id="monthly" value="'.$monthly.'" hidden/>
    </tr>
    <tr>
    <th colspan="4"></th>
    </tr>

    <tr>
      <td colspan="3" align="right" style="background-color:#FFBC75;"><b>Ending Balance:</b></td>
      <td align="right" id="total" style="background-color:#FFBC75;"><b>&#8369; '.number_format($new_net_amual_fee,2).'</b></td>
      <input type="text" id="new_total_value" value="'.$new_net_amual_fee.'" hidden/>
    </tr>
  </thead>
</table>
';
}
?>