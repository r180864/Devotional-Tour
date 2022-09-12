<?php 
	retrieveImage();
	function retrieveImage()
	{
		require('DataBase/mydb.php');
		$email=$_SESSION['email'];
		$query="SELECT * FROM USER WHERE email='$email';";
		$result=mysqli_query($connection, $query);
		if($result)
		{
			if(mysqli_num_rows($result)===1)
			{
				while($row=mysqli_fetch_assoc($result))
				{

					if($row['image'])
					{
						//$image= '<img height="30" width="30" src="data:image; base64,'.$row["image"].'" id="myimg">';
						$_SESSION['imgsrc']='data:image; base64,'.$row["image"];
						//$_SESSION['image']=$image;
					}
					else
					{
						$_SESSION['imgsrc']=NULL;
					}
				}
			}
			else
			{
				//echo "NOOOOOOOOOOO";
			}
		}
		else
		{
			//echo "<h1>HELLO</h1>";
		}
	}

?>


<?php 
	echo "<a href='#' class='nav-link dropdown-toggle ";
	if($_SESSION['active']=='Profile')
	{
		echo 'active';
	}
	echo "' role='button' data-bs-toggle='dropdown'>";
?>
	<?php 
		//echo $_SESSION['name']; 
		if($_SESSION['imgsrc'])
		{
			//$source=retrieveImage();

			//echo $_SESSION['image'];
			$source=$_SESSION['imgsrc'];
				
		}
		else
		{
			$source="/../Project/images/loginIcon.png";
			//echo '<img src="images/loginIcon.png" height="30" width="30" id="myimg" class="m-auto">';
		}
		echo "<img height='30' width='30' id='myimg' src='$source'>";
		//echo "<img src=$source height='30' width='30'>";
		echo '<br>'.$_SESSION['name'];
	?>
</a>
<ul class="dropdown-menu bg-dark">
	<li class="dropdown-item text-warning">
		<a href="/../Project/profile.php" class="nav-link">View My Profile</a>
	</li>
	<li class="dropdown-item text-warning">
		<a href="/../Project/Login_Signup/logout.php" class="nav-link">Log Out</a>
	</li>
</ul>
