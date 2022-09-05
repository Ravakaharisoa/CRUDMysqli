<?php
include'action.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Sahil Kumar">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<title>CRUD with Mysqli</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		<a class="navbar-brand" href="#">CRUD App</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=#collapsibleNavbar>
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="#">Caracteristique</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Service</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">A propos</a>
				</li>
			</ul>
		</div>
		<form class="form-inline" action=".php">
			<input type="text" name="" class="form-control mr-sm-2" placeholder="Recherche">
			<button class="btn btn-primary" type="submit">Recherche</button>
		</form>
	</nav>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 mt-3 bg-primary p-2 rounded">
				<h2 class="bg-light p-2 text-center text-dark">ID: <?= $vid; ?></h2>
				<div class="text-center
				">
					<img src="<?= $vimage; ?>" width="300" class="img-thumbnail">
				</div>
				<h4 class="text-light">Nom : <?= $vnom; ?></h4>
				<h4 class="text-light">Email : <?= $vemail; ?></h4>
				<h4 class="text-light">Contact : <?= $vcontact; ?></h4>
			</div>
		</div>
	</div>
</body>
</html>