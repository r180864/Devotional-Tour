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
	if(getimagesize($_FILES['image']['tmp_name'])== FALSE)
	{
		echo "Please Select an Image";
	}
	else
	{
		$image=addslashes($_FILES['image']['tmp_name']);
		$name=addslashes($_FILES['image']['name']);
		$image=file_get_contents($image);
		$image=base64_encode($image);
		saveImage($image);
	}
	
}

function saveImage($image)
{
	require('DataBase/mydb.php');
	$email=$_SESSION['email'];
	$_SESSION['image']=$image;
	$query="UPDATE USER SET image='$image' WHERE email='$email';";
	$result=mysqli_query($connection, $query);
	if($result)
	{
		//echo "File Uploaded";
	}
	else
	{
		//echo "File Not Uploaded";
		//echo "error: ".mysqli_error($connection)."<br>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
			</table>
			<form action="#" method="POST" enctype="multipart/form-data">
				<input type="file" name="image">
				<button type="submit" name="submit">Submit</button>
			</form>
		</div>
	</div>
</body>
</html>