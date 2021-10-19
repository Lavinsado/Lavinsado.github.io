<?php  
	include "connect.php";
	
	$id_buku = $_POST['id_buku'];
	$id_user = $_POST['id_user'];

	$sql = "DELETE FROM user_favorit WHERE id_buku = '$id_buku' AND id_user = '$id_user'";
	$do = mysqli_query($con,$sql);
	if ($do) {
		echo 1;
	}
	else{
		echo 0;
	}

?>