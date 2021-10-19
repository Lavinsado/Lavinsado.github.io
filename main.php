<?php 
	session_start();
	include "connect.php";
	include "header.php";
	$username = $_SESSION['username'];
	$id = $_SESSION['id'];
	if (!$username) {
		session_destroy();
		echo'<script type="text/javascript">alert("Has not Login Yet !");</script>';
		echo'<script>location.href="login.php"</script>';
	}
	else{
		include "navbarmain.php";
		$query = "SELECT * FROM buku";
		$select_buku = mysqli_query($con,$query);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.book-list{
			margin: 0 3em 0 3em;
			padding: 20px 15px 20px 15px;
			position: relative;
			display: block;
		}
		table {
			width: 100%; 
			height: 100%;
		}
		h3{
			display: inline-block;
			padding-top: 0.625em;
			position: relative;
			margin-right: 0.5em;
		}
		tbody{
			border: 1px;
			border-style: none;
			border-bottom-style: inset; 
		}

		body {
		    padding: 0;
		    margin: 0;
		    height: 100vh;
		    width: 100%;
		    background-color: #000000;
		}

		form{	
			display: inline-block;
			margin :5vh 0 2vh 0;
		    position: relative;
		    left: 50%;
		    transform: translate(-50%,-50%);
		    transition: all 1s;
		    width: 50px;
		    height: 50px;
		    background: black;
		    box-sizing: border-box;
		    border-radius: 25px;
		    border: 4px solid white;
		    padding: 5px;
		}

		input{
		    position: absolute;
		    top: 0;
		    left: 0;
		    width: 100%;
		    height: 42.5px;
		    line-height: 30px;
		    outline: 0;
		    border: 0;
		    display: none;
		    font-size: 1em;
		    border-radius: 20px;
		    padding: 0 20px;
		}

		.fa{
		    box-sizing: border-box;
		    padding: 10px;
		    width: 42.5px;
		    height: 42.5px;
		    position: absolute;
		    top: 0;
		    right: 0;
		    border-radius: 50%;
		    color: #FFFFFF;
		    text-align: center;
		    font-size: 1.2em;
		    transition: all 1s;
		}

		form:hover{
		    width: 200px;
		    cursor: pointer;
		}

		form:hover input{
		    display: block;
		    background: #000000;
		    color: white;
		}

		form:hover .fa{
		    background: #000000;
		    color: white;
		}

	</style>
</head>
<body>
	<?php  
		$count = 0;
		while ($printBook = mysqli_fetch_assoc($select_buku)) {
			if ($printBook['id']) {
				$id[$count] = $printBook['id'];
				$judul_buku[$count] = $printBook['judul_buku'];
				$publisher[$count] = $printBook['publisher'];
				$author[$count] = $printBook['author'];
				$yearDate[$count] = $printBook['tahun_terbit'];
				$isbn[$count] = $printBook['no_buku'];
				$link[$count] = $printBook['lokasi_buku'];
 				$count++;
			}
		}
	?>

	 <?php 
	 	// Already Done 
	 	include "chart.php"; 
	 ?>

	<form class = "searchPart">
	  <input type="search" id="searchBar" onkeyup="searchFunction()">
	  <i class="fa fa-search"></i>
	</form>
	 <div class="book-list">
		<table id="book-table">
			<?php  
				for ($index=0; $index < $count ; $index++) { 
					echo'
						<tbody>
							<td style="vertical-align: top;">
								<h3 style="color:blue; cursor:default;">
									'.$judul_buku[$index].'
								</h3>
								<div title="publisher" class="publisher">'.$publisher[$index].'</div>
								<div class="author">'.$author[$index].'
								</div>
							</td>
							<td style="float: right; position:relative; padding-top:1em;">
                                <div class="tags-container">
                                <div class="bookDetailsBox" dir="rtl" >
	                				<div class="bookProperty property_year">
	                    				<span>Year:</span>
	                    				'.$yearDate[$index].'
	                				</div>
					                <div class="bookProperty property_isbn" dir="rtl" >
					                    <span id="isbn-'.$index.'">Book Id:</span>
					                    '.$isbn[$index].'
					                </div>
					           	</div>
					             	<a target = "_blank" href="'.$link[$index].'" download="'.$judul_buku[$index].'"><button type="button" id ="btn-download-'.$index.'" onclick=" updateDownload('.$isbn[$index].')"class="btn btn-outline-success" ><i class="fas fa-download" style="color:gray;"></i>Download</button></a>
					             	<a target = "_blank" href="readPDF.php?id='.$id[$index].'" onclick=" updateRead('.$isbn[$index].')"><button type="button" id ="btn-read-'.$index.'" class="btn btn-outline-primary"><i class="fas fa-book-open" style="color:gray;"></i>Read</button></a>
					             	<button type="button" class="btn btn-outline-danger" onclick="addFavorite('.$id[$index].','.$_SESSION['id'].')"><i class="fas fa-heart" style="color:red;"></i>Favorite</button>
				            	</div>
                    		</td>
						</tbody>
					';
				}
			?>
		</table>
	 </div>
</body>
</html>

<script>

	function searchFunction(){
		var filter, table, tr, td,td1, title,author,i;
		filter = $("#searchBar").val().toUpperCase();
		table = document.getElementById("book-table");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) {
	    	td = tr[i].getElementsByTagName("td")[0].getElementsByTagName("h3")[0]; // Extract tagName "h3" data
	    	td1 = tr[i].getElementsByTagName("td")[0].getElementsByTagName("div")[1];
	    	if (td) {
		      title = td.innerHTML; // Extract h3 innerHTML (Book Title in this case)
		      author = td1.innerHTML;
		      	if (title.toUpperCase().indexOf(filter) > -1 || author.toUpperCase().indexOf(filter) >-1) 
		        	tr[i].style.display = "";
		    	else
		        	tr[i].style.display = "none";
		   }       
	  	}
	}

	function updateDownload(data){
		$.ajax({
			url:'downloadcount.php',
			type:'POST',
			data:{
				isbn:data
			},
			success:function(response){
				if (response == 1){
					alert("Download Count+=1");
				}
				else
					alert("Download Count blm bertambah");
			}
		});
	}

	function updateRead(data){
		$.ajax({
			url:'readcount.php',
			type:'POST',
			data:{
				isbn:data
			},
			success:function(response){
				if (response == 1){
					alert("Read Count+=1");
				}
				else
					alert("Read Count blm bertambah");
			}
		});
	}

	function addFavorite(id_buku,id_user){
		$.ajax({
			url:'addFavBook.php',
			type:'POST',
			data:{
				id_buku:id_buku,
				id_user:id_user
			},
			success:function(response){
				if (response == 2){
					alert("Add to List Favorite Book(s)");
				}
				else if(response == 1){
					alert("Can't Add Book into List Favorite");
				}
				else{
					alert("Already on List Favorite");
				}
			}
		});
	}
</script>