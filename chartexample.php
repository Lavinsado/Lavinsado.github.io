<?php  
	include "connect.php";
	header('Content-Type: application/json');
	$query = "SELECT judul_buku,download_count,read_count FROM buku ORDER BY download_count DESC";
	$result = mysqli_query($con,$query);
	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}
	mysqli_close($con);
	echo json_encode($data);
?>