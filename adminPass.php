<?php
include 'config.php';

$adminPass = $_POST['adminPass'];
//echo $adminPass;

if($adminPass == "PVCS-001" || $adminPass == "PVCS-000"){
	echo "success";
}else{
	echo "failed";
}
?>