
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Visitor</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="column">
				<?php 
				session_start();
					if(!isset($_SESSION['user']))
					{
						header("Location:alert.php");
					}
					//session_start();
					//echo "<pre>";
					//print_r($_SESSION);
					//echo "</pre>";
					require('C:\xampp\htdocs\Project\DataBase/mydb.php');
					$visitor=$_SESSION['user'];
					$place=$_SESSION['active'];
					$_SESSION['status']='visitor';
					//$place='Vrindavan';
					//echo $place;

					if(!is_guide($visitor))
					{
						
						if(visitor_exist($visitor, $place))
						{
							$visit_place=$_SESSION['visit_place'];
							if($visit_place==$place)
							{
								echo "You have already booked your Visit<br>";
								echo "<a href='/../Project/home.php' class='btn btn-secondary'>Go to Home</a>";
							}
							else
							{
								echo "You have already booked your Visit<br>Would you like to cancel that?";
								echo "<a href='completed.php' class='btn btn-danger'>Yes</a>";
								echo "<a href='/../Project/.$place/' class='btn btn-success'>No</a>";
							}
							
						}
						else
						{
							show_guides($place);
						}
					}
					else
					{
						echo "Please complete your Guidance, Then come to Visit";
						echo "<a href='guide.php' class='btn btn-secondary'>Go to Costumer</a>";
					}

					function is_guide($visitor)
					{
						require('C:\xampp\htdocs\Project\DataBase/mydb.php');
						$query="SELECT * FROM GUIDE WHERE guide_id=$visitor";
						$result=mysqli_query($connection, $query);
						if($result)
						{
							if(mysqli_num_rows($result))
							{
								return true;
							}
							else
							{
								return false;
							}
						}
					}

					function visitor_exist($visitor, $place)
					{
						require('C:\xampp\htdocs\Project\DataBase/mydb.php');
						$query="SELECT * FROM VISITOR WHERE visitor_id=$visitor";
						$result=mysqli_query($connection, $query);
						if($result)
						{
							if(mysqli_num_rows($result))
							{
								while($row=mysqli_fetch_assoc($result))
								{
									$_SESSION['visit_place']=$row['visit_place'];
								}
				return true;
								return true;
							}
							else
							{
								return false;
							}
						}
					}

					function visit_booked($visitor)
					{
						require('C:\xampp\htdocs\Project\DataBase/mydb.php');
						$query="SELECT * FROM TRAVEL WHERE visitor_id=$visitor";
						$result=mysqli_query($connection, $query);
						if($result)
						{
							if(mysqli_num_rows($result))
							{
								return true;
							}
							else
							{
								return false;
							}
						}
					}

					function show_guides($place)
					{
						require('C:\xampp\htdocs\Project\DataBase/mydb.php');
						$query="SELECT * FROM GUIDE WHERE guide_place='$place' AND guide_id NOT IN (SELECT guide_id FROM TRAVEL);";
						$result=mysqli_query($connection, $query);
						if($result)
						{
							if(mysqli_num_rows($result))
							{	echo "<table>";
								while($row=mysqli_fetch_assoc($result))
								{
									$id=$row['guide_id'];
									echo "<tr><td>".$row['guide_id']."</td><td>".$row['guide_place']."</td><td>".$row['rating']."</td><td>"."<form action='register.php' method='POST'><button type='submit' name='guide' value='$id'>Select</button>"."</td></tr>";
								}
								echo "</table>";
							}
							else
							{
								echo "No Guides Available at this moment";
							}
						}
						else
						{
							echo "error: ".mysqli_error($connection)."<br>";
						}
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>