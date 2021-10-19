<?php  
	include "connect.php";
	include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/login-util.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script>
		$(document).ready(function(){
		    $("#sign_up").click(function(){
		        var username = $("#username").val().trim();
		        var password = $("#password").val().trim();
		        var msg = "";
		        if (username == "" && password == "") {
		        	msg = "Username and password can't be empty";
		            $("#message").html(msg);
		        }
		        else if (username == "") {
		        	msg = "Username can't be empty";
		            $("#message").html(msg);
		        }
		        else if(password == ""){
		        	msg = "Password can't be empty";
		            $("#message").html(msg);
		        }
		        if(username != "" && password != ""){
		            $.ajax({
		                url:'signup2.php',
		                type:'POST',
		                data:{username:username,password:password},
		                success:function(response){
		                    if(response == 1){
		                    		alert("Success !");
		                        	window.location = "login.php";
		                    }
		                    else{
		                        msg = "Username Already Exist !";
		                        $("#username").val("");
		                        $("#password").val("");

		                    }
		                    $("#message").html(msg);
		                }
		            });
		        }
		    });
		    $("#login").click(function(){
				window.location = "login.php";
		    });
		});
	</script>
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form validate-form" style="margin-top: -4em;">
					<div id="message" style="color:red; text-align: center;"></div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required">
						<input class="input100" type="text" name="username" id="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" id="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input type="submit" class="btn btn-success" id="sign_up" value="Sign Up" name="Sign Up" style="margin-right: 1em;"/>
						<input type="submit" class="btn btn-success" id="login"value="Login" name="login"/>
					</div>
				</div>
				<div class="login100-pic js-tilt" style="margin-top: -8em;">
					<img src="img/img-01.png" alt="IMG">
				</div>
			</div>
		</div>
	</div>
</body>
</html>