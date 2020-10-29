<?php
include 'config.php';
$yrLevel = $_POST['yrLevel'];
$totalDiscount = $_POST['totalDiscount'];
$h_student = $_POST['h_student'];
$sibling = $_POST['sibling'];



$query = "SELECT * FROM payment_information WHERE level = '$yrLevel'";
$result = mysqli_query($mysqli,$query);
$row = mysqli_fetch_assoc($result);

$tuition = $row["tuition_fees"]; 
$l_module = $row["learning_module"];
$other_school_fees = $row["other_school_fees"];

$Dtuition = $tuition - $totalDiscount;
$discountedTuition = $Dtuition*$h_student;
$finalTuition = $discountedTuition*$sibling;
$totalPayment = $finalTuition + $other_school_fees + $l_module;

//echo $finalTuition;
$h_student_percentage;
$sibling_percentage;
if ($h_student == 0.95){
  $h_student_percentage = "5%";
}else if($h_student == 0.9){
  $h_student_percentage = "10%";
}else{
  $h_student_percentage = "None";
}
if($sibling == 0.95){
  $sibling_percentage = "5%";
}else{
  $sibling_percentage = "None";
}

echo '

<table class="table table-bordered" width="100%" cellspacing="0">
  <thead>
    <tr>
      <td align="center"><b>Honor Student </b></td>
      <td align="center"><b>Sibling </b></td>
      <td align="center"><b>ESC/Voucher </b></td>
    </tr>
    <tr>
      <td align="right" id="tuition"> - '.$h_student_percentage.'</td>
      <td align="right" id="others"> - '.$sibling_percentage.'</td>
      <td align="right" id="l_module"> - &#8369; '.number_format($totalDiscount,2).'</td>
    </tr>
    <tr>
    <th colspan="3"></th>
    </tr>
    <tr>
      <td colspan="2" align="right"><b>Final Annual Fee</b></td>
      <td align="right" id="total"><b>&#8369; '.number_format($totalPayment,2).'</b></td>
    </tr>
  </thead>
</table>
';
?>
