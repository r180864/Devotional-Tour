<?php 

		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		//echo "Krishna<br>";
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			$email=$_POST['email'];
			$pwd=$_POST['pwd'];

			require("/var/www/html/Project/DataBase/mydb.php");

			$query="SELECT * FROM CUSTOMER WHERE c_email='$email';";
			$result=mysqli_query($connection, $query);
			if(mysqli_num_rows($result))
			{
				while($row=mysqli_fetch_assoc($result))
				{
					if($pwd==$row['c_password'])
					{
						echo "Password Matched<br>";
						$proceed=true;
					}
					else
					{
						$messege="Password not Matched";
						echo "Not Matched<br>";
					}
				}
			}
			else
			{
				$messege="Please Sign-In First";
				echo "<h1>Please Sign-In First</h1>";
			}
			//echo "error: ".mysqli_error($connection)."<br>";
		}
		echo "NOOOOOOOOOOOOOOOOOOOOOO";
		
	?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<title>Validating</title>
</head>
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-lg-7 col-sm-12 bg-secondary m-auto p-5">
				<h1>Enter the details</h1>
				<form onsubmit="return validate_email()" action="success.php" method="POST" class="form-floating mx-5 my-5">
					<h3><?php
							if(isset($messege))
							{
								echo $messege;
							} 
						?>
					</h3>
					<div class="form-floating mb-2">
						<input type="text" name="Name" class="form-control" id="name" placeholder>
						<span id="mname"></span>
						<label for="#name" class="form-label">Your Name</label>
					</div>

					<div class="form-floating mb-2">
						<input type="text" name="email" class="form-control" id="email" placeholder>
						<label for="#email" class="form-label">Your Mail</label>
					</div>
					<div class="form-floating mb-2">
						<input type="text" name="pwd" class="form-control" id="pwd" placeholder="">
						<span></span>
						<label for="#pwd" class="form-label">Password</label>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>