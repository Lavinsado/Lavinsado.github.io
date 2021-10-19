<?php  
	include "connect.php";
	$isbn = $_POST['isbn'];
	$que = "SELECT read_count FROM buku WHERE no_buku = '$isbn'";
	$select_val = mysqli_query($con,$que);
	$value = mysqli_fetch_assoc($select_val);
	$val = $value['read_count'] + 1;

	$query = "UPDATE buku SET read_count = '$val' WHERE no_buku = '$isbn'";
	$do = mysqli_query($con,$query);
	if ($do) {
		echo 1;
	}
	else{
		echo 0;
	}
?>