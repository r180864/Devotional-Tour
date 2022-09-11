<?php //session_start(); ?>
<nav class="navbar navbar-expand-sm navbar-dark bg-warning rounded">
				<a href="/../Project/home.php" class="navbar-brand">
					<img src="/../Project/images/krishna.png" height="70" width="110" style="padding: 10px;">
				</a>

				<button class="navbar-toggler" data-toggle="collapse" data-target="#Menu">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="me-5">
					<h1><i>Devotional</i> <b>AK</b></h1>
				</div>
				<div class="collapse navbar-collapse bg-secondary mb-auto rounded" id="Menu" >
					<ul class="navbar-nav ms-sm-auto">
						<li class="nav-item">
							<?php 
								echo "<a href='/../Project/home.php' class='nav-link ";
								if($_SESSION['active']=='Home')
								{
									echo 'active';
								}
								echo "'>Devotional<br>Home</a>";
							?>
						</li>
						<li class="nav-item">
							<?php 
								echo "<a href='/../Project/.ayodhya' class='nav-link ";
								if($_SESSION['active']=='Ayodhya')
								{
									echo 'active';
								}
								echo "'>Ayodhya<br>Rama</a>";
							?>
						</li>
						<li class="nav-item">
							<?php 
								echo "<a href='/../Project/.vrindavan' class='nav-link ";
								if($_SESSION['active']=='Vrindavan')
								{
									echo 'active';
								}
								echo "'>Vrindavan<br>Krishna</a>";
							?>
						</li>
						<li class="nav-item">
							<?php 
								echo "<a href='/../Project/.tirumala' class='nav-link ";
								if($_SESSION['active']=='Tirumala')
								{
									echo 'active';
								}
								echo "'>Tirumala<br>Govinda</a>";
							?>
						</li>
						<li class="nav-item">
							<?php 
								echo "<a href='/../Project/.puri' class='nav-link ";
								if($_SESSION['active']=='Puri')
								{
									echo 'active';
								}
								echo "'>Puri<br>Jagannath</a>";
							?>
						</li>
						<li class="nav-item dropdown bg-success rounded">
						<?php 
							if(isset($_SESSION['email']))
							{
								require("profile_pic.php");
							}
							else
							{
								echo "<a href='/../Project/Login_Signup/login.php' class='nav-link ";
								if($_SESSION['active']=='Login')
								{
									echo 'active';
								}
								echo "'>Login/<br>Signup</a>";
							}
						?>
						</li>
					</ul>
				</div>
			</nav>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>