<?php

$date = date('Y');

//January
$getJan = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-01%' ";
$resultJan = mysqli_query($mysqli,$getJan);
$rowJan = mysqli_fetch_assoc($resultJan);

		$getJan_M = "SELECT SUM(amount_paid) AS monthly FROM monthly_payment_history WHERE for_the_month LIKE '%$date-01%' ";
		$resultJan_M = mysqli_query($mysqli,$getJan_M);
		$rowJan_M = mysqli_fetch_assoc($resultJan_M);

		$totalJan = $rowJan['income']+$rowJan_M['monthly'];

//Febrary
$getFeb = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-02%' ";
$resultFeb = mysqli_query($mysqli,$getFeb);
$rowFeb = mysqli_fetch_assoc($resultFeb);

		$getFeb_M = "SELECT SUM(amount_paid) AS monthly FROM monthly_payment_history WHERE for_the_month LIKE '%$date-02%' ";
		$resultFeb_M = mysqli_query($mysqli,$getFeb_M);
		$rowFeb_M = mysqli_fetch_assoc($resultFeb_M);

		$totalFeb = $rowFeb['income']+$rowFeb_M['monthly'];

//March
$getMar = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-03%' ";
$resultMar = mysqli_query($mysqli,$getMar);
$rowMar = mysqli_fetch_assoc($resultMar);

		$getMar_M = "SELECT SUM(amount_paid) AS monthly FROM monthly_payment_history WHERE for_the_month LIKE '%$date-03%' ";
		$resultMar_M = mysqli_query($mysqli,$getMar_M);
		$rowMar_M = mysqli_fetch_assoc($resultMar_M);

		$totalMar = $rowMar['income']+$rowMar_M['monthly'];

//April
$getApr = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-04%' ";
$resultApr = mysqli_query($mysqli,$getApr);
$rowApr = mysqli_fetch_assoc($resultApr);

		$getApr_M = "SELECT SUM(amount_paid) AS monthly FROM monthly_payment_history WHERE for_the_month LIKE '%$date-04%' ";
		$resultApr_M = mysqli_query($mysqli,$getApr_M);
		$rowApr_M = mysqli_fetch_assoc($resultApr_M);

		$totalApr = $rowApr['income']+$rowApr_M['monthly'];

//May
$getMay = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-05%' ";
$resultMay = mysqli_query($mysqli,$getMay);
$rowMay = mysqli_fetch_assoc($resultMay);

		$getMay_M = "SELECT SUM(amount_paid) AS monthly FROM monthly_payment_history WHERE for_the_month LIKE '%$date-05%' ";
		$resultMay_M = mysqli_query($mysqli,$getMay_M);
		$rowMay_M = mysqli_fetch_assoc($resultMay_M);

		$totalMay = $rowMay['income']+$rowMay_M['monthly'];

//June
$getJun = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-06%' ";
$resultJun = mysqli_query($mysqli,$getJun);
$rowJun = mysqli_fetch_assoc($resultJun);

		$getJun_M = "SELECT SUM(amount_paid) AS monthly FROM monthly_payment_history WHERE for_the_month LIKE '%$date-06%' ";
		$resultJun_M = mysqli_query($mysqli,$getJun_M);
		$rowJun_M = mysqli_fetch_assoc($resultJun_M);

		$totalJun = $rowJun['income']+$rowJun_M['monthly'];

//July
$getJul = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-07%' ";
$resultJul = mysqli_query($mysqli,$getJul);
$rowJul = mysqli_fetch_assoc($resultJul);

		$getJul_M = "SELECT SUM(amount_paid) AS monthly FROM monthly_payment_history WHERE for_the_month LIKE '%$date-07%' ";
		$resultJul_M = mysqli_query($mysqli,$getJul_M);
		$rowJul_M = mysqli_fetch_assoc($resultJul_M);

		$totalJul = $rowJul['income']+$rowJul_M['monthly'];

//August
$getAug = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-08%' ";
$resultAug = mysqli_query($mysqli,$getAug);
$rowAug = mysqli_fetch_assoc($resultAug);

		$getAug_M = "SELECT SUM(amount_paid) AS monthly FROM monthly_payment_history WHERE for_the_month LIKE '%$date-08%' ";
		$resultAug_M = mysqli_query($mysqli,$getAug_M);
		$rowAug_M = mysqli_fetch_assoc($resultAug_M);

		$totalAug = $rowAug['income']+$rowAug_M['monthly'];

//September
$getSep = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-09%' ";
$resultSep = mysqli_query($mysqli,$getSep);
$rowSep = mysqli_fetch_assoc($resultSep);

		$getSep_M = "SELECT SUM(amount_paid) AS monthly FROM monthly_payment_history WHERE for_the_month LIKE '%$date-09%' ";
		$resultSep_M = mysqli_query($mysqli,$getSep_M);
		$rowSep_M = mysqli_fetch_assoc($resultSep_M);

		$totalSep = $rowSep['income']+$rowSep_M['monthly'];

//October
$getOct = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-10%' ";
$resultOct = mysqli_query($mysqli,$getOct);
$rowOct = mysqli_fetch_assoc($resultOct);

		$getOct_M = "SELECT SUM(amount_paid) AS monthly FROM monthly_payment_history WHERE for_the_month LIKE '%$date-10%' ";
		$resultOct_M = mysqli_query($mysqli,$getOct_M);
		$rowOct_M = mysqli_fetch_assoc($resultOct_M);

		$totalOct = $rowOct['income']+$rowOct_M['monthly'];

//November
$getNov = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-11%' ";
$resultNov = mysqli_query($mysqli,$getNov);
$rowNov = mysqli_fetch_assoc($resultNov);

		$getNov_M = "SELECT SUM(amount_paid) AS monthly FROM monthly_payment_history WHERE for_the_month LIKE '%$date-11%' ";
		$resultNov_M = mysqli_query($mysqli,$getNov_M);
		$rowNov_M = mysqli_fetch_assoc($resultNov_M);

		$totalNov = $rowNov['income']+$rowNov_M['monthly'];

//December
$getDec = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-12%' ";
$resultDec = mysqli_query($mysqli,$getDec);
$rowDec = mysqli_fetch_assoc($resultDec);

		$getDec_M = "SELECT SUM(amount_paid) AS monthly FROM monthly_payment_history WHERE for_the_month LIKE '%$date-12%' ";
		$resultDec_M = mysqli_query($mysqli,$getDec_M);
		$rowDec_M = mysqli_fetch_assoc($resultDec_M);

		$totalDec = $rowDec['income']+$rowDec_M['monthly'];


?>