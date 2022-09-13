
<?php 
session_start();
$_SESSION['active']='Tirumala';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tirumala</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/../Project/css/mystyle.css">
	<link rel="icon" type="x-icon/image" href="/../Project/images/logo.png">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<?php require('C:\xampp\htdocs\Project\navbar.php');?>
			<div class="column">
				<h1>Tirumala- <i>City of Lord Venkateswar</i></h1>
			</div>

			<?php require('C:\xampp\htdocs\Project\carousel.php'); ?>
		</div>
		<div class="row justify-content-center mt-5">
			<?php require('C:\xampp\htdocs\Project\.travel\button.php');?>
		</div>
	</div>
</body>
</html>