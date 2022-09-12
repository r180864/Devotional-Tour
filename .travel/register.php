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
</head>
<body>

</body>
</html>
	<div class="container">
		<div class="row bg-warning mt-5">
			<div class="col-5 bg-primary my-5 m-auto text-center p-3" id='makepdf'>
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
	</div>
	<button class="btn btn-warning" id="button">Download PDF</button>
	<!-- <script type="text/javascript">
		var button=getElementById("btn");
		var makepdf=getElementById("pdf");

		button.addEventListener('click', function() {
			html2pdf().from(makepdf.save());
		});
	</script>-->

	<div class="container">
        <button id="button">Generate PDF</button>
        <div class="card" id="makepdf">
            <h2>Welcome to GeeksforGeeks</h2>
            <ul>
                <li>
                    <h4>
                        We are going to generate a pdf 
                        from the area inside the box
                    </h4>
                </li>
                <li>
                    <h4>
                        This is an example of generating 
                        pdf from HTML during runtime
                    </h4>
                </li>
            </ul>
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
