<?php
include 'config.php';
$UIDdelete = $_POST['UIDdelete'];

$select = "SELECT * FROM student_payment_information WHERE student_id = '$UIDdelete'";
$result = mysqli_query($mysqli,$select);
$row = mysqli_fetch_assoc($result);

$deleteStudent = "DELETE FROM student_payment_information WHERE student_id = '$UIDdelete';";
$deleteUser = "DELETE FROM user WHERE password = '$UIDdelete';";
$deleteClient = "DELETE FROM monthly_payment WHERE student_id = '$UIDdelete';";
$deleteHistory = "DELETE FROM monthly_payment_history WHERE student_id = '$UIDdelete';";
if(mysqli_query($mysqli,$deleteStudent) && mysqli_query($mysqli,$deleteUser) && mysqli_query($mysqli,$deleteClient) && mysqli_query($mysqli,$deleteHistory)){
	echo $row['fname']." ".$row['lname']." has been removed from the Student list!";
}else{
	echo mysqli_error($mysqli);
	echo "failed to delete Student, ".$row['fname']." ".$row['lname'];
}
?>