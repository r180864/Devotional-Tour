<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Guide</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/../Project/css/mystyle.css">
	<link rel="icon" type="x-icon/image" href="/../Project/images/logo.png">
</head>
<body>
	<?php 
		session_start();

		//echo "<pre>";
		//print_r($_SESSION);
		//echo "</pre>";
		if(!isset($_SESSION['user']))
		{
			header("Location:alert.php");
		}
		require('C:\xampp\htdocs\Project\Database\mydb.php');

		$_SESSION['status']='guide';
		$guide=$_SESSION['user'];
		$place=$_SESSION['active'];
		//echo $place;
		//if(isset($_SESSION['ph']))
		{
			//$ph=$_SESSION['ph'];


		}
		/*else
		{
			echo "<form action='#' method='POST'><input type='number' name='ph'><button type='submit' class='btn btn-success'>Confirm</button></form>";
		}*/


		
		if(!is_visitor($guide))
		{	
			if(guide_exist($guide))
			{
				
				if(guide_booked($guide))
				{
					$booked_place=$_SESSION['booked_place'];
					if($booked_place==$place)
					{
						echo "You Have a Visitor<br>";
					}
					else
					{
						echo "You have already a visitor from $booked_place<br>Complete him/her first<br>";
					}
					my_visitor($guide);
				}
				else
				{
					guide_replace($guide, $place);
					echo "Please Wait, We will Assign you a customer<br>";
				}
			}
			else
			{
				insert_guide($guide, $place);
			}
		}
		else
		{
			echo "Please complete your visit, Then come to Guide";
			echo "<a href='/../Project/home.php' class='btn btn-secondary'>Go to Home</a>";
		}
		echo "<a href='/../Project/home.php' class='btn btn-secondary'>Go to Home</>";

		function is_visitor($guide)
		{
			require('C:\xampp\htdocs\Project\DataBase/mydb.php');
			$query="SELECT * FROM VISITOR WHERE visitor_id=$guide";
			$result=mysqli_query($connection, $query);
			if($result)
			{
				if(mysqli_num_rows($result))
				{
					while($row=mysqli_fetch_assoc($result))
					{
						$_SESSION['booked_place']=$row['visit_place'];
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

		function guide_replace($guide, $place)
		{
			require('C:\xampp\htdocs\Project\DataBase/mydb.php');
			$query="UPDATE GUIDE SET guide_place='$place' WHERE guide_id='$guide';";
			$result=mysqli_query($connection, $query);
			if($result)
			{
				
			}
		}


		function guide_exist($guide)
		{
			require('C:\xampp\htdocs\Project\Database\mydb.php');
			$query="SELECT * FROM GUIDE WHERE guide_id='$guide';";
			$result=mysqli_query($connection, $query);
			if(mysqli_num_rows($result)==1)
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$_SESSION['booked_place']=$row['guide_place'];
				}
				return true;
			}
			else
			{
				//echo "Already<br>";
				return false;


				//my_visitor($guide);
					//echo mysqli_num_rows($result);
					//echo "error2: ".mysqli_error($connection)."<br>";
			}
		}
		
		function insert_guide($guide, $place)
		{
			require('C:\xampp\htdocs\Project\Database\mydb.php');
			$query="INSERT INTO GUIDE VALUES('$guide', '$place', NULL);";
			$result=mysqli_query($connection, $query);
			if($result)
			{
				echo "Guide Details Stored";
				echo "<a href='/../Project/home.php' class='btn btn-secondary'>Go to Home</>";echo "<a href='/../Project/home.php' class='btn btn-secondary'>Go to Home</a>";
				return true;
			}
			else
			{

				echo "error1: ".mysqli_error($connection)."<br>";
				return false;
			}

		}

		function guide_booked($guide)
		{
			require('C:\xampp\htdocs\Project\Database\mydb.php');
			$query="SELECT * FROM TRAVEL;";
			$result=mysqli_query($connection, $query);
			if(mysqli_num_rows($result))
			{
				return true;
			}
			else
			{

				return false;
			}
		}

		function my_visitor($guide)
		{
			require('C:\xampp\htdocs\Project\Database\mydb.php');
			$query="SELECT V.visitor_id, V.visit_place, V.visit_date, U.name, U.ph_number  FROM USER U JOIN VISITOR V JOIN TRAVEL T WHERE V.visitor_id = T.visitor_id AND T.visitor_id = U.id AND T.guide_id=$guide;";
			$result=mysqli_query($connection, $query);
			if($result)
			{
				if(mysqli_num_rows($result))
				{
					while($row=mysqli_fetch_assoc($result))
					{
						$visitor=$row['visitor_id'];
						echo $row['visitor_id']." ".$row['name']." ".$row['visit_place']." ".$row['visit_date']." ".$row['ph_number']."<br>";

						echo "<form action='completed.php' method='POST'><button class='btn btn-success' type='submit' name='visitor' value='$visitor'>Complete</button></form>";
						
					}
					//header("Location:/../Project/");
				}
				else
				{
					echo "Please Wait, We will Assign you a customer";
				}
			}
			else
			{
				echo "error1: ".mysqli_error($connection)."<br>";
			}
		}
	?>
</body>
</html>