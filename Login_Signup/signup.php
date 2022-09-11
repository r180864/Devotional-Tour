<?php 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	session_start();

	function validate($name, $email, $pwd, $ph)
	{
		$a=10;
		echo "Validation";
		require('C:\xampp\htdocs\Project\DataBase\mydb.php');

		$query="SELECT * FROM USER WHERE email='$email';";
		$result=mysqli_query($connection, $query);
		if($result)
		{
			echo "Query Success";
			if(mysqli_num_rows($result)===1)
			{
				$error="This Email id already exists";
				return $error;
			}

			$query="INSERT INTO USER(name, email, password, ph_number) VALUES('$name', '$email', '$pwd', '$ph');";
			$result=mysqli_query($connection, $query);
			if($result)
			{
				echo "Query Success";
				$_SESSION['name']=$name;
				$_SESSION['email']=$email;
				$_SESSION['pwd']=$pwd;
				$_SESSION['ph']=$ph;


				$query="SELECT * FROM USER WHERE email='$email';";
				$result=mysqli_query($connection, $query);
				if(mysqli_num_rows($result)===1)
				{
					while($row=mysqli_fetch_assoc($result))
					{
						//echo print_r($row);
						$_SESSION['user']=$row['id'];
						if($row['password']==$pwd)
						{
					header("Location:/../Project/home.php");
						}
					}
				}
				else
				{
					echo "error: ".mysqli_error($connection)."<br>";
				}
			}
		}
		else
		{
			echo "error: ".mysqli_error($connection)."<br>";
		}
	}

	if(isset($_POST['email']))
	{
		echo "POST SET";
		
		
		$error=validate($_POST['name'], $_POST['email'], $_POST['pwd'], $_POST['ph']);
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
  	<link rel="icon" type="x-icon/image" href="/../Project/images/logo.png">
	<title>Signup</title>
</head>
<body>
	<h1 class="text-center m-lg-auto mt-sm-10">Enter the details</h1>
	<div class="container mt-lg-2">
		<div class="row">
			<div class="col-lg-7 col-sm-12 bg-warning m-auto p-5">
				<form onsubmit="return validate()" action="#" method="POST" class="form-floating mx-lg-5">
					<p class="text-danger text-center"><?php
							if(isset($error))
							{
								echo $error;
							} 
						?>
					</p>

					<div class="form-floating mb-2">
						<input type="text" name="name" class="form-control" id="name" placeholder>
						<span id="mname" class="text-danger"></span>
						<label for="#name" class="form-label">Your Name</label>
					</div>

					<div class="form-floating mb-2">
						<input type="text" name="email" class="form-control" id="email" placeholder>
						<span id="memail" class="text-danger"></span>
						<label for="#email" class="form-label">Your Mail</label>
					</div>

					<div class="form-floating mb-2">
						<input type="password" name="pwd" class="form-control" id="pwd" placeholder="">
						<span id="mpwd" class="text-danger"></span>
						<label for="#pwd" class="form-label">Password</label>
					</div>

					<div class="form-floating mb-2">
						<input type="password" name="cpwd" class="form-control" id="cpwd" placeholder="">
						<span id="mcpwd" class="text-danger"></span>
						<label for="#cpwd" class="form-label">Confirm Password</label>
					</div>

					<div class="form-floating mb-2">
						<input type="text" name="ph" class="form-control" id="ph" placeholder="">
						<span id="mph" class="text-danger"></span>
						<label for="#ph" class="form-label">Phone Number</label>
					</div>

					<button type="submit" value="submit" class="btn btn-dark">Sign Up</button>
				</form>
				<div>
						<a href="login.php">Login Here</a>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	function validate()
	{
		let name=document.getElementById('name');
		let email=document.getElementById('email');
		let pwd=document.getElementById('pwd');
		let cpwd=document.getElementById('cpwd');

		let value1=name.value.trim();
		let value2=email.value.trim();
		let value3=pwd.value.trim();
		let value4=cpwd.value.trim();

		let mname=document.getElementById('mname');
		let memail=document.getElementById('memail');
		let mpwd=document.getElementById('mpwd');
		let mcpwd=document.getElementById('mcpwd');

		mname.innerText='';
		memail.innerText='';
		mpwd.innerText='';
		mcpwd.innerText='';

		if(v1(value1))
		{
			if(v2(value2))
			{
				if(v3(value3, value4))
				{
					return true;
				}
			}
		}
		return false;
	}


	let v1=function validate1(value)
	{
		
		let length=value.length;

		if(length<3)
		{
			mname.innerText='* Enter atlease 3 characters';
			return false;
		}
		if(!value.match(/^([a-zA-Z]+\s*)+$/))
		{
			mname.innerText='* Enter Alphabets only';
			return false;
		}
		return true;
	}

	let v2=function validate2(value)
	{
		
		//let value=email.value.trim();
		if(!value.match(/^([a-zA-Z]+[0-9_\.-]*)+@([a-zA-Z]+[\._-]*)+\.[a-zA-Z]+$/))
		{
			memail.innerText='* Email format is not valid';
			return false;
		}
		return true;
	}

	let v3=function validate3(value, pvalue)
	{
		let length=value.length;

		if(length<8)
		{
			mpwd.innerText='* Password must contain 8 characters';
			return false;
		}
		if(!value.match(/[A-Z]/))
		{
			mpwd.innerText='* Password should contain 1 Capital Letter';
			return false;
		}
		if(!value.match(/[a-z]/))
		{
			mpwd.innerText='* Password should contain 1 Small letetr';
			return false;
		}
		if(!value.match(/[!@#$%^&*]/))
		{
			mpwd.innerText='* Password should contain 1 special character[!@#$%^&*]';
			return false;
		}
		if(!value.match(/\d/))
		{
			mpwd.innerText='* Password should contain atleast one digit';
			return false;
		}
		return v4(value, pvalue);
	
	}

	let v4=function validate4(value, pvalue)
	{
		
		//let value=cpwd.value.trim();
		//console.log(value)

		if(value!==pvalue)
		{
			mcpwd.innerText='* Password not matched';
			return false;
		}
		return true;
	}
</script>
</html>
