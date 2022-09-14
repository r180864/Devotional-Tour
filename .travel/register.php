<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/../Project/css/mystyle.css">
	<link rel="icon" type="x-icon/image" href="/../Project/images/logo.png">
</head>
<body>

</body>
</html>
	<div class="container">
		<div class="row bg-warning mt-5">
			<div class="col-5 bg-primary my-5 m-auto text-center p-3">
				<?php 
					session_start();
					//echo $_POST['guide'];
					$guide=$_POST['guide'];
					$visitor=$_SESSION['user'];
					$place=$_SESSION['active'];
					
					//$ph=123;

					insert_visitor($visitor, $place);
					book_visit($guide, $visitor, $place);
					echo "<a href='/../Project/home.php' class='btn btn-secondary my-3'>Go to Home</a>";
					echo "<button class='btn btn-success ms-5' id='button'>Download PDF</button>";
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
								//echo "Success";
							}
							else
							{
								//echo "error1: ".mysqli_error($connection)."<br>";
								//echo "Failed1";
							}
							$query="UPDATE VISITOR SET visit_date=CURDATE() WHERE visitor_id='$visitor';";
							$result=mysqli_query($connection, $query);
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
								echo "<h2>You Have Booked your Slot</h2>&nbsp&nbsp&nbsp";
								
							}
							else
							{
								//echo "Failed2";
							}
						}
						else
						{
							echo "<h2>You have Already Booked Your Visit</h2><br>&nbsp&nbsp&nbsp";
							//echo "<a href='/../Project/home.php' class='btn btn-secondary'>Go to Home</a>";
						}

					}
					?>
			</div>
		</div>
			<div class="text-center row" id="makepdf">
				<h1><i>Devotional</i> <b>AK</b></h1>
				<div class="m-auto col-6">
					<?php 
					require('C:\xampp\htdocs\Project\Database\mydb.php');
					$query="SELECT U.id, U.name, U.ph_number, V.visit_place, V.visit_date FROM USER U JOIN VISITOR V JOIN TRAVEL T WHERE U.id=V.visitor_id AND V.visitor_id=T.visitor_id AND T.visitor_id=$visitor;";
					$result=mysqli_query($connection, $query);
					if($result)
					{
						if(mysqli_num_rows($result)==1)
						{
							echo "<table style='text-align:left;' border='3'>";
							while($row=mysqli_fetch_assoc($result))
							{
								echo "<tr><td><h4>Visitor ID: </h4></td><td><h4>".$row['id']."</h4></td></tr>";
								echo "<tr><td><h4>Visitor Name: </h4></td><td><h4>".$row['name']."</h4></td></tr>";
								echo "<tr><td><h4>Visitor Mobile: </h4></td><td><h4>".$row['ph_number']."</h4></td></tr>";
								echo "<tr><td><h4>Visit Place: </h4></td><td><h4>".$row['visit_place']."</h4></td></tr>";
								echo "<tr><td><h4>Visit Date: </h4></td><td><h4>".$row['visit_date']."</h4></td></tr>";
							}
							//echo "</table>";
						}
					}

					require('C:\xampp\htdocs\Project\Database\mydb.php');
					$query="SELECT U.id, U.name, U.ph_number FROM USER U JOIN GUIDE G JOIN TRAVEL T WHERE U.id=G.guide_id AND G.guide_id=T.guide_id AND T.guide_id=$guide;";
					$result=mysqli_query($connection, $query);
					if($result)
					{
						if(mysqli_num_rows($result)==1)
						{
							//echo "<table style='text-align:left' border='1'>";
							while($row=mysqli_fetch_assoc($result))
							{
								echo "<tr><td><h4>Guide ID: <h4></td><td><h4>".$row['id']."</h4></td></tr>";
								echo "<tr><td><h4>Guide Name: <h4></td><td><h4>".$row['name']."</h4></td></tr>";
								echo "<tr><td><h4>Guide Mobile: <h4></td><td><h4>".$row['ph_number']."</h4></td></tr>";
								//echo "<tr><td>Visit Place: </td><td>".$row['visit_place']."</td></tr>";
								//echo "<tr><td>Visit Date: </td><td>".$row['visit_date']."</td></tr>";
							}
							echo "</table>";
						}
					}
				?>
				
			</div>
		</div>
	</div>
  
    <script>


        var button = document.getElementById("button");
        var makepdf = document.getElementById("makepdf");
  
        button.addEventListener("click", function () {
            html2pdf().from(makepdf).save();
        });
    </script>
</html>
</body>
