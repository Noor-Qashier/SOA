<?php

$date = date('Y');

//January
$getJan = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-01%' ";
$resultJan = mysqli_query($mysqli,$getJan);
$rowJan = mysqli_fetch_assoc($resultJan);

//Febrary
$getFeb = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-02%' ";
$resultFeb = mysqli_query($mysqli,$getFeb);
$rowFeb = mysqli_fetch_assoc($resultFeb);

//March
$getMar = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-03%' ";
$resultMar = mysqli_query($mysqli,$getMar);
$rowMar = mysqli_fetch_assoc($resultMar);

//April
$getApr = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-04%' ";
$resultApr = mysqli_query($mysqli,$getApr);
$rowApr = mysqli_fetch_assoc($resultApr);

//May
$getMay = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-05%' ";
$resultMay = mysqli_query($mysqli,$getMay);
$rowMay = mysqli_fetch_assoc($resultMay);

//June
$getJun = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-06%' ";
$resultJun = mysqli_query($mysqli,$getJun);
$rowJun = mysqli_fetch_assoc($resultJun);

//July
$getJul = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-07%' ";
$resultJul = mysqli_query($mysqli,$getJul);
$rowJul = mysqli_fetch_assoc($resultJul);

//August
$getAug = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-08%' ";
$resultAug = mysqli_query($mysqli,$getAug);
$rowAug = mysqli_fetch_assoc($resultAug);

//September
$getSep = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-09%' ";
$resultSep = mysqli_query($mysqli,$getSep);
$rowSep = mysqli_fetch_assoc($resultSep);

//October
$getOct = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-10%' ";
$resultOct = mysqli_query($mysqli,$getOct);
$rowOct = mysqli_fetch_assoc($resultOct);

//November
$getNov = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-11%' ";
$resultNov = mysqli_query($mysqli,$getNov);
$rowNov = mysqli_fetch_assoc($resultNov);

//December
$getDec = "SELECT SUM(downPayment+amountPay+payModule) AS income FROM student_payment_information WHERE date_of_entry LIKE '%$date-12%' ";
$resultDec = mysqli_query($mysqli,$getDec);
$rowDec = mysqli_fetch_assoc($resultDec);


?>