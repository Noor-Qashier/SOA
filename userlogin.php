<?php
include 'config.php';
session_start();

$username = $_POST['userName'];
$password = $_POST['userPassword'];
//echo $username;

	if($username == "Student"){

		$searchUser = "SELECT *FROM user WHERE position = 'Student' AND password = '$password'";
		$result = mysqli_query($mysqli,$searchUser);
		$row = mysqli_fetch_assoc($result);

		if(mysqli_num_rows($result)==0){
			echo '<script>alert("Incorrect password!");
			window.location="index.php";
			</script>';
		}else{
			$_SESSION['userName'] = $row['username'];
			echo '<script>
			window.location="Student/home.php?id='.$password.'";
			</script>';
			//echo $row['password'];
		}
			
	}else{
		$searchUser = "SELECT *FROM user WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($mysqli,$searchUser);
		$row = mysqli_fetch_assoc($result);

		if(mysqli_num_rows($result)==0){
			echo '<script>alert("User does not exist!");
			window.location="index.php";
			</script>';
		}else{
			$_SESSION['userName'] = $row['username'];
			echo '<script>
			window.location="home.php?id='.$password.'";
			</script>';
			//echo $row['password'];
		}
	}

?>
