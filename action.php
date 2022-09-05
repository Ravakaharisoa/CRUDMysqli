<?php
		session_start();
	include'config.php';

	$modifier=false;
	$id="";
	$nom="";
	$email="";
	$contact="";
	$image="";
		if (isset($_POST['ajout'])) {
			$nom=$_POST['nom'];
			$email=$_POST['email'];
			$contact=$_POST['phone'];

			$photo=$_FILES['image']['name'];
			$upload="uploads/".$photo;

			$query="INSERT INTO crud(Nom,Email,Contact,Image) VALUES (?,?,?,?)";
			$stmt=$conn->prepare($query);
			$stmt->bind_param("ssss",$nom,$email,$contact,$upload);
			$stmt->execute();
			move_uploaded_file($_FILES['image']['tmp_name'], $upload);
			header('Location:index.php');
			$_SESSION['response']="Insertion avec succees";
			$_SESSION['res_type']="success";
		}

if (isset($_GET['supprimer'])) {
	$id=$_GET['supprimer'];

	$sql="SELECT Image FROM crud WHERE id=?";
	$stmt2=$conn->prepare($sql);
	$stmt2->bind_param("i",$id);
	$stmt2->execute();
	$result2=$stmt2->get_result();
	$row=$result2->fetch_assoc();

	$imagepath=$row['Image'];
	unlink($imagepath);

	$query="DELETE FROM crud WHERE id=?";
	$stmt=$conn->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();

	header('Location:index.php');
	$_SESSION['response']="Suppression bien effectuee!";
	$_SESSION['res_type']='danger';
}

if (isset($_GET['modifier'])) {
	$id=$_GET['modifier'];

	$query="SELECT * FROM crud WHERE id=?";
	$stmt=$conn->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row=$result->fetch_assoc();

	$id=$row['id'];
	$nom=$row['Nom'];
	$email=$row['Email'];
	$contact=$row['Contact'];
	$image=$row['Image'];

	$modifier=true;
}

if (isset($_POST['modifier'])) {
	$id=$_POST['id'];
	$nom=$_POST['nom'];
	$email=$_POST['email'];
	$contact=$_POST['phone'];
	$oldimage=$_POST['oldimage'];

	if(isset($_FILES['image']['name']) && ($_FILES['image']['name']) !=""){
		$newimage="uploads/".$_FILES['image']['name'];
		unlink($oldimage);
		move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
	}
	else{
		$newimage=$oldimage;
	}
	$query="UPDATE crud SET Nom=?,Email=?,Contact=?,Image=? WHERE id=?";
	$stmt=$conn->prepare($query);
	$stmt->bind_param("ssssi",$nom,$email,$contact,$newimage,$id);
	$stmt->execute();
	$_SESSION['response']="Modification avec Succes";
	$_SESSION['res_type']="primary";
	header('Location:index.php');
}

if (isset($_GET['details'])) {
	$id=$_GET['details'];
	$query="SELECT * FROM crud WHERE id=?";
	$stmt=$conn->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row=$result->fetch_assoc();

	$vid=$row['id'];
	$vnom=$row['Nom'];
	$vemail=$row['Email'];
	$vcontact=$row['Contact'];
	$vimage=$row['Image'];
}
?>