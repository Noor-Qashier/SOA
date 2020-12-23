<?php
include 'config.php';
$yrLevel = $_POST['yrLevel'];
$class_status = $_POST['class_status'];

if($yrLevel == "Year Level"){
  return;
}else{
    if($class_status == "Regular"){
    $query = "SELECT * FROM payment_information_regular WHERE level = '$yrLevel'";
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
  }else{
    $query = "SELECT * FROM payment_information_odl WHERE level = '$yrLevel'";
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
  }
}
?>
