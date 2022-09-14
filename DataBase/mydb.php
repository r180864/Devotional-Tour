<?php 
	$connection=mysqli_connect('localhost', 'root', '', 'place');
	if(!$connection)
	{
		echo "Connection Failed";
	}
?>