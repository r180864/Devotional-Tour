<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<div class="text-center row" id="makepdf">
					<h1><i>Devotional</i> <b>AK</b></h1>
					<div class="m-auto col-6">
						<?php 
						session_start();
						//echo $_POST['guide'];
						$guide=$_SESSION['guide'];
						$visitor=$_SESSION['user'];
						$place=$_SESSION['active'];

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
	<script>
	        //var button = document.getElementById("button");
	        var makepdf = document.getElementById("makepdf");
	  
	       // button.addEventListener("click", function () {
	          //  html2pdf().from(makepdf).save();
	       // });

	       $(document).ready(function() {
	       		 html2pdf().from(makepdf).save();
	       });
	</script>
</body>