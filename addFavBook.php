<?php  
	include "connect.php";
	
	$id_buku = $_POST['id_buku'];
	$id_user = $_POST['id_user'];

	$checking = mysqli_query($con,"SELECT * FROM user_favorit WHERE id_user = '$id_user'");
	$exist = false;

	$get_id = mysqli_query($con,"SELECT MAX(id) AS max_id FROM user_favorit");
	$id = mysqli_fetch_array($get_id);
	$new_id = $id["max_id"]+1;

	while ($check_id = mysqli_fetch_assoc($checking)) {
		if ($check_id['id_buku'] == $id_buku) {
			$exist = true;
			break;
		}
	}

	if (!$exist) {
		$sql = "INSERT INTO user_favorit VALUES ('$new_id','$id_user','$id_buku')";
		$do = mysqli_query($con,$sql);
		if ($do) {
			echo 2;
		}
		else{
			echo 1;
		}
	}
	else{
		echo 0;
	}
	
?>