<?php 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	session_start();
	$_SESSION['active']='Login';
	if(isset($_SESSION['email']))
	{
		session_destroy();
		session_start();
	}
	
	function validate($email, $pwd)
	{
		if(empty(ltrim(rtrim($email))))
		{
			$error="Email is required";
			return $error;
		}
		if(empty(ltrim(rtrim($pwd))))
		{
			$error="Password is required";
			return $error;
		}
		require('C:\xampp\htdocs\Project\DataBase\mydb.php');

		$query="SELECT * FROM USER WHERE email='$email';";
		$result=mysqli_query($connection, $query);
		if($result)
		{
			if(mysqli_num_rows($result)===1)
			{
				while($row=mysqli_fetch_assoc($result))
				{
					//echo print_r($row);
					if($row['password']==$pwd)
					{
						$_SESSION['name']=$row['name'];
						$_SESSION['image']=$row['image'];
						$_SESSION['email']=$row['email'];
						$_SESSION['pwd']=$row['pwd'];
						$_SESSION['user']=$row['id'];
						$_SESSION['ph']=$row['ph_number'];
						//$image= '<img height="30" width="30" src="data:image; base64,'.$row["image"].'" id="myimg">';
						//$source="data:image; base64,". $row['c_image'];
						//$_SESSION['image']=$image;
						header("Location:/../Project/home.php");
					}
					else
					{
						$error="Invalid Password";
						return $error;
					}

				}
			}
			else
			{
				$error="Invalid Email";
				return $error;
			}
		}
		else
		{
			echo "error: ".mysqli_error($connection)."<br>";
		}
	}

	if(isset($_POST['email']))
	{
		
		$error=validate($_POST['email'], $_POST['pwd']);
		$_SESSION['error']=$error;

	}	
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="/../Project/css/mystyle.css">
	<link rel="icon" type="x-icon/image" href="/../Project/images/logo.png">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
        	<?php require('C:\xampp\htdocs\Project\navbar.php');?>
			<div class="col-lg-6 col-11 m-auto mt-2 rounded form">
				<h1 class="text-center m-auto mt-2 mb-lg-4">Login</h1>
				<form action="#" method="POST" class="form-floating m-2">
					<p class="text-danger text-center">
						<?php
							if(isset($error))
							{
								echo $error;
							} 
						?>
					</p>

					<div class="form-floating mb-2">
						<input type="text" name="email" class="form-control" id="email" placeholder>
						<label for="#email" class="form-label">Your Mail</label>
					</div>

					<div class="form-floating mb-2">
						<input type="password" name="pwd" class="form-control" id="pwd" placeholder="">
						<label for="#pwd" class="form-label">Password</label>
						<button type="button" class="btn btn-success mt-3" id="btn">Show Password</button>
					</div>
					<button type="submit" value="submit" class="btn btn-primary form-control my-3">Log In</button>
				</form>
				<div>
					<a href="signup.php" class="m-2 mb-2 text-danger">Signup Here</a>
				</div>
			</div>
			<div class="col-lg-5">
				<img src="/../Project/images/logo2.png" height="350" width="400" class="col-12">
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function() {
		var btn=$("#btn");
		btn.click(function() {
			var pwd=$("#pwd");
			
			if(pwd.attr('type')==='password')
			{
				//console.log(pwd.attr('type'));
				pwd.attr('type', 'text');
				btn.html('Hide Password');
				//console.log(btn.innerText);
			}
			else
			{
				//console.log(pwd.attr('type'));
				pwd.attr('type', 'password');
				btn.html('Show Password');
			}
		});
	});
</script>
</html>