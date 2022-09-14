<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Completed</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="/../Project/css/mystyle.css">
	<link rel="icon" type="x-icon/image" href="/../Project/images/logo.png">
</head>
<body>
	<div class="container bg-info my-5">
		<div class="row justify-content-center bg-warning mb-5">
			<div class="col-5 bg-primary my-5 text-center">
				
			
				<?php 
				session_start();
					$user=$_SESSION['user'];
					$status=$_SESSION['status'];
					delete_booking($user, $status);
					
					
					function delete_booking($user, $status)
					{
						require('C:\xampp\htdocs\Project\DataBase\mydb.php');
						$query="DELETE FROM TRAVEL WHERE guide_id='$user' OR visitor_id='$user';";
						$result=mysqli_query($connection, $query);
						if($result)
						{
							
							if($status=='guide')
							{
								delete_visitor($_POST['visitor']);
								//echo "GOOD JOB! KEEP IT UP";
								delete_guide($user);
								echo "<h1 class='my-5'>GOOD JOB! KEEP IT UP</h1>";
								//echo "<a href='/../Project/home.php' class='btn btn-secondary'>Go to Home</a>";
							}
							else
							{
								delete_visitor($user);
								echo "<h1 class='my-5'>Thank You! Visit Again<h1>";
							}
							//echo "<a href='/../Project/home.php' class='btn btn-secondary m-auto'>Go to Home</a>";
							
						}
					}

					function delete_guide($guide)
					{
						require('C:\xampp\htdocs\Project\DataBase\mydb.php');
						$query="DELETE FROM GUIDE WHERE guide_id='$guide';";
						$result=mysqli_query($connection, $query);
						if($result)
						{
							
						}
					}
					function delete_visitor($visitor)
					{
						require('C:\xampp\htdocs\Project\Database\mydb.php');
						$query="DELETE FROM VISITOR WHERE visitor_id='$visitor';";
						$result=mysqli_query($connection, $query);
						if($result)
						{
							
						}
					}
				?>
			</div>
			<a href='/../Project/home.php' class='btn btn-secondary m-auto'>Go to Home</a>
		</div>
	</div>
</body>
</html>