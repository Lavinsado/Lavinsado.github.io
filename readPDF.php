<?php 
    session_start();
	include "connect.php";
	include "header.php";
    $username = $_SESSION['username'];
    if (!$username) {
        session_destroy();
        echo'<script type="text/javascript">alert("Has not Login Yet !");</script>';
        echo'<script>location.href="login.php"</script>';
    }
    else{
        $id = isset($_GET['id'])?$_GET['id'] : "";
        $query = "SELECT * FROM buku WHERE id =" .$id;
        $result = mysqli_query($con,$query);
        $file = mysqli_fetch_assoc($result);
    }
?>

<html>
<head>
	<style>
		body{
            min-height: 100vh;
            background:radial-gradient(ellipse at bottom, #013155 0%,#01162E 100%);
        }
        .star{
            position: absolute;
            background: white;
            border-radius: 50%;
            animation: move;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }
        .type-1{
            width: 1px;
            height: 1px;
        }
        .type-2{
            width: 2px;
            height: 2px;
        }
        .type-3{
            width: 3px;
            height: 3px;
        }
        @keyframes move{
            0%{transform: translateY(0);}
            100%{transform: translateY(-1000px);}
        }

		embed{
			width: inherit;
            background-color: white;
			height: 90vh;
			z-index: 1;
		}
	</style>
</head>
<body>
	<script>
      function createStars(type,quantity){
        for (let i = 0; i < quantity; i++) {
            var star = document.createElement('div');
            star.classList.add('star',`type-${type}`);
            star.style.left = `${randomNumber(1,99)}%`;
            star.style.bottom = `${randomNumber(1,99)}%`;
            star.style.animationDuration = `${randomNumber(50,200)}s`;
            document.body.appendChild(star);
        }
      }
      function randomNumber(min,max){
        return Math.floor(Math.random() *max)+min;
      } 
      createStars(1,300);
      createStars(2,85);
      createStars(3,75);
  </script>  
	<div class="container" style="padding: 3em;">
		<?php  
			echo '
			<embed src="'.$file['lokasi_buku'].'#toolbar=0&amp;navpanes=0&amp;scrollbar=0" type="'.$file['filetype'].'"> 
			';
		?>
	</div> 
</body>
</html>