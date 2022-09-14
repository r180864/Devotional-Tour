<?php 
session_start();
$_SESSION['active']='Ayodhya';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ayodhya</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/../Project/css/mystyle.css">
	<link rel="icon" type="x-icon/image" href="/../Project/images/logo.png">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<?php require('C:\xampp\htdocs\Project\navbar.php');?>
			<div class="column">
				<h1>Ayodhya- <i>City of Bhagavan Ram</i></h1>
			</div>

			<?php require('C:\xampp\htdocs\Project\carousel.php'); ?>
		</div>
		<div class="row justify-content-center mt-5">
			<?php require('C:\xampp\htdocs\Project\.travel\button.php');?>
		</div>
		<div class="row">
			<h1>Ram Mandir</h1><hr>
			<p>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ram Mandir is a Sanathan temple that is being built in Ayodhya, Uttar Pradesh, India, at the site of Ram Janmabhoomi, according to the Ramayana the birthplace of Rama, a principal deity in Sanathana Dharma. The temple construction is being supervised by the Shri Ram Janmabhoomi Teerth Kshetra. The ground-breaking ceremony was performed on 5 August 2020 by India’s prime minister Narendra Modi. The temple premises will include temples dedicated to deities Surya, Ganesha, Shiva, Durga, Vishnu and Brahma.
			</p>
			<h1>Bhagavan Ram Lallan</h1><hr>
			<p>Rama, an incarnation of god Vishnu, is a widely worshiped Hindu deity. According to the ancient Indian epic, Ramayana, Rama was born in Ayodhya. In the 16th century, the Mughals constructed a mosque, the Babri Masjid which is believed to be the site of the Ram Janmabhoomi, said to be birthplace of Rama.[7] A violent dispute arose in the 1850s.</p>
		</div>
		<div class="row">
			<div class="col-6 bg-info m-auto my-5">
				<iframe src="https://www.youtube.com/embed/watch?v=uCEPsVomGd8" height="500", width="800"></iframe>
			</div>
		</div>
	</div>
</body>
</html>