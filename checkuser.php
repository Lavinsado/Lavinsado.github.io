<?php  
	include "connect.php";
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$sql = 'SELECT * FROM user WHERE username="'.$username.'" AND password ="'.$password.'";';
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);

	if($row > 0 && $username == "admin")
	{
		session_start();
		$_SESSION['username'] = $row['username'];
		$_SESSION['id'] = $row['id'];
		echo 1;
	}
	elseif($row > 0)
	{
		session_start();
		$_SESSION['username'] = $row['username'];
		$_SESSION['id'] = $row['id'];
		echo 1;
	}
	else{
		echo 0;
	}
?>