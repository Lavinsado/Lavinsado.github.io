<?php
    include "/navbar.php";
    include "/header.php";
?>

<html>
<head>
    <title></title>
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
</body>
</html>
