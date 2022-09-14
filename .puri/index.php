<?php 
session_start();
$_SESSION['active']='Puri';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Puri</title>
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
				<h1>Puri- <i>City of Lord Jagannath</i></h1>
			</div>

			<?php require('C:\xampp\htdocs\Project\carousel.php'); ?>
		</div>
		<div class="row justify-content-center mt-5">
			<?php require('C:\xampp\htdocs\Project\.travel\button.php');?>
		</div>
		<div class="row">
			<h1>Puri</h1><hr>
			<p>
				The Jagannath Temple is an important Hindu temple dedicated to Jagannath, a form of Vishnu - one of the trinity of supreme divinity in Hinduism, Puri is in the state of Odisha on the eastern coast of India. The present temple was rebuilt from the 10th century onwards, on the site of pre existing temples in the compound but not the main Jagannatha temple, and begun by Anantavarman Chodaganga, the first king of the Eastern Ganga dynasty.[1]
			</p>

			<p>
				The Puri temple is famous for its annual Ratha Yatra,[2] or chariot festival, in which the three principal deities are pulled on huge and elaborately decorated temple cars. Unlike the stone and metal icons found in most Hindu temples, the image of Jagannath (which gave its name to the English term 'juggernaut') is made of wood and is ceremoniously replaced every twelve or 19 years by an exact replica.[3] It is one of the Char Dham pilgrimage sites.
			</p>
			<h1>Lord Jagannath</h1><hr>
			<p>
				The temple is sacred to all Hindus, and especially in those of the Vaishnava traditions. Many great Vaishnava saints, such as Ramanujacharya, Madhvacharya, Nimbarkacharya, Vallabhacharya and Ramananda were closely associated with the temple.[4][5] Ramanuja established the Emar Mutt near the temple and Adi Shankaracharya established the Govardhan Math, which is the seat of one of the four Shankaracharyas. It is also of particular significance to the followers of Gaudiya Vaishnavism, whose founder, Chaitanya Mahaprabhu, was attracted to the deity, Jagannath, and lived in Puri for many years.
			</p>


			</p>
		</div>
		<div class="row">
			<div class="col-6 bg-info m-auto my-5">
				<iframe src="https://www.youtube.com/embed/watch?v=uCEPsVomGd8" height="500", width="800"></iframe>
			</div>
		</div>
	</div>
</body>
</html>