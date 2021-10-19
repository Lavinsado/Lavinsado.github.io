<?php
	include "connect.php";
	include "header.php";
	include "navbar.php";
?>


<html>
<head>
	<title></title>
</head>
<style>
	.card-container{
		width: 18.75vw;
		height: 50vh;
		border-radius: 4px;
		margin-right: 5vw;
		perspective: 900px;
		background-color: transparent;
	}
	.card{
		position: relative;
		width: 100%;
		height: 100%;
		transition: all .7s;
		transform-style: preserve-3d;
	}
	#cc1:hover #c1{
		transform: rotateY(-180deg);
	}
	#cc2:hover #c2{
		transform: rotateY(180deg);
	}

	.front{
		background-image: url(https://drive.google.com/uc?export=view&id=11eQoD1NxGAg3dD0tZ3zSPAd_vda4_wWs);
		background-size:cover;
		/*opacity: 0.6;*/
	}
	.rear{
		background:linear-gradient(90deg,#65737e,#a7adba,#c0c5ce);
		transform:rotateY(-180deg);
	}
	.front, .rear{
		position: absolute;
		width: 100%;
		height: 100%;
		padding: 5em 1em 0em 1em ;
		align-items: center;
		justify-content: center;
		color: white;
		border-radius: 4px;
		box-shadow: 0 10px 20px rgba(0,0,0,0.19),
					0 6px 6px rgba(0,0,0,0.23);
		backface-visibility: hidden; 
	}
</style>
<body>
	<div class="container">
		<div class="row">
			<div class="card-container" id="cc1">
				<div class="card" id="c1">
					<div class="front"></div>
					<div class="rear">
						<p><b>Name</b> &nbsp;: Ewaldo Raditya</p>
						<p><b>NRP</b>  &emsp;: c14180239</p>
						<p><b>Role</b></p>
						<ul>
							<li>Front-End Developer</li>
							<li>Back-End Developer</li>
							<li>Database Creator</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="card-container" id="cc2">
				<div class="card" id="c2">
					<div class="front"></div>
					<div class="rear">
						<p><b>Name</b> &nbsp;: Ewaldo Raditya</p>
						<p><b>NRP</b>  &emsp;: c14180239</p>
						<p><b>Role</b></p>
						<ul>
							<li>Front-End Developer</li>
							<li>Back-End Developer</li>
							<li>Database Creator</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>