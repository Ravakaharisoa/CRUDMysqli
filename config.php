<?php	
$conn = new mysqli("localhost","root","","phpcrud");

if($conn->connect_error){
	die("On ne peut pas conncter avec la base de donnees!".$conn->connect_error);
}
?>