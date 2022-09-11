<?php 
	$connection=mysqli_connect('localhost', 'root', '', 'sacred_places');
	if(!$connection)
	{
		echo "Connection Failed";
	}
?>