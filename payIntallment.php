<?php
include 'config.php';

$payment = $_POST['payM'];
//echo $payment;
if($payment == "Installment" || $payment == "Partial"){

echo '
<table class="table" width="100%" cellspacing="0">
  <thead>
    <tr>
    <td align=""><label for="Status">OR Number</label>
      <input onclick="ORN()" type="number" class="form-control text-right" value="0" id="or_no" aria-describedby="emailHelp" placeholder="OR Number"></td>
      <td align=""><label for="Status">Down Payment:</label>
    <input onclick="DownP()" type="number" class="form-control text-right" value="0" id="downPayment" aria-describedby="emailHelp" placeholder="Amount"></td>
      <td align=""><label for="Status">Learning Module:</label>
    <input onclick="Lmod()" type="number" class="form-control text-right" value="0" id="payModule" aria-describedby="emailHelp" placeholder="Amount"></td>
    </tr>

   
    <input type="hidden" class="form-control text-right" value="0" id="payModule1" aria-describedby="emailHelp" placeholder="Amount">
  </thead>
</table>
';
}else{
echo '

    <input onclick="amount()" type="hidden" class="form-control text-right" value="0" id="downPayment" aria-describedby="emailHelp" placeholder="Amount">
   
    <input type="hidden" class="form-control text-right" value="0" id="payModule" aria-describedby="emailHelp" placeholder="Amount">
';
}

?>
<script type="text/javascript">
  function ORN(){
    $("#or_no").val("");
  }
  function DownP(){
    $("#downPayment").val("");
  }
  function Lmod(){
    $("#payModule").val("");
  }
</script>