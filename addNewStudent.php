<?php
include('config.php');
	
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$ylevel = $_POST['ylevel'];

$output ="";
$sql = "INSERT INTO students_list (firstname,lastname,year_level) VALUES ('$fname','$lname','$ylevel')";

	if(mysqli_query($mysqli, $sql))
	{
		$output.= "successfully added";
	}	
	else 
	{
		$output.= mysqli_error($mysqli);
		$output.= "failed";
	}
echo $output;
?>

