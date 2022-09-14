<?php
	$place=$_SESSION['active'];
?>
<div id="temple" class="carousel slide carousel-fade" data-bs-ride="carousel">
	<div class="carousel-inner shadow">
		<div class="carousel-item active">
			<img class="d-block w-100" src="/../Project/images/<?php echo $place; ?>1.jpg" height="800">
			<div class="carousel-caption">
				<h1>Welcome</h1>
			</div>
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="/../Project/images/<?php echo $place; ?>2.jpg" height="800">
			<div class="carousel-caption">
				<h1 class="text-secondary">Welcome</h1>
				
			</div>
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="/../Project/images/<?php echo $place; ?>3.jpg" height="800">
			<div class="carousel-caption">
				<h1 >Welcome</h1>
			</div>
		</div>
	</div>

	<button class="carousel-control-prev" type="button" data-bs-target="#temple" data-bs-slide="prev">
		<span class="carousel-control-prev-icon"></span>
		<span class="visually-hidden">Previous</span>
	</button>

	<button class="carousel-control-next" type="button" data-bs-target="#temple" data-bs-slide="next">
		<span class="carousel-control-next-icon"></span>
		<span class="visually-hidden">Next</span>
	</button>

	<div class="carousel-indicators">
		<button type="button" data-bs-target="#temple" data-bs-slide-to="0" class="active" aria-current="true" area-label="slide 1"></button>
		<button type="button" data-bs-target="#temple" data-bs-slide-to="1" area-label="slide 2"></button>
		<button type="button" data-bs-target="#temple" data-bs-slide-to="2" area-label="slide 3"></button>
	</div>
</div>