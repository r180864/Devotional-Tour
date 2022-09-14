
<?php 
session_start();
$_SESSION['active']='Tirumala';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tirumala</title>
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
				<h1>Tirumala- <i>City of Lord Venkateswar</i></h1>
			</div>

			<?php require('C:\xampp\htdocs\Project\carousel.php'); ?>
		</div>
		<div class="row justify-content-center mt-5">
			<?php require('C:\xampp\htdocs\Project\.travel\button.php');?>
		</div>
		<div class="row">
			<h1>Tirumala</h1><hr>
			<p>
				<b>Tirumala</b> is a spiritual town in Tirupati district of the Indian state of Andhra Pradesh. It is one of the suburbs of the Tirupati urban agglomeration. The town is a part of Tirupati Urban Development Authority and located in Tirupati (rural) mandal of Tirupati revenue division. It is a hill town where Tirumala Venkateswara Temple is located, which is the abode of Venkateswara. The town is strictly vegetarian.
			</p>
			<h1>Lord Venkateswar</h1><hr>
			<p>
				Vrindavan (pronunciation (help·info); IAST: Vṛndāvana), also spelt Vrindaban and Brindaban,[2] is a historical city in the Mathura district of Uttar Pradesh, India. It is located in the Braj Bhoomi region and holds religious importance in Hinduism as god Krishna spent most of his childhood days in this city.[3][4][5][6] Vrindavan has about 5,500 temples dedicated to the worship of Krishna and his divine consort Radha.[7]
			</p>

				<p>It is one of the most sacred places for Vaishnavism tradition.[3][7] Vrindavan is a significant part of the "Krishna pilgrimage circuit" which also includes Mathura, Barsana, Gokul, Govardhan, Kurukshetra, Dwarka and Puri.[8][9]
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