<?php  
	include "connect.php";
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$check = 0;
	$query = "SELECT * FROM user";
	$res = mysqli_query($con,$query);
	while ($row = mysqli_fetch_assoc($res)) {
		if ($check == 0) {
			if ($row["username"] == $username) {
				$check = 1;
			}
		}
	}
	if($check == 1)
	{
	  echo 0;
	}
	else
	{	
		$get_id = mysqli_query($con,"SELECT MAX(id) AS max_id FROM user");
		$id = mysqli_fetch_array($get_id);
		$new_id = $id["max_id"] + 1;
		$insert = "INSERT INTO user VALUES('$new_id','$username','$password')";
		$a = mysqli_query($con,$insert);
		echo 1;
	}
?>