<?php 
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
?>
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
		<div class="row bg-warning text-center mt-5">
			<h1>Available Guides</h1>
			<div class="col-6 bg-primary m-auto my-5 p-3">
				<?php 
					session_start();
					if(!isset($_SESSION['user']))
					{
						header("Location:alert.php");
					}

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
								echo "<h2>You have already booked your Visit</h2><br>";
								echo "<a href='/../Project/home.php' class='btn btn-secondary my-3'>Go to Home</a>";
							}
							else
							{
								echo "<b>You have already booked your Visit<br>Would you like to cancel that?<b><br>";
								echo "<a href='completed.php' class='btn btn-danger my-3'>Yes</a>&nbsp&nbsp&nbsp&nbsp&nbsp";
								echo "<a href='/../Project/.$place/' class='btn btn-success my-3'>No</a>";
							}
							
						}
						else
						{
							show_guides($place);
						}
					}
					else
					{
						echo "<b>Please complete your Guidance, Then come to Visit<b> &nbsp&nbsp";
						echo "<a href='guide.php' class='btn btn-secondary my-3'>Go to Costumer</a>";
					}

					

					function show_guides($place)
					{
						require('C:\xampp\htdocs\Project\DataBase/mydb.php');
						$query="SELECT U.id, U.name, G.guide_place FROM USER U JOIN GUIDE G WHERE U.id=G.guide_id AND G.guide_place='$place' AND G.guide_id NOT IN (SELECT guide_id FROM TRAVEL);";
						$result=mysqli_query($connection, $query);
						if($result)
						{
							if(mysqli_num_rows($result))
							{	
								echo "<b><table class='my-3'>";
								while($row=mysqli_fetch_assoc($result))
								{
									$id=$row['id'];
									echo "<tr><td>".$row['id']."&nbsp&nbsp&nbsp&nbsp</td><td>".$row['guide_place']."&nbsp&nbsp&nbsp&nbsp</td><td>".$row['name']."&nbsp&nbsp&nbsp&nbsp</td><td>"."<form action='register.php' method='POST'><button type='submit' class='btn btn-dark' name='guide' value='$id'>Select</button>"."</td></tr>";
								}
								echo "</table></b>";
							}
							else
							{
								echo "<h2>No Guides Available at this moment</h2>";
							}
							echo "</div><div class='mb-5 text-center'><a href='/../Project/home.php' class='btn btn-danger'>Go to Home</a></div><div>";
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