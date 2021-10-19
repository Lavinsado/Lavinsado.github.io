<?php  
	include "connect.php";
	$isbn = $_POST['isbn'];
	$que = "SELECT download_count FROM buku WHERE no_buku = '$isbn'";
	$select_val = mysqli_query($con,$que);
	$value = mysqli_fetch_assoc($select_val);
	$val = $value['download_count'] + 1;

	$query = "UPDATE buku SET download_count = '$val' WHERE no_buku = '$isbn'";
	$do = mysqli_query($con,$query);
	if ($do) {
		echo 1;
	}
	else{
		echo 0;
	}
?>