<?php  
	include "connect.php";
	include "header.php";
	$id = $_SESSION['id'];
?>

<style>
	@import url('https://fonts.googleapis.com/css?family=Dosis:300&display=swap');

	.navbar{
		background: transparent;
		text-align:center; 
		position: sticky; 
		top:0;
		z-index: 1;
		overflow: hidden;
	}
	#title-navbar{
		overflow: hidden;
		white-space: nowrap;
		color: #118AB2;
		width: auto;
		font-family:"Dosis",sans-serif;
		border-right: 2px solid rgba(0,0,0,.87);
		animation: 	animIntro 2s steps(20,end),
					animBar 1s step-end infinite;
	}
	h6{
		color: white;
	}
	.fab{
		color: #06D6A0;
	}
	.fas{
		color:white; 
		margin-right:0.2em; 
	}
	.fa-user{
		cursor: pointer;
	}
	.nav-item{
		text-transform: uppercase;
		text-decoration: none;
		letter-spacing: 0.15em;
		display: inline-block;
		padding-top: 0.625em;
		position: relative;
		margin-right: 0.5em;
	}
	.nav-item:after{
		background: none repeat scroll 0 0 transparent;
		bottom: 0; 
		content: "";
		display: block;
		height: 2px;
		left: 50%;
		position: absolute;
		background: #FFF;
		transition: width 0.3s ease 0s, left 0.3s ease 0s;
		width: 0;
	}
	.nav-item:hover:after{
		width: 100%; 
  		left: 0; 
	}
	@keyframes animIntro{
		0%{width: 0;}
		100%{width:200px;}
	}
	@keyframes animBar{
		0%,100% {border-color: rgba(0,0,0,0);}
		50%{border-color: rgba(0,0,0,.87);}
	}
</style> 

<header>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-dark">
	<a class ="navbar-brand" href="main.php">
		<h2 id="title-navbar"><i class="fab fa-affiliatetheme"></i>&nbsp; E-Book Site</h2>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav justify-content-end col-lg-12">
			<li class="nav-item">
				<?php
				if ($username == "admin")
					echo '<h6><i class="fas fa-user nav-link" style="color:white;"></i><b>'.$username.'</b></h6>';
				else
					echo '<h6><a href="user.php?id='.$id.'" class="nav-link" style="color: white;"><i class="fas fa-user"></i><b>'.$username.'</b></a></h6>';
					?>		
			</li>
			<li class="nav-item">
				<?php
				if ($username == "admin")
					 echo'<h6><a href="../logout.php" class="nav-link" style="color: white;"><i class="fas fa-sign-out-alt"></i>Logout</a></h6>';
				else
					echo'<h6><a href="logout.php" class="nav-link" style="color: white;"><i class="fas fa-sign-out-alt"></i>Logout</a></h6>';
				?>
			</li>
		</ul>
	</div>
</nav>
</header>
