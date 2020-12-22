<?php
include 'config.php';
session_start();

$username = $_POST['userName'];
$password = $_POST['userPassword'];

$searchUser = "SELECT *FROM user WHERE username ='$username' OR password = '$password'";
$result = mysqli_query($mysqli,$searchUser);
$row = mysqli_fetch_assoc($result);


	if($username != $row['username']){
		echo "<script>alert('Incorrect username!');
		window.location='index.php';
	</script>";
	}else{
		if($password != $row['password']){
		echo "<script>alert('Incorrect password!');
		window.location='index.php';
		</script>";
		}else{
		if($row['position'] == "Student"){
			$_SESSION['userName'] = $username;
			echo '<script>alert("Login Successfull");
			window.location="Student/home.php?id='.$password.'";
			</script>';
		}else{
			$_SESSION['userName'] = $username;
			echo '<script>alert("Login Successfull");
			window.location="home.php";
			</script>';
		}
	}
}
	
?>