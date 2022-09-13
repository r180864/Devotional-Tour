	<?php 
session_start();
//echo session_id();
//print_r($_FILES);
$_SESSION['active']='Profile';
if(!isset($_SESSION['email']))
{
	header("Location:Login_Signup/login.php");
}
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$pwd=$_POST['pwd'];
	$ph=$_POST['ph'];
	if(isset($_FILES['image']['tmp_name']))
	{
		//echo "Please Select an Image";
		$image=null;
	}
	else
	{
		$image=addslashes($_FILES['image']['tmp_name']);
		$name=addslashes($_FILES['image']['name']);
		$image=file_get_contents($image);
		$image=base64_encode($image);
		
	}
	update($name, $pwd, $ph, $image);
	
}

function Update($name, $pwd, $ph, $image)
{
	require('DataBase/mydb.php');
	$email=$_SESSION['email'];
	$_SESSION['image']=$image;
	$query="UPDATE USER SET name='$name' WHERE email='$email';";
	$result=mysqli_query($connection, $query);
	$query="UPDATE USER SET password='$pwd' WHERE email='$email';";
	$result=mysqli_query($connection, $query);
	$query="UPDATE USER SET ph_number='$ph' WHERE email='$email';";
	$result=mysqli_query($connection, $query);
	$query="UPDATE USER SET image='$image' WHERE email='$email';";
	$result=mysqli_query($connection, $query);
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
  	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
  	<link rel="icon" type="x-icon/image" href="/../Project/images/logo.png">
	<title>Home</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<?php require('C:\xampp\htdocs\Project\navbar.php');
			?>
			<div class="col-4 mt-4">
				<?php 
					if($_SESSION['imgsrc'])
					{
						$source=$_SESSION['imgsrc'];
					}
					else
					{
						$source='/../Project/images/loginIcon.png';
					}
					echo "<img height='200' width='200' id='myimg' border='5' src='$source'";
				?>
			</div>
			<h1>This is Profile Page</h1>
			<h2>Welcome Mr. <?php echo $_SESSION['name']; ?></h2>
			<table>
				<tr>
					<th>Name: </th>
					<td><?php echo $_SESSION['name']; ?></td>
				</tr>
				<tr>
					<th>Email: </th>
					<td><?php echo $_SESSION['email']; ?></td>
				</tr>
				<tr>
					<td colspan="2"><button id="btn" class="btn btn-warning my-2">Update Profile</button></td>
				</tr>
			</table>
		</div>
		<div class="col-4" id="update">
			<!--<form action="#" method="POST" enctype="multipart/form-data">
				<input type="file" name="image">
				<button type="submit" name="submit">Submit</button>
			</form>-->
			<form onsubmit="return validate()" action="#" method="POST" enctype="multipart/form-data" class="form-floating mx-lg-5">
					<p class="text-danger text-center"><?php
							if(isset($error))
							{
								echo $error;
							} 
						?>
					</p>

					<div class="form-floating mb-2">
						<input type="text" name="name" class="form-control" id="name" value="<?php $_SESSION['user']; ?>" placeholder>
						<span id="mname" class="text-danger"></span>
						<label for="#name" class="form-label">Change Your Name</label>
					</div>

					<div class="form-floating mb-2">
						<input type="password" name="pwd" class="form-control" id="pwd" value="<?php $_SESSION['pwd']; ?>" placeholder="">
						<span id="mpwd" class="text-danger"></span>
						<label for="#pwd" class="form-label">Change Password</label>
					</div>


					<div class="form-floating mb-2">
						<input type="text" name="ph" class="form-control" id="ph" value="<?php $_SESSION['ph']; ?>" placeholder="">
						<span id="mph" class="text-danger"></span>
						<label for="#ph" class="form-label">Change Phone Number</label>
					</div>

					<div class="form-floating mb-2">
						<input type="file" name="image">
					</div>

					<button type="submit" name="submit" value="submit" class="btn btn-success">Update</button>
					<a class="btn btn-danger ms-5" id="cancel">Cancel</a>
				</form>

		</div>
	</div>
</body>
<script src="/../Project/js/validate_update.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#update").hide();

		$("#btn").click(function () {
			$("#btn").hide();
			$("#update").show();

		});

		$("#cancel").click(function() {
			$("#btn").show();
			$("#update").hide();
		});

	});
</script>
</html>