<?php
include 'config.php';
session_start();

$username = $_POST['userName'];
$password = $_POST['userPassword'];

$searchUser = "SELECT *FROM admin WHERE username ='$username' AND password = '$password'";
$result = mysqli_query($mysqli,$searchUser);
$row = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result)==0){
	echo "<script>alert('User account does not exist');
	window.location='index.php';
	</script>";
}else{
	if($username != $row['username']){
		echo "<script>alert('Incorrect username!');;
	</script>";
	}
	if($row['position'] == "Student"){

	}else{
	$_SESSION['userName'] = $username;
	echo '<script>alert("Login Successfull");
	window.location="home.php";
	</script>';
	}
}
?>