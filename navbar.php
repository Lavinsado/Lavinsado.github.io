<?php
	include "connect.php";
	include "header.php";
?>

<style>
	@import url('https://fonts.googleapis.com/css?family=Raleway&display=swap');
	
	body{
		background-image: url(img/argotower.jpg);
		background-size: 100%;
	}
	.navbar{
		background: transparent;
		text-align:center; 
		position: sticky; 
		top:0;
		z-index: 1;
	}
	#title-navbar{
		overflow: hidden;
		white-space: nowrap;
		color: #118AB2;
		width: auto;
		font-family:"Raleway",serif;
		border-right: 2px solid rgba(0,0,0,.87);
		animation: 	animIntro 2s steps(20,end),
					animBar 1s step-end infinite;
	}
	.fab{
		color: #06D6A0;
	}
	.nav-item{
		text-transform: uppercase;
		text-decoration: none;
		letter-spacing: 0.15em;
		display: inline-block;
		padding-top: 0.625em;
		position: relative;
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

<nav class="navbar navbar-expand-lg fixed-top" style= 'text-align:center; position: sticky; top:0; z-index: 1;'>
	<a class ="navbar-brand" href="home.php">
		<h2 id="title-navbar"><i class="fab fa-affiliatetheme"></i>&nbsp; Web Project</h2>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>
	<div class="collapse navbar-collapse" style="color:#FFFFFF;">
		<ul class="navbar-nav justify-content-end col-lg-12">
			<li class="nav-item">
				<h6><a href="login.php" class="nav-link">Project</a></h6>
			</li>
			<li class="nav-item">
				<h6><a href="aboutme.php" class="nav-link">Creator</a></h6>
			</li>
		</ul>
	</div>
</nav>