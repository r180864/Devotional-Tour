<?php 
session_start();
//echo session_id();
$_SESSION['active']='Home';
if(!isset($_SESSION['email']))
{
	echo "NOTTT    SETTTT";
	//header("Location:Login_Signup/login.php");
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
  	<link rel="icon" type="x-icon/image" href="images/logo.png">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js" integrity="sha512-f0VlzJbcEB6KiW8ZVtL+5HWPDyW1+nJEjguZ5IVnSQkvZbwBt2RfCBY0CBO1PsMAqxxrG4Di6TfsCPP3ZRwKpA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<title>Home</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row justify-content-center bg-info">
        	<?php require('C:\xampp\htdocs\Project\navbar.php');?>
        	<h1>This is Home Page</h1>
			<h2>Welcome Mr. <?php if(isset($_SESSION['name'])) {echo $_SESSION['name'];} ?></h2>

			
			<?php require('C:\xampp\htdocs\Project\carousel.php'); ?>
	
			<?php require('C:\xampp\htdocs\Project\cards.php'); ?>
			<div class="col-2 mt-5">
				<a href="/../Project/.travel/travel.php"><button class="btn btn-danger">Travel</button></a>
			</div>
			<div class="col-2 mt-5">
				<a href="/../Project/.guide/guide.php"><button class="btn btn-danger">Guide</button></a>
			</div>
		</div>
	</div>
</body>
</html>