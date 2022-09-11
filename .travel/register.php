<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

</body>
</html>
<?php 
	session_start();
	//echo $_POST['guide'];
	$guide=$_POST['guide'];
	$visitor=$_SESSION['user'];
	$place=$_SESSION['active'];
	
	//$ph=123;

	insert_visitor($visitor, $place);
	book_visit($guide, $visitor, $place);
	require('C:\xampp\htdocs\Project\Database\mydb.php');
	function insert_visitor($visitor, $place)
	{
		require('C:\xampp\htdocs\Project\Database\mydb.php');
		$query="SELECT * FROM VISITOR WHERE visitor_id='$visitor';";
		$result=mysqli_query($connection, $query);
		if(mysqli_num_rows($result)!=1)
		{
			$date="2022/09/08";
			$query="INSERT INTO VISITOR VALUES('$visitor', '$place', '$date');";
			$result=mysqli_query($connection, $query);
			if($result)
			{
				echo "Success";
			}
			else
			{
				echo "error1: ".mysqli_error($connection)."<br>";
				echo "Failed1";
			}
		}

		
	}

	function book_visit($guide, $visitor, $place)
	{
		require('C:\xampp\htdocs\Project\Database\mydb.php');

		$query="SELECT guide_id FROM TRAVEL WHERE guide_id='$guide';";
		$result=mysqli_query($connection, $query);
		if(mysqli_num_rows($result)!=1)
		{
			$query="INSERT INTO TRAVEL VALUES('$guide', '$visitor')";
			$result=mysqli_query($connection, $query);
			if($result)
			{
				echo "You Have Booked your Slot";
				echo "<a href='/../Project/home.php' class='btn btn-secondary'>Go to Home</a>";
			}
			else
			{
				echo "Failed2";
			}
		}
		else
		{
			echo "You have Already Booked Your Visit";
			echo "<a href='/../Project/home.php' class='btn btn-secondary'>Go to Home</a>";
		}	
	}
	function cancel()
	{
		require('C:\xampp\htdocs\Project\Database\mydb.php');
		$query="DELETE FROM TRAVEL WHERE visitor_id='$visitor';";
		$result=mysqli_query($connection, $query);
		if($result)
		{
			echo "Thank You! Visit Again";
		}
	}
?>