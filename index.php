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

	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<h4 class="text-center text-dark mt-2">Developper CRUD App Utilisant PHP & MySQLi Prepared Statement (Object Oriented)</h4>
				<hr>
				<?php if(isset($_SESSION['response'])){ ?>
					<div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<b class="text-dark text-center"><?= $_SESSION['response'];?></b>
					</div>
					<?php }
					unset($_SESSION['response']); 
					?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h3 class="text-center text-info">Fiche d'inscription</h3>
				<form action="action.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?= $id; ?>">
					<div class="form-group">
						<input type="text" name="nom"value="<?= $nom; ?>" class="form-control" placeholder="Entrer un nom" required>
					</div>
					<div class="form-group">
						<input type="email" name="email" class="form-control" value="<?= $email; ?>" placeholder="Entrer votre e-mail" required>
					</div>
					<div class="form-group">
						<input type="tel" name="phone" value="<?= $contact; ?>" class="form-control" placeholder="Entrer votre numero de telephone" required>
					</div>
					<div class="form-group">
						<input type="hidden" name="oldimage" value="<?= $image; ?>">
						<input type="file" name="image" class="custom-file">
						<img src="<?= $image; ?>" width="120" class="img-thumbnail">
					</div>
					<div class="form-group">
						<?php if ($modifier==true) {?>
							<button class="btn btn-success btn-block" name="modifier">Modifier</button>
						<?php }
						else{ ?>
						<button class="btn btn-primary btn-block" name="ajout">Inscrire</button>
					<?php } ?>
					</div>
				</form>
			</div>
			<div class="col-md-8">
				<?php 
					$query="SELECT * FROM crud";
					$stmt=$conn->prepare($query);
					$stmt->execute();
					$result=$stmt->get_result();
				?>
				<h4 class="text-center text-info">Inscription present dans la base de donnees</h4>
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th>#</th>
							<th>Image</th>
							<th>Nom</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while($row=$result->fetch_assoc()){
						?>
						<tr>
							<td><?= $row['id']; ?></td>
							<td><img src="<?= $row['Image']; ?>" width="25"></td>
							<td><?= $row['Nom']; ?></td>
							<td><?= $row['Email']; ?></td>
							<td><?= $row['Contact']; ?></td>
							<td>
								<a href="details.php?details=<?= $row['id']; ?>" class="badge badge-primary p-2">Details</a>|
								<a href="action.php?supprimer=<?= $row['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Voulez vous supprimer ce champs?');">Supprimer</a>|
								<a href="index.php?modifier=<?= $row['id']; ?>" class="badge badge-success p-2">Modifier</a>
							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>